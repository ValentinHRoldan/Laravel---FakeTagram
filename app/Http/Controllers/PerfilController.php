<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index(){
        return view('perfil.index');
    }

    public function configImagen($r){

    }

    public function store(Request $r){
        //convierte el nombre de usuario en formato de link
        //ej: Si Valentin Roldan -> valentin-roldan
        $r->request->add([
            'username' => Str::slug($r->username)
        ]);

        $r->validate([
            'username' => ['required','unique:users,username,'.Auth::user()->id,'min:3','max:20', 'not_in:editar-perfil'],
        ]);
        if($r->imgperfil){
            $imagen = $r->file('imgperfil');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $manager = new ImageManager(new Driver());
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            // read image from file system
            $image = $manager->read($imagen);
            // Image Crop
            $image->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize(); // Prevent the image from being upsized
            });
            //Save the file
            $image->save($imagenPath);
          
        }
        $usuario = User::find(Auth::user()->id);
        $usuario->username = $r->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('post.index', $usuario->username)->with('mensaje', 'Tu perfil se ha actualizado!');
    }
}

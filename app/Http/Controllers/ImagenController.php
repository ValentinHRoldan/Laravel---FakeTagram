<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    public function store(Request $r){
        $imagen = $r->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $manager = new ImageManager(new Driver());
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        // read image from file system
        $image = $manager->read($imagen);
        // Image Crop
        $image->crop(1000,1000);

        //Save the file
        $image->save($imagenPath);
        return response()->json(['imagen' => $nombreImagen]);
    }
}

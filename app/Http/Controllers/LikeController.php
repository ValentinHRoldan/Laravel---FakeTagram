<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $r, Post $post){

        //1 forma de hacer
        
        // $post->likes()->create([
        //     'user_id' => Auth::user()->id,
        //     'post_id' => $post->id,
        // ]);

        $post->likes()->create([
            'user_id' => $r->user()->id,
            'post_id' => $post->id,
        ]);

        $likeCount = $post->likes->count();
        
        return response()->json(['message' => 'Post liked successfully', 'likeCount' => $likeCount]);
    }
}

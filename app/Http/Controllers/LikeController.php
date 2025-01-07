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

    public function likeCount(Post $post){
        return response()->json(['likeCount' => $post->likes->count()]);
    }

    public function destroy(Request $r, Post $post){
        $r->user()->likes()->where('post_id', $post->id)->delete();

        return response()->json(['message' => 'Post liked successfully', 'likeCount' => $post->likes->count()]);
    }
}

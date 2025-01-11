<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeCount(Post $post){
        return response()->json(['likeCount' => $post->likes->count()]);
    }
}

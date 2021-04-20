<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost($slug){
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('posts.show')->with('post', $post);
    }
}

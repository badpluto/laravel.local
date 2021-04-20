<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::get();
        //die(print_r($posts));
        return view('index')->with('posts', $posts);
    }
}

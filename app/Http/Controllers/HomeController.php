<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->paginate(3);
        return view('home', compact('posts'));
    }

    public function search(Request $request, Post $post){

        $posts = $post->search($request->input('search'))->get();
  
        return view('post.results', compact('posts'));
    }
}

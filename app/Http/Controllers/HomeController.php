<?php

namespace App\Http\Controllers;

use App\Status;
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
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $published_posts = Status::with('posts')->where('type', 'published')->get();

        foreach($published_posts as $published)
            $posts = $published->posts()->paginate(2);

        return view('home', compact('posts'));
    }

    public function search(Request $request, Post $post){

        if($request->has('search')) {
            $posts = $post->search($request->input('search'))->get();
        }

        return view('post.results', compact('posts'));
    }
}

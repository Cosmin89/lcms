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
        $posts = Post::whereHas('statuses', function ($query) {
            $query->where('type', 'published');
        })->orderBy('created_at', 'desc')->paginate(2); 

        return view('home', compact('posts'));

        // $response = [
        //     'posts' => $posts
        // ];

        // return response()->json($response, 200);
    }

    public function search(Request $request, Post $post){

        
        if($request->has('search')) {
            $posts = $post->search($request->input('search'))->get();
        }

        return view('post.results', compact('posts'));
    }
}

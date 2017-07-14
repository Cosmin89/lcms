<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Status;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        
        return view('admin.post.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->post_category;
        $post->author = $request->post_user;
        $post->user = $request->post_user;
        $post->tags = $request->tags;
        $post->content = $request->content;
        // $post->status = $request->post_status;

        $post->save();

        if ($request->post_status == 'published') {

            $post->statuses()->attach(Status::where('type', 'published')->first());

        }

        if ($request->post_status == 'draft') {

            $post->statuses()->attach(Status::where('type', 'draft')->first());

        }
      
        return redirect()->route('posts')->with('status', 'Post created successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['comments' => function($comments){
            $comments->whereHas('statuses', function($status) {
                $status->where('type', 'approved');
            });
        }])->get();

        return view('post.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->category_id = $request->post_category;
        $post->user = $request->post_user;
        $post->tags = $request->tags;
        $post->content = $request->content;
        // $post->status = $request->post_status;

        $post->save();

        $this->assignStatus($post, $request);

        return redirect()->route('post.edit', $post->id)->with('status', 'Post updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts');
    }

    public function assignStatus(Post $post, Request $request)
    {
        $post->statuses()->detach();

        if ($request->post_status == 'published') {

            $post->statuses()->attach(Status::where('type', 'published')->first());

        }

        if ($request->post_status == 'draft') {

            $post->statuses()->attach(Status::where('type', 'draft')->first());

        }

        return redirect()->back();

    }
}

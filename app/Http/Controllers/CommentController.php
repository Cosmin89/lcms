<?php

namespace App\Http\Controllers;

use App\Status;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::get();

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentFormRequest $request, Post $post)
    {

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->post()->associate($post);

        $comment->save();

        $comment->statuses()->attach(Status::where('type', 'unapproved')->first());

        return redirect()->route('post.show', $post)->with('status', 'Comment added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments');
    }

     public function assignStatus(Comment $comment, Request $request)
    {
        $comment->statuses()->detach();

        if ($request->comment_status == 'approved') {

            $comment->statuses()->attach(Status::where('type', 'approved')->first());

        }

        if ($request->comment_status == 'unapproved') {

            $comment->statuses()->attach(Status::where('type', 'unapproved')->first());

        }

        return redirect()->back();

    }
}

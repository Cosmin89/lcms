<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Comment;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $post_count = Post::count();
        $comment_count = Comment::count();
        $category_count = Category::count();
        $user_count = User::count();

        return view('admin.index', compact('post_count', 'comment_count', 'category_count', 'user_count'));
    }
}

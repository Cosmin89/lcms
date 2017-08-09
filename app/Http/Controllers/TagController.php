<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $tag->load(['posts' => function($posts) {
            $posts->whereHas('statuses', function($status) {
                $status->where('type', 'published');
            });
        }]);

        return view('tag.show', compact('tag'));
    } 
}

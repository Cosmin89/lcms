@extends('layouts.app')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>

        @foreach($posts as $post)

        <!-- First Blog Post -->
        <h2>
            <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
        </h2>
        <p class="lead">
            by <a href="#">{{ $post->author }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at->diffForHumans() }}</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>{{ $post->content }}</p>
        <a class="btn btn-primary" href="{{ route('post.show', ['id' => $post->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

        @endforeach

        {{ $posts->links() }}
    
    </div>
@endsection

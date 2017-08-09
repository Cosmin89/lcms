@extends('layouts.app')

@section('content') 

    <div class="col-lg-8">

        <!-- Blog Post -->
        <!-- First Blog Post -->
        <h2>
            <a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
        </h2>
        <p class="lead">
            by <a href="#">{{ $post->user }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span>Posted on {{ $post->created_at->diffForHumans() }}</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>{{ $post->content }}</p>

        <ol class="breadcrumb">
        Tags: 
        @foreach($post->tags as $tag)
              <li>
                <a href="{{ route('tag.show', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
              </li> / 
        @endforeach
         </ol>

        <hr>

        <!-- Blog Comments -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if($post->approvedComments->count() > 0)
        
        <h3>Comments:</h3>

        <!-- Posted Comments -->
            @foreach($post->approvedComments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h4>
                    {{ $comment->content }}
                </div>
            </div>

            <hr>

            @endforeach
        @endif

        @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="POST" action="{{ route('comment.store', ['id' => $post->id]) }}">
                {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                    <label for="Author">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ Auth::check() ? Auth::user()->username : '' }}">
                    @if($errors->has('user'))
                        <span class="help-block">
                            {{ $errors->first('author') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="Email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                    @if($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content" class="control-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="8" class="form-control"></textarea>
                
                    @if($errors->has('content'))
                        <span class="help-block">
                            {{ $errors->first('content') }}
                        </span>
                    @endif
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @endif

    </div>
    
    @include('layouts.partials._widgets')
@endsection
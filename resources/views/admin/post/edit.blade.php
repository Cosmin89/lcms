@extends('admin.layouts.app')

@section('content')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <form action="{{ route('post.update', ['slug' => $post->slug]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">

             @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            
        </div>

         <div class="form-group">
            <label for="slug">Post Slug</label>
            <p>{{ $post->slug }}</p>
        </div> 

        <div class="form-group">
            <label for="post_category">Category</label>

            <select name="post_category" id="">
                @foreach($categories as $cat)
                    @if($cat->id == $post->category_id)
                        <option selected value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @else
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="post_user">Users</label>

            <select name="post_user" id="">
                @foreach($users as $user)
                    <option value="{{ $user->username }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <select name="post_status" id="">
                @foreach($post->statuses as $status)
                <option value="{{ $status->type}}">{{ $status->type }}</option>
                    @if($status->type == 'draft')
                        <option value="published">published</option>
                    @else
                        <option value="draft">draft</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label for="tags">Post Tags</label>
            <select name="tag" id="">
                @foreach($post->tags as $tag)
                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach

                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content">Post Content</label>
            <textarea class="form-control" name="content" id="" cols="30" rows="10">
             {{ $post->content }}
            </textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>

        {{ method_field('PUT') }}

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Update Post">
        </div>
    </form>
@endsection
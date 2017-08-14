@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

             @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="post_category">Category</label>

            <select name="post_category" id="">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
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
                    <option value="published">published</option>
                    <option value="draft">draft</option>
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <select multiple="true" name="tag[]" id="">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content">Post Content</label>
            <textarea class="form-control" name="content" id="" cols="30" rows="10" value="{{ old('content') }}">
            </textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Publish Post">
        </div>
    </form>
@endsection
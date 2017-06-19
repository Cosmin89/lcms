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

        <!--<div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="post_author">
        </div>-->

        <div class="form-group">
            <select name="post_status" id="">
                <option value="draft">Post Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
            <label for="tags">Post Tags</label>
            <input type="text" class="form-control" name="tags" value="{{ old('tags') }}">
            @if ($errors->has('tags'))
                <span class="help-block">
                    <strong>{{ $errors->first('tags') }}</strong>
                </span>
            @endif
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
@extends('admin.layouts.app')

@section('content')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<form action="{{ route('user.update', ['username' => $user->username]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} 
    <div class="form-group{{ $errors->has('fist_name') ? ' has-error' : '' }}">
        <label for="first_name">Firstname</label>
        <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
        @if ($errors->has('fist_name'))
            <span class="help-block">
                <strong>{{ $errors->first('fist_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Lastname</label>
        <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <select name="role_user" id="">
            @foreach($user->roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
                @if($user->hasRole('admin'))
                    <option value="subscriber">subscriber</option>
                @else
                    <option value="admin">admin</option>
                @endif
            @endforeach
        </select>
    </div>

    <!--<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->

    <div class="form-group">
        <label for="username{{ $errors->has('username') ? ' has-error' : '' }}">Username</label>
        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    {{ method_field('PUT') }}

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form>

@endsection
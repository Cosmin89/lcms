@extends('admin.layouts.app')

@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} 
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username"  value="{{ old('username') }}">
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('fist_name') ? ' has-error' : '' }}">
        <label for="first_name">Firstname</label>
        <input type="text" class="form-control" name="first_name"  value="{{ old('first_name') }}">
        @if ($errors->has('fist_name'))
            <span class="help-block">
                <strong>{{ $errors->first('fist_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Lastname</label>
        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <select name="role_user" id="">
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <!--<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
</form>

@endsection
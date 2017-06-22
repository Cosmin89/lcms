@extends('admin.layouts.app')

@section('content')

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            
            <td>
            <form action="{{ route('user.change_role', ['username' => $user->username]) }}" method="POST">
                    {{ csrf_field() }}
                    @if($user->user_role == 'admin')
                        <input class="btn btn-success btn-sm" type="submit" name="user_role" value="subscribe">
                    @else
                        <input class="btn btn-success btn-sm" type="submit" name="user_role" value="admin">
                    @endif
            </form>        
            </td>

            <td><a class="btn btn-primary btn-sm" href="{{ route('user.profile', ['username' => $user->username]) }}">Edit</a></td>
            <td>
                <form action="{{ route('user.destroy', ['username' => $user->username]) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </tr>
        @endforeach
        
    </tbody>
</table>

@endsection
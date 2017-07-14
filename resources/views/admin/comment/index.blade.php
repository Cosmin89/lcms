@extends('admin.layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->email }}</td>
                <td>                
                    <form action="{{ route('comment.assign', ['id' => $comment->id]) }}" method="POST">
                        {{ csrf_field() }}
                        
                        <select name="comment_status" id="">
                                @foreach($comment->statuses as $status)
                                <option value="{{ $status->type }}">{{ $status->type }}</option>
                                    @if($status->type == 'unapproved')
                                        <option value="approved">approved</option>
                                    @else
                                        <option value="unapproved">unapproved</option>
                                    @endif
                                @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                </td>
                <td><a href="{{ route('post.show', ['id' => $comment->post->id]) }}">{{ $comment->post->title }}</a></td>
                <td>{{ $comment->created_at->diffForHumans() }}</td>
                <td>
                      <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="POST">
                        {{ csrf_field() }}
                        
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection
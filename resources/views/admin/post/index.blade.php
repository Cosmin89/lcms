@extends('admin.layouts.app')

@section('content')
<form action="" method="post">
    <table class="table table-bordered table-hover">

        <div id="bulkOptionsContainer" class="col-xs-4">
            <div class="form-group">
                <select class="form-control" name="bulk_options" id="">
                    <option value="">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="{{ route('post.create') }}" class="btn btn-primary">Create new</a> 
        </div>

        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>User</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                    <input class='checkBoxes' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
                        value="{{ $post->id }}">
                </td>

                <td>{{ $post->id }}</td>
                @if(!empty($post->author))
                    <td>{{ $post->author }}</td>
                @else
                    <td>{{ $post->user }}</td>
                @endif
                <td><a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>

                <td>{{ $post->category->title }}</td>

                <td>{{ $post->status }}</td>
                <td><img width='100' src=''></td>
                <td>{{ $post->tags }}</td>

                <td><a href="">{{ $post->comment_count }}</a></td>
                
                <td> {{ $post->created_at }}</td>
                <td><a class='btn btn-info' href="{{ route('post.edit', ['id' => $post->id ]) }}">Edit</a></td>
                
                <td>
                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>

                <td><a href="/">{{ $post->views_count }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection
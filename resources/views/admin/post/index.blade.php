@extends('admin.layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
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
                <td>{{ $post->user }}</td>
                <td><a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>

                <td>{{ $post->category->title }}</td>

                <td> 
                <form action="{{ route('post.assign', ['id' => $post->id]) }}" method="POST">
                    {{ csrf_field() }}
                    
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

                    <button type="submit" class="btn btn-primary">Assign</button>
                </form>
                </td>
                <td><img width='100' src=''></td>
                <td>
                @foreach($post->tags as $tag)
                    {{ $tag->name }}
                @endforeach
                </td>

                <td><a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->comments->count() }}</a></td>
                
                <td> {{ $post->created_at }}</td>
                <td><a class='btn btn-info' href="{{ route('post.edit', ['id' => $post->id ]) }}">Edit</a></td>
                
                <td>
                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                        {{ csrf_field() }}
                        
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>

                <td><a href="/">{{ $post->views_count }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
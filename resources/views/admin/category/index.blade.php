@extends('admin.layouts.app')

@section('content')

    <div class="col-xs-6">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @include('admin.category.create')
    </div><!-- Add Category Form-->
    <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody id="categories-list" name="categories-list">
            @foreach($categories as $category)
            <tr id="category{{$category->title}}">
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td><button class="btn btn-primary btn-detail open_modal" value="{{$category->title}}"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                <!--<td><a class='btn btn-info' href="{{ route('category.edit', ['id' => $category->id ]) }}">Edit</a>-->
                </td>
                <td>
                    <form action="{{ route('category.destroy', ['title' => $category->title]) }}" method="POST">
                        {{ csrf_field() }}
                        
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>    
        </table>
    </div>
    @include('admin.partials.modal.mymodal')
@endsection

@section('scripts')
    <script>
        var url = "/admin/category";
        //display modal form for category editing
         $(document).on('click', '.open_modal', function(){
            var category_title = $(this).val();
            $.get(url + '/' + category_title, function(data) {
                //success
                // console.log(data);
                $('#category_title').val(data.title);
                $('#title').val(data.title);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            })
        });

        $('#btn_add').click(function() {
            $('#btn-save').val("add");
            $('#formCategories').trigger("reset");
            $('#myModal').modal('show');
        });

        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            e.preventDefault();
            var formData = {
                title: $('#title').val(),
            }
            var state = $('#btn-save').val();

            var type = "POST";
            var category_title = $('#category_title').val();
            var my_url = url;
            
            if(state == "update") {
                type = "PUT";
                my_url += '/' + category_title;
            }
            console.log(formData);
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var category = '<tr id="category' + data.title + '"><td>' + data.id + '</td><td>' + data.title + '</td>';
                    category += '<td><button class="btn btn-primary btn-detail open_modal" value="' + data.title + '"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>';
                    category += '<td><button class="btn btn-danger btn-delete delete-category" value="' + data.title + '">Delete</button></td></tr>';
                    if(state == "add"){
                        $('#categories-list').append(category);
                    }else {
                        $("#category" + category_title).replaceWith(category);
                    }
                    $('#formCategories').trigger("reset");
                    $('#myModal').modal('hide');
                },
                error: function(data) {
                    console.log('Error: ', data);
                }
            });
        });
    </script>
@endsection

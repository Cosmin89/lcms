

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
         <form role="form" method="POST" action="{{ route('search') }}">
                {{ csrf_field() }}

                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                            <button class="btn btn-primary" name="submit" type="submit">
                                    Search
                            </button>
                    </span>    
                </div>
        </form>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                @foreach($categories as $category)
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->title }}</a>
                    </li>
                </ul>
                @endforeach
            </div>

            <!-- /.col-lg-6 -->
           
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
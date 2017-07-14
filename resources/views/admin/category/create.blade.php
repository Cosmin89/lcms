 <form action="{{ route('category.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">Add Category</label>
        <input type="text" class="form-control" name="title">
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>
</form>
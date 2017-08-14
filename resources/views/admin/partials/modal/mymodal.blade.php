 <!-- Button trigger modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Category</h4>
      </div>
      <div class="modal-body"> 
      <form id="formCategories" name="formCategories" novalidate=""> 
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="">          
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
          <input type="hidden" id="category_title" name="category_title" value="0">
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<meta name="_token" content="{{ csrf_token() }}" />
 
 
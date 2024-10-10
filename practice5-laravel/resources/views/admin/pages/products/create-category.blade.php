<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title m-0" id="createCategoryModalLabel">Create category</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input placeholder="Enter category name" type="text" class="form-control" id="categoryName"
            name="categoryName">
        </div>
        <div class="form-group">
          <label for="categoryDescription">Category Description</label>
          <textarea placeholder="Enter category description" class="form-control" name="categoryDescription"
            id="categoryDescription" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i>
          <span class="ml-1">Save</span>
        </button>
      </div>
    </form>
  </div>
</div>

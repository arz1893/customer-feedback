<!-- Modal -->
<div class="modal fade" id="modal_add_sub" tabindex="-1" role="dialog" aria-labelledby="modal_title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-primary" id="modal_title">Add Category</h3>
            </div>
            {{ Form::open(['action' => 'MasterData\ProductCategoryController@store', 'id' => 'form_add_category']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('name', 'Name', ['class' => 'control-label', 'id' => 'lbl_add_category']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter category name', 'id' => 'txt_add_category']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade"
     id="modal_edit_category"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal_edit_label"
     aria-hidden="true"
     data-id=""
     data-type="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_label">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::label('name', 'Enter Category Name', ['class' => 'control-label', 'id' => 'lbl_edit_category']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category Name', 'id' => 'txt_edit_category']) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-id=""
                        id="btn_update_category"
                        type="submit"
                        class="btn btn-primary"
                        onclick="updateCategory(this)">
                    Update Category
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade"
     id="modal_delete_category"
     tabindex="-1"
     role="dialog"
     aria-labelledby="modal_delete_label"
     aria-hidden="true"
     data-id=""
     data-type="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_delete_label">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this category ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-id=""
                        id="btn_delete_category"
                        type="submit"
                        class="btn btn-primary"
                        onclick="deleteCategory(this)">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
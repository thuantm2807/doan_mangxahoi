<div class="modal fade modal-create-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog max-width-90" role="document">
        <div class="modal-content">
            <form method="post" class="form-post" url="{{ route('createPost') }}" enctype='multipart/form-data'>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="description" class="summernote"></textarea>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="create-program" tabindex="-1" aria-labelledby="createProgramTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createProgramTitle">Create New Program</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>

            <form action="{{ route('program.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="prog-name" class="form-label">Name</label>
                        <input name="name" id="prog-name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="prog-desc" class="form-label">Description</label>
                        <textarea name="description" id="prog-desc" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save Program</button>
                </div>
            </form>
        </div>
    </div>
</div>

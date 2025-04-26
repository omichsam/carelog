<div class="modal fade" id="edit-program-{{ $program->id ?? '__ID__' }}" tabindex="-1" aria-labelledby="editProgramTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editProgramTitle">Edit Program - {{ $program->program_number }}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>

            <form action="{{ route('program.update', $program ?? '__ID__') }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="prog-name-edit" class="form-label">Name</label>
                        <input name="name" id="prog-name-edit" class="form-control"
                            value="{{ $program->name ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prog-desc-edit" class="form-label">Description</label>
                        <textarea name="description" id="prog-desc-edit" rows="3" class="form-control">{{ $program->description ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input type="radio" name="is_active" id="is_active_1" value="1"
                                class="form-check-input @error('is_active') is-invalid @enderror"
                                {{ old('is_active', $program->is_active) == 1 ? 'checked' : '' }} required>
                            <label for="is_active_1" class="form-check-label">Active</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="is_active" id="is_active_0" value="0"
                                class="form-check-input @error('is_active') is-invalid @enderror"
                                {{ old('is_active', $program->is_active) == 0 ? 'checked' : '' }} required>
                            <label for="is_active_0" class="form-check-label">Inactive</label>
                        </div>
                        @error('is_active')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Update Programme</button>
                </div>
            </form>
        </div>
    </div>
</div>

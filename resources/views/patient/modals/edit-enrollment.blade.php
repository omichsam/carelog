<div class="modal" id="edit-enrol-{{ $enrollment->id ?? '__ID__' }}" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEnrolTitle">
                    Update Enrolment
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form action="{{ route('enrollment.update', $enrollment ?? '__ID__') }}" method="post">
                @csrf @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="status-{{ $enrollment->id ?? '__ID__' }}" class="form-label">
                            Status
                        </label>
                        <select name="status" id="status-{{ $enrollment->id ?? '__ID__' }}" class="form-select"
                            required>
                            <option value="active" @selected(($enrollment->status ?? '') === 'active')>Active</option>
                            <option value="completed" @selected(($enrollment->status ?? '') === 'completed')>Completed</option>
                            <option value="dropped" @selected(($enrollment->status ?? '') === 'dropped')>Dropped</option>
                        </select>
                    </div>

                    <div class="mb-0">
                        <label for="notes-{{ $enrollment->id ?? '__ID__' }}" class="form-label">
                            Notes (optional)
                        </label>
                        <textarea name="notes" id="notes-{{ $enrollment->id ?? '__ID__' }}" rows="3" class="form-control">{{ $enrollment->notes ?? '' }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

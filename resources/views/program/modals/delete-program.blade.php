<div class="modal fade" id="delete-program-{{ $program->id ?? '__ID__' }}" tabindex="-1" aria-labelledby="delProgramTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="delProgramTitle">Delete Program - {{ $program->program_number }}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <p class="mb-0">
                    <strong>Caution !</strong> Deleting
                    <span class="text-danger fw-bold">{{ $program->name ?? 'this programme' }}</span>
                    will <strong><u>irreversibly remove</u></strong> the program from the system with all associated
                    patient enrollments.
                </p>
                <p class="mb-0">This action cannot be undone.</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger"
                    onclick="document.getElementById('form-del-{{ $program->id ?? '__ID__' }}').submit();">
                    Yes, Delete
                </button>
            </div>

            <!-- hidden form -->
            <form id="form-del-{{ $program->id ?? '__ID__' }}"
                action="{{ route('program.destroy', $program ?? '__ID__') }}" method="post" class="d-none">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
</div>

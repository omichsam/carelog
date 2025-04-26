<div class="modal fade" id="view-program-{{ $program->id ?? '__ID__' }}" tabindex="-1" aria-labelledby="viewProgramTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="viewProgramTitle">Program Details - {{ $program->program_number }}</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <h6 class="text-uppercase">Basic Info</h6>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2"><strong>Program No. :</strong> {{ $program->program_number }}</div>
                    <div class="col-md-6 mb-2"><strong>ID :</strong> {{ $program->id }}</div>
                    <div class="col-md-6 mb-2"><strong>Name :</strong> {{ $program->name }}</div>
                    <div class="col-md-6 mb-2"><strong>Status :</strong>
                        <span
                            class="badge badge-pill {{ $program->is_active ? 'bg-success' : 'bg-danger' }} text-light">
                            {{ $program->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <h6 class="text-uppercase mt-4">Description</h6>
                <hr>
                <p class="mb-0">{{ $program->description ?? '—' }}</p>
            </div>
        </div>
    </div>
</div>

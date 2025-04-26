<div class="modal fade" id="view-patient-{{ $patient->id ?? '__ID__' }}" tabindex="-1" aria-labelledby="view-patient-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="view-patient-title">Patient Profile</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <h6 class="text-uppercase">Personal Details</h6>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2"><strong>Patient No: </strong> {{ $patient->patient_number }}</div>
                    <div class="col-md-6 mb-2"><strong>Name: </strong> {{ $patient->first_name }}
                        {{ $patient->last_name }}</div>
                    <div class="col-md-6 mb-2"><strong>DOB: </strong> {{ $patient->dob->format('d M, Y') }}</div>
                    <div class="col-md-6 mb-2"><strong>Gender: </strong> {{ $patient->gender }}</div>
                    <div class="col-md-6 mb-2"><strong>Phone: </strong> {{ $patient->phone }}</div>
                    <div class="col-md-6 mb-2"><strong>ID/Passport: </strong> {{ $patient->id_number }}</div>
                </div>

                <hr class="my-3">
                <h6 class="text-uppercase">Program Enrollments</h6>
                <hr class="my-3">
                <ul class="list-group list-group-flush">
                    @foreach ($patient->enrollments as $enr)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $enr->program->name }}</strong>
                                    <div class="small text-muted">Enrolled @ {{ $enr->enrolled_at->format('d M Y') }}
                                    </div>
                                </div>
                                <span class="small">By Dr. {{ $enr->doctor->name }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

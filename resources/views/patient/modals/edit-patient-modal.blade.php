<div class="modal fade" id="edit-patient-{{ $patient->id ?? '__ID__' }}" tabindex="-1" role="dialog"
    aria-labelledby="edit-patient-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="edit-patient-title">Edit Patient Details - {{ $patient->patient_number }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form action="{{ route('patient.update', $patient ?? '__ID__') }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="first-name-edit">First Name</label>
                            <input name="first_name" id="first-name-edit" class="form-control"
                                value="{{ $patient->first_name ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="last-name-edit">Last Name</label>
                            <input name="last_name" id="last-name-edit" class="form-control"
                                value="{{ $patient->last_name ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="dob-edit">Date of Birth</label>
                            <input name="dob" id="dob-edit" type="date" class="form-control"
                                value="{{ $patient->dob?->format('Y-m-d') ?? '' }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="gender-edit">Gender</label>
                            <select name="gender" id="gender-edit" class="form-control" required>
                                <option disabled value="">-- Select --</option>
                                <option value="Male" @selected(($patient->gender ?? '') === 'Male')>Male</option>
                                <option value="Female" @selected(($patient->gender ?? '') === 'Female')>Female</option>
                                <option value="Other" @selected(($patient->gender ?? '') === 'Other')>Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone-edit">Phone</label>
                            <input name="phone" id="phone-edit" type="tel" class="form-control"
                                value="{{ $patient->phone ?? '' }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id-number-edit">National ID / Passport</label>
                            <input name="id_number" id="id-number-edit" class="form-control"
                                value="{{ $patient->id_number ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>

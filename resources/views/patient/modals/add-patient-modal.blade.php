<div class="modal fade" id="create-patient-modal" tabindex="-1" role="dialog" aria-labelledby="create-patient-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-patient-title">Register New Patient</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>

            <form action="{{ route('patient.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="first-name">First Name</label>
                            <input name="first_name" id="first-name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last-name">Last Name</label>
                            <input name="last_name" id="last-name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dob">Date of Birth</label>
                            <input name="dob" id="dob" type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option disabled selected value="">-- Select --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input name="phone" id="phone" type="tel" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="id-number">National ID / Passport</label>
                            <input name="id_number" id="id-number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>

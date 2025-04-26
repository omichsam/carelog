<div class="modal fade" id="enrol-patient-{{ $patient->id ?? '__ID__' }}" tabindex="-1" role="dialog"
    aria-labelledby="enrol-patient-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrol-patient-title">Enroll Patient to Program -
                    {{ $patient->patient_number }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form action="{{ route('patient.enroll', $patient ?? '__ID__') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="program">Select Program</label>
                        <select name="program_id" id="program" class="form-control" required>
                            <option disabled selected value="">-- choose --</option>
                            @foreach ($patient->unenrolled_programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label for="notes">Notes (optional)</label>
                        <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enroll</button>
                </div>
            </form>
        </div>
    </div>
</div>

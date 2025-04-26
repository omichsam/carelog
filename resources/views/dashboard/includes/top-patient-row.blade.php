<div class="list-group-item">
    <div class="row align-items-center">
        <div class="col-3 col-md-2">
            <img src="assets/img/profile_holder.jpg" alt="..." class="thumbnail-sm">
        </div>

        <div class="col">
            <strong>{{ $patient->first_name }} {{ $patient->last_name }}</strong>
            <div class="my-0 text-muted small">{{ $patient->patient_number }}</div>
        </div>

        <div class="col-auto text-end">
            <span>
                {{ $patient->total_enrollments }} Program(s)</span>
            </span>

        </div>
    </div>
</div>

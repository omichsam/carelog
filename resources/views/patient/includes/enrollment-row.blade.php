<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $enrollment->program->name }}</strong>
            <div class="small text-muted">Enrolled on
                {{ $enrollment->enrolled_at->format('d M Y') }}
            </div>
            @if ($enrollment->status == 'active')
                <span class="badge badge-pill bg-primary text-light">Active</span>
            @elseif($enrollment->status == 'completed')
                <span class="badge badge-pill bg-success text-light">Completed</span>
            @else
                <span class="badge badge-pill bg-danger text-light">Dropped</span>
            @endif
        </div>
        <div>
            <span class="small">By {{ $enrollment->doctor->name }}</span><br>
            @if ($enrollment->status == 'active')
                <a class="btn btn-sm btn-outline-primary mt-2" data-toggle="modal"
                    href="#edit-enrol-{{ $enrollment->id }}">Update
                    Enrollment</a>
            @endif
        </div>
    </div>
</li>
@include('patient.modals.edit-enrollment', ['enrollment' => $enrollment])

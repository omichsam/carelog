<tr>
    <td>{{ $program->program_number }}</td>
    <td>{{ $program->name }}</td>
    <td>
        @if ($program->is_active != 1)
            <span class="badge badge-pill badge-danger text-light">Inactive</span>
        @else
            <span class="badge badge-pill badge-success text-light">Active</span>
        @endif
    </td>
    <td>
        <div class="btn-group" role="group" aria-label="Patient Actions for {{ $program->id }}">
            <button type="button" class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="View Program Details" data-toggle="modal"
                data-target="#view-program-{{ $program->id }}">
                <i class="fe fe-eye fe-16"></i>
            </button>
            <button type="button"
                class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Program" data-toggle="modal"
                data-target="#edit-program-{{ $program->id }}">
                <i class="fe fe-edit fe-16"></i>
            </button>
            <button type="button"
                class="btn btn-sm btn-outline-danger d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Program" data-toggle="modal"
                data-target="#delete-program-{{ $program->id }}">
                <i class="fe fe-trash fe-16"></i>
            </button>
        </div>
    </td>
</tr>

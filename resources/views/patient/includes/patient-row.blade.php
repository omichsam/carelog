<tr>
    <td>{{ $patient->patient_number }}</td>
    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
    <td>{{ $patient->phone }}</td>
    <td>{{ $patient->id_number }}</td>
    <td>{{ $patient->dob->format('d M, Y') }}</td>
    <td>{{ $patient->gender }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Patient Actions for {{ $patient->id }}">
            <button type="button" class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="View Patient Profile" data-toggle="modal"
                data-target="#view-patient-{{ $patient->id }}">
                <i class="fe fe-eye fe-16"></i>
            </button>
            <button type="button"
                class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile" data-toggle="modal"
                data-target="#edit-patient-{{ $patient->id }}">
                <i class="fe fe-edit fe-16"></i>
            </button>
            <button type="button"
                class="btn btn-sm btn-outline-success d-flex align-items-center justify-content-center"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Enroll Patient" data-toggle="modal"
                data-target="#enrol-patient-{{ $patient->id }}">
                <i class="fe fe-user-plus fe-16"></i>
            </button>
        </div>
    </td>
</tr>

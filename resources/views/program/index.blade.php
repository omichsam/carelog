@extends('includes.layout')

@section('section')
    <div class="row">
        <div class="col-md-10">
            <h2 class="mb-2 page-title">Programs</h2>
            <p class="card-text">
                Here's a list of all programs. You can add, edit, or delete programs as needed.
            </p>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#id">Add Program</button>
        </div>
        <div class="col-md-12">
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>Program No.</th>
                                        <th class="w-75">Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PR12345</td>
                                        <td>Malaria</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Patient Actions for">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="View Program Details" data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-eye fe-16"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Program"
                                                    data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-edit fe-16"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Program"
                                                    data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-trash fe-16"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- simple table -->
            </div>
            <!-- end section -->
        </div>
    </div>
@endsection

@extends('includes.layout')

@section('section')
    <div class="row">
        <div class="col-md-10">
            <h2 class="mb-2 page-title">Patients</h2>
            <p class="card-text">
                Here's a list of all patients in the system. You can add a
                patient, view their profile and even enroll them in a program.
            </p>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#id">Add Patient</button>
            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#id">Filter
                Patient</button>
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
                                        <th>Patient No.</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>ID Number</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>P00001</td>
                                        <td>John Doe</td>
                                        <td>+254712345678</td>
                                        <td>12345678</td>
                                        <td>01/01/1990</td>
                                        <td>Male</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Patient Actions for">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="View Patient Profile" data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-eye fe-16"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"
                                                    data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-edit fe-16"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-success d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Enroll Patient"
                                                    data-toggle="modal" data-target="#id">
                                                    <i class="fe fe-user-plus fe-16"></i>
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

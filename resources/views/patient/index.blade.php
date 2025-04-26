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
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#create-patient-modal">Add
                Patient</button>
            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal"
                data-target="#filter-patients">Filter
                Patient</button>
        </div>
        <div class="col-md-12">
            @include('includes.alert')
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
                                    @foreach ($patients as $patient)
                                        @include('patient.includes.patient-row', ['patient' => $patient])
                                    @endforeach
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
    @include('patient.modals.add-patient-modal')
    @include('patient.modals.filter-patients-modal')
    @foreach ($patients as $patient)
        @include('patient.modals.edit-patient-modal', ['patient' => $patient])
        @include('patient.modals.view-patient-profile-modal', ['patient' => $patient])
        @include('patient.modals.enroll-patient', ['patient' => $patient])
    @endforeach
@endsection

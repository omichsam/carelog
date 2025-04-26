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
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#create-program">Add
                Program</button>
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
                                        <th>Program No.</th>
                                        <th class="w-50">Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $program)
                                        @include('program.includes.program-row', ['program' => $program])
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
    @include('program.modals.create-program')
    @foreach ($programs as $program)
        @include('program.modals.view-program-detail', ['program' => $program])
        @include('program.modals.edit-program', ['program' => $program])
        @include('program.modals.delete-program', ['program' => $program])
    @endforeach
@endsection

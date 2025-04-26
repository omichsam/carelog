@extends('includes.layout')

@section('section')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Welcome Dr. Samson
                        Michira</h2>
                </div>
            </div>
            <!-- widgets -->
            <div class="row my-4">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-muted mb-1">No.
                                        of Doctor</small>
                                    <h3 class="card-title mb-0">1168</h3>
                                </div>
                            </div> <!-- /. row -->
                        </div> <!-- /. card-body -->
                    </div> <!-- /. card -->
                </div> <!-- /. col -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-muted mb-1">No.
                                        of Patients</small>
                                    <h3 class="card-title mb-0">68</h3>
                                </div>
                            </div> <!-- /. row -->
                        </div> <!-- /. card-body -->
                    </div> <!-- /. card -->
                </div> <!-- /. col -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-muted mb-1">No.
                                        of Programs</small>
                                    <h3 class="card-title mb-0">108</h3>
                                </div>
                            </div> <!-- /. row -->
                        </div> <!-- /. card-body -->
                    </div> <!-- /. card -->
                </div> <!-- /. col -->
            </div> <!-- end section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-2">
                        <div class="card-header">
                            <strong>Program Stats</strong>
                        </div>
                        <div class="card-body px-4">
                            <div class="row border-bottom">
                                <div class="col-4 text-center mb-3">
                                    <p class="mb-1 small text-muted">Enrolled
                                        Patients</p>
                                    <span class="h3">26</span>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <p class="mb-1 small text-muted">Active
                                        %</p>
                                    <span class="h3">26%</span>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <p class="mb-1 small text-muted">Completion
                                        %</p>
                                    <span class="h3">6%</span>
                                </div>
                            </div>
                            <p class="pt-3"><strong>Popular
                                    Program</strong></p>
                            <table class="table table-borderless mt-3 mb-1 mx-n1 table-sm">
                                <thead>
                                    <tr>
                                        <th class="w-50"></th>
                                        <th class="text-right">Active</th>
                                        <th class="text-right">Completion</th>
                                        <th class="text-right">Dropped</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Malaria</td>
                                        <td class="text-right">260</td>
                                        <td class="text-right">150</td>
                                        <td class="text-right">100</td>
                                    </tr>
                                    <tr>
                                        <td>Malaria</td>
                                        <td class="text-right">260</td>
                                        <td class="text-right">150</td>
                                        <td class="text-right">100</td>
                                    </tr>
                                    <tr>
                                        <td>Malaria</td>
                                        <td class="text-right">260</td>
                                        <td class="text-right">150</td>
                                        <td class="text-right">100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Top
                                Patients</strong>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-2">
                                            <img src="assets/img/profile_holder.jpg" alt="..." class="thumbnail-sm">
                                        </div>

                                        <div class="col">
                                            <strong>Samson
                                                Michira</strong>
                                            <div class="my-0 text-muted small">P123456</div>
                                        </div>

                                        <div class="col-auto text-end">
                                            <span>
                                                20 Programs</span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-2">
                                            <img src="assets/img/profile_holder.jpg" alt="..." class="thumbnail-sm">
                                        </div>

                                        <div class="col">
                                            <strong>Samson
                                                Michira</strong>
                                            <div class="my-0 text-muted small">P123456</div>
                                        </div>

                                        <div class="col-auto text-end">
                                            <span>
                                                20 Programs</span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-2">
                                            <img src="assets/img/profile_holder.jpg" alt="..." class="thumbnail-sm">
                                        </div>

                                        <div class="col">
                                            <strong>Samson
                                                Michira</strong>
                                            <div class="my-0 text-muted small">P123456</div>
                                        </div>

                                        <div class="col-auto text-end">
                                            <span>
                                                20 Programs</span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3 col-md-2">
                                            <img src="assets/img/profile_holder.jpg" alt="..." class="thumbnail-sm">
                                        </div>

                                        <div class="col">
                                            <strong>Samson
                                                Michira</strong>
                                            <div class="my-0 text-muted small">P123456</div>
                                        </div>

                                        <div class="col-auto text-end">
                                            <span>
                                                20 Programs</span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- / .list-group -->
                        </div> <!-- / .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .col -->
            </div> <!-- .row -->
        </div> <!-- /.col -->
    </div>
@endsection

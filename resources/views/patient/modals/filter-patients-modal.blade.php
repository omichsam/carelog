<div class="modal fade modal-slide" id="filter-patients" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Patients</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form action="{{ route('patient.index') }}" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Any</option>
                            <option value="Male" @selected(request('gender') === 'Male')>Male</option>
                            <option value="Female" @selected(request('gender') === 'Female')>Female</option>
                            <option value="Other" @selected(request('gender') === 'Other')>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age_group">Age Group</label>
                        <select name="age_group" id="age_group" class="form-control">
                            <option value="">Any</option>
                            <option value="0-12" @selected(request('age_group') === '0-12')>0 - 12 yrs</option>
                            <option value="13-17" @selected(request('age_group') === '13-17')>13 - 17 yrs</option>
                            <option value="18-30" @selected(request('age_group') === '18-30')>18 - 30 yrs</option>
                            <option value="31-45" @selected(request('age_group') === '31-45')>31 - 45 yrs</option>
                            <option value="46-60" @selected(request('age_group') === '46-60')>46 - 60 yrs</option>
                            <option value="61-200" @selected(request('age_group') === '61-200')>> 60 yrs</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="enrolled">Enrollment Status</label>
                        <select name="enrolled" id="enrolled" class="form-control">
                            <option value="">Any</option>
                            <option value="yes" @selected(request('enrolled') === 'yes')>Currently Enrolled</option>
                            <option value="no" @selected(request('enrolled') === 'no')>Not Enrolled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="program_id">Enrolled to Program</label>
                        <select name="program_id" id="program_id" class="form-control">
                            <option value="">Any program</option>
                            @foreach ($programs as $p)
                                <option value="{{ $p->id }}" @selected(request('program_id') == $p->id)>{{ $p->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="{{ route('patient.index') }}" class="btn btn-outline-secondary">Reset Filters</a>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>
</div>

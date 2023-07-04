@extends('admin.layout.base')

@section('content')
    <div class="container mb-5">
        <div class="card card-default">
            <div class="card-header bg-dark text-light">
                <h2>Profile Education</h2>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="university" style="font-weight: bold">University</label>
                        <input type="text" class="form-control bg-secondary text-light" id="university"
                               value="{{ isset($profile->education) ? $profile->education->university : '' }}"
                               disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="university_field" style="font-weight: bold">University Field</label>
                        <input type="text" class="form-control bg-secondary text-light" id="university_field"
                               value="{{ isset($profile->education) ? $profile->education->field : '' }}"
                               disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="university_grade" style="font-weight: bold">Grade</label>
                        <input type="text" class="form-control bg-secondary text-light" id="university_grade"
                               value="{{ isset($profile->education) ? $profile->education->grade : '' }}"
                               disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="work_job" style="font-weight: bold">Work Job</label>
                        <input type="text" class="form-control bg-secondary text-light" id="work_job"
                               value="{{ isset($profile->education) ? $profile->education->job : '' }}"
                               disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="entry_year" style="font-weight: bold">Entry Year</label>
                        <input type="text" class="form-control bg-secondary text-light" id="entry_year"
                               value="{{ isset($profile->education) ? $profile->education->enter_year : '' }}"
                               disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="gpa" style="font-weight: bold">GPA</label>
                        <input type="text" class="form-control bg-secondary text-light" id="gpa"
                               value="{{ isset($profile->education) ? $profile->education->GPA : '' }}"
                               disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="graduated" style="font-weight: bold">Graduated At</label>
                        <input type="text" class="form-control bg-secondary text-light" id="graduated"
                               value="{{ isset($profile->education) ? $profile->education->exit_year : '' }}"
                               disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container my-5">
        <div class="card card-default">
            <div class="card-header bg-dark text-light">
                <h2>Profile Address</h2>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="country" style="font-weight: bold">Country</label>
                        <input type="text" class="form-control bg-secondary text-light" id="country"
                               value="{{ isset($profile->address) ? $profile->address->city->country->name : '' }}"
                               disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="city" style="font-weight: bold">City</label>
                        <input type="text" class="form-control bg-secondary text-light" id="city"
                               value="{{ isset($profile->address) ? $profile->address->city->name : '' }}"
                               disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="address" style="font-weight: bold">Address</label>
                        <input type="text" class="form-control bg-secondary text-light" id="address"
                               value="{{ isset($profile->address) ? $profile->address->address : '' }}"
                               disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

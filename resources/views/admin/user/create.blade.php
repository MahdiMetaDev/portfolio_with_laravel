@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create User
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.user.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 ">
                    <input type="text" placeholder="Name" name="name"
                           class="form-control"
                           value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Family" name="family"
                           class="form-control"
                           value="{{ old('family') }}">
                    @error('family')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <select name="gender" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="email" placeholder="Email" name="email"
                           class="form-control mt-2"
                           value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="password" placeholder="Password" name="password"
                           class="form-control mt-2"
                           value="{{ old('password') }}">
                    @error('password')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="password" placeholder="Password Confirmation" name="c_password"
                           class="form-control mt-2"
                           value="{{ old('c_password') }}">
                    @error('c_password')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Create" class="btn btn-success mt-3">
                </div>
                <div class="col-md-6">
                    <input type="file" name="image"
                           class="form-control mt-2"
                           value="{{ old('image') }}">
                    @error('image')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection()

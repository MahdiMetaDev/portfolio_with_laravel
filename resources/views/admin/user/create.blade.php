@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create User
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.user.store') }}">
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
                    <input type="email" placeholder="Email" name="email"
                           class="form-control"
                           value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="password" placeholder="Password" name="password"
                           class="form-control"
                           value="{{ old('password') }}">
                    @error('password')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection()

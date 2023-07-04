@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.user.update') }}">
                @csrf
                @method('PATCH')
                <div class="col-md-6 ">
                    <input type="text" placeholder="Name" name="name"
                           class="form-control"
                           value="{{ $user->name }}">
                    @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Family" name="family"
                           class="form-control"
                           value="{{ $user->family }}">
                    @error('family')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="email" placeholder="Email" name="email"
                           class="form-control"
                           value="{{ $user->email }}">
                    @error('email')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection()

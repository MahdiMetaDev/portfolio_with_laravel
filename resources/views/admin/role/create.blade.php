@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create Role For Users
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.role.store') }}">
                @csrf
                <div class="col-md-6">
                    <input type="text" placeholder="role_name" name="name"
                           class="form-control"
                           value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Create" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection()

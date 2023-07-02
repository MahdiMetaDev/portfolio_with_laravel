@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Update Role For Users
        </div>
        <div class="card-body">
            <form method="post" class="form-control" novalidate action="{{ route('admin.role.update', $role->id) }}">
                @csrf
                @method('PATCH')
                <div class="">
                    <label for="role_name">
                        <input type="text" placeholder="role_name" name="name"
                               value="{{ $role->name }}" id="role_name">
                    </label>
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
@endsection()

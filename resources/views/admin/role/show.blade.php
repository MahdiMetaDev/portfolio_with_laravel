@extends('admin.layout.base')

@section('content')
    <label for="role_name">Name</label>
    <input type="text" value="{{ $role->name }}" id="role_name" disabled>
@endsection()

@extends('admin.layout.base')

@section('content')
    <h1>show role with its id</h1>
    <hr>
    {{ $role->name }}
    {{ $role->id }}

@endsection()

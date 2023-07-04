@extends('admin.layout.base')

@section('top_title')
    Roles List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.role.show', $role->id) }}">show</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()

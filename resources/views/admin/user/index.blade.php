@extends('admin.layout.base')

@section('top_title')
    Users List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.user.show', $user->id) }}">show</a></button>
                        <button class="bg-primary"><a class="text-light" href="{{ route('admin.user.edit', $user->id) }}">edit</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()

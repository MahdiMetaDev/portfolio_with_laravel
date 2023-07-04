@extends('admin.layout.base')

@section('top_title')
    Profiles List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>National Code</th>
                <th>Phone Number</th>
                <th>Date of Birth</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->user->name }}</td>
                    <td>{{ $profile->user->family }}</td>
                    <td>{{ $profile->national_code }}</td>
                    <td>{{ $profile->phone_number }}</td>
                    <td>{{ $profile->date_of_birth }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.profile.show', $profile->id) }}">show</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()

@extends('admin.layout.base')

@section('top_title')
    Countries List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Population</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->population }}</td>
                    <td>{{ $country->created_at }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.country.show', $country->id) }}">show</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()

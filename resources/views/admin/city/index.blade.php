@extends('admin.layout.base')

@section('top_title')
    Cities List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Country Id</th>
                <th>Name</th>
                <th>Population</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->country_id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->population }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.city.show', $city->id) }}">show</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()

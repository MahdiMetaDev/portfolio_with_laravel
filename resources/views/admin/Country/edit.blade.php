@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit Country
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.country.update') }}">
                @csrf
                @method('PATCH')
                <div class="col-md-6 ">
                    <input type="text" placeholder="country_name" name="name"
                           class="form-control"
                           value="{{ $country->name }}">
                    @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="number" placeholder="country_population" name="population"
                           class="form-control"
                           value="{{ $country->population }}">
                    @error('population')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Update">
                </div>
                <input type="submit" value="Update" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection()

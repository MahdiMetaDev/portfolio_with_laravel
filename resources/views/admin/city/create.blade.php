@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Create City
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.city.store') }}">
                @csrf
                <div class="col-md-6 ">
                    <input type="text" placeholder="City_Name" name="name"
                           class="form-control"
                           value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="number" placeholder="Country Id" name="country_id"
                           class="form-control"
                           value="{{ old('country_id') }}">
                    @error('country_id')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="number" placeholder="Population" name="population"
                           class="form-control mt-2"
                           value="{{ old('population') }}">
                    @error('population')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Create" class="btn btn-success mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection()

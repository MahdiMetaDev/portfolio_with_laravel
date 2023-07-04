@extends('admin.layout.base')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Edit Blog
        </div>
        <div class="card-body">
            <form method="post" class="row g-3" novalidate action="{{ route('admin.blog.update') }}">
                @csrf
                @method('PATCH')
                <div class="col-md-6 ">
                    <input type="text" placeholder="blog_title" name="name"
                           class="form-control"
                           value="{{ $blog->title }}">
                    @error('title')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="blog_description" name="description"
                           class="form-control"
                           value="{{ $blog->description }}">
                    @error('description')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="number" placeholder="blog_userId" name="user_id"
                           class="form-control mt-2"
                           value="{{ $blog->user_id }}">
                    @error('user_id')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="Edit" class="btn btn-success mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection()

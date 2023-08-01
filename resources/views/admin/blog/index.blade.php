@extends('admin.layout.base')

@section('top_title')
    Blogs List
@endsection

@section('content')
    <div class="card card-default">
        <table class="table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Created At</th>
                <th>settings</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->user->name }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                        <button class="bg-dark"><a class="text-light" href="{{ route('admin.blog.show', $blog->id) }}">show</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection()

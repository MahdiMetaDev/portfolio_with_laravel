@extends('layout.base')

@section('title', 'home')

@section('content')
    @auth()
        <div class="d-flex justify-content-center box">
            <div class="card shadow my-3 p-5 w-sm-75 w-100">
                <div class="card-body">
                    <h1>You have logged in.</h1>
                </div>
            </div>
        </div>
    @endauth
    @guest()
        <div class="d-flex justify-content-center">
            <div class="card shadow my-3 p-5 w-sm-75 w-100">
                <div class="card-body">
                    <h1 class="text-center">Please login first.</h1>
                </div>
            </div>
        </div>
    @endguest
@endsection

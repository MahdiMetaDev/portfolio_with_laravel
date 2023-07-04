@extends('errors::minimal')

@section('title', __('Forbidden'))
{{--@section('code', '403')--}}
{{--@section('message', 'You can not view this page according to 403 error!!')--}}

@section('content')
    <h1>you are not allowed to see this page!</h1>
@endsection

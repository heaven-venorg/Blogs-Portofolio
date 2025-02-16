@extends('admin.layout.app')
@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <h1 class="text-dark fw-bolder">Hello Welcome {{ Auth()->user()->name }}</h1>
        <p>You is admin in here</p>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{now()}}</li>
        </ol>
    </nav>
    <div class="row my-4">
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="card">
                <h5 class="card-header">Compnaies</h5>
                <div class="card-body">
                    <h5 class="card-title">Total {{$companies}}</h5>
                    <p class="card-text">{{$companies}} Companies Registered</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Users</h5>
                <div class="card-body">
                    <h5 class="card-title">Total {{$users}}</h5>
                    <p class="card-text">{{$users}} Users Registered</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Jobs</h5>
                <div class="card-body">
                    <h5 class="card-title">Total {{$jobs}}</h5>
                    <p class="card-text">{{$jobs}} Jobs Posted</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Super Admins</h5>
                <div class="card-body">
                    <h5 class="card-title">Total {{$admins}}</h5>
                    <p class="card-text">{{$admins}} Admin Exists</p>
                </div>
            </div>
        </div>
    </div>
@endsection

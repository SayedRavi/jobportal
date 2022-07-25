@extends('layouts.user_profile')
@section('content')
    <div class="col-12">
        @if( \Illuminate\Support\Facades\Session::has( 'success' ))
            <div class="alert alert-success">
                {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
            </div>
        @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
            <div class="alert alert-danger">
            {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
            </div>

        @endif
        <div class="row">

            <div class="card">

                <div class="card-header">
                    change Password
                </div>
                <div class="card-body">
                    <p>Create new password. Type the same password in both inputs.</p>
                    <form action="{{route('u_password_change')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="password" required name="password" class="form-control" placeholder="New Password">
                        </div>
                        @error('password')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" required name="c_password" class="form-control" placeholder="Confirm Password">
                        </div>
                        @error('c_password')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

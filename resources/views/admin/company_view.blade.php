@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-7">
            <div class="card">
                <div class="card-header">Company Information</div>
                <div class="card-body">
                    @foreach($users as $user)
                        @foreach($companies as $profile)
                    <p><b>Company Name:</b> {{ $profile->cname}}</p>
                    <p><b>Company Email:</b> {{ $user->email}}</p>
                    <p><b>Company Address:</b> {{ $profile->address}}</p>
                    <p><b>Company Phone:</b> {{ $profile->phone}}</p>
                    <p><b>Company Website:</b> {{ $profile->website}}</p>
                    <p><b>Company Description:</b> {{ $profile->description}}</p>
                    <p><b>Company Slogan:</b> {{ $profile->slogan}}</p>
                    <p><b>Member Since:</b> {{ $user->created_at->diffForHumans()}}</p>
                            <div class="col-12">
                                <div class="row">
                                    <div class="card" >
                                        <div class="card-header">Cover Photo</div>
                                        <div class="card-img">
                                            @if(empty($profile->cover_photo))
                                                <div class="cover-container">
                                                    <img  src="{{asset('avatar/th.jpg')}}" width="500px" height="400px" class="cover-img">
                                                </div>
                                            @elseif($profile->cover_photo)
                                                <div class="cover-container">
                                                    <img  src="{{asset('uploads/cover_photo')}}/{{$profile->cover_photo}}" alt="" width="100%" height="50%" class="img-fluid center">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="card">
                        <div class="card-header">company logo</div>
                        <div class="card-body">
                            <div class="card-img">

                                @if(empty($companies->logo))
                                    <img  src="{{asset('avatar/apple.png')}}" alt="" width="300px" height="300px" class="img-fluid center">
                                @else
                                    <img  src="{{asset('uploads/logo')}}/{{$companies->logo}}" alt="" width="300px" height="300px" class="img-fluid center @error('logo') valid @enderror">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

        @endsection


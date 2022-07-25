@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                <th>Name</th>--}}
{{--                <th>Email</th>--}}
{{--                <th>Role</th>--}}
{{--                <th>Address</th>--}}
{{--                <th>Phone</th>--}}
{{--                <th>Gender</th>--}}
{{--                <th>Date of Birth</th>--}}
{{--                <th>Cover Letter</th>--}}
{{--                <th>Resume</th>--}}
{{--                <th>Member Since</th>--}}
{{--                </thead>--}}
{{--                @foreach($users as $user)--}}
{{--                    @foreach($profiles as $profile)--}}
{{--                <tbody>--}}
{{--                <td>{{$user->name}}</td>--}}
{{--                <td>{{$user->email}}</td>--}}
{{--                <td>{{$user->user_type}}</td>--}}
{{--                <td>{{$profile->address}}</td>--}}
{{--                <td>{{$profile->phone_number}}</td>--}}
{{--                <td>{{$profile->gender}}</td>--}}
{{--                <td>{{$profile->dob}}</td>--}}
{{--                <td>{{$profile->cover_letter}}</td>--}}
{{--                <td>{{$profile->resume}}</td>--}}
{{--                <td>{{$user->created_at->diffForHumans()}}</td>--}}
{{--                </tbody>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
            </table>
            <div class="col-8">
                <div class="card">
                    @foreach($users as $user)
                    <div class="card-header">{{mb_strtoupper($user->name)}}'s Information</div>
                    @endforeach
                    <div class="card-body">
                        @foreach($users as $user)
                        @foreach($profiles as $profile)
                            <p><b>Name:</b> {{$user->name}}</p>
                            <p><b>Email:</b> {{$user->email}}</p>
                            <p><b>Role:</b> {{$user->user_type}}</p>
                            <p><b>Address:</b> {{$profile->address}}</p>
                            <p><b>Phone:</b> {{$profile->phone_number}}</p>
                            <p><b>Gender:</b> {{$profile->gender}}</p>
                            <p><b>Date Of Birth:</b> {{$profile->dob}}</p>
                            <p><b>Experience:</b> {{$profile->experience}}</p>
                            <p><b>Bio:</b> {{$profile->bio}}</p>
                            <p><b>Cover Letter:</b>
                                <a href="{{\Illuminate\Support\Facades\Storage::Url($profile->cover_letter)}}">Download Cover Letter</a>
                            </p>
                            <p><b>Resume:</b>
                                <a  href="{{\Illuminate\Support\Facades\Storage::Url($profile->resume)}}">Download Resume</a>
                            </p>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="card">
                        <div class="card-header">User Profile</div>
                        <div class="card-body">
                            <div class="card-img">
                                @foreach($profiles as $profile)
                                @if(empty($profile->avatar))
                                    <img  src="{{asset('avatar/apple.png')}}" alt="" width="100%" class="center img-fluid">
                                @else
                                    <img  src="{{asset('uploads/avatar')}}/{{$profile->avatar}}" alt="" width="100%" class="img-fluid center">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

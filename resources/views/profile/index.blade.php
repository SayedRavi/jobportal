@extends('layouts.user_profile')

@section('content')
    <div class="container">
        <div class="row">
            <br>
               <div class="col-md-3 ">
                   <br>
                   @if(empty(auth()->user()->profile->avatar))
                       <img  src="{{asset('avatar/apple.png')}}" alt="" width="100%" class="center img-fluid">
                   @else
                       <img  src="{{asset('uploads/avatar')}}/{{auth()->user()->profile->avatar}}" alt="" width="100%" class="img-fluid center @error('avatar') valid @enderror">
                   @endif
                   <div class="form-group"></div>
                   <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="card">
                           <div class="card-header">Change Profile Picture</div>
                           <div class="card-body">
                               <input type="file" class="form-control form-control-sm" name="avatar" accept="image/*" required>
                               <br>
                               <button class="btn btn-primary btn-sm">Update</button>
                           </div>
                       </div>
                       @error('avatar')
                       <blockquote class="text-danger">{{$message}}</blockquote>
                       @enderror
                   </form>
                   <br>
                   <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="card">
                           <div class="card-header">Update Resume </div>
                           <div class="card-body">
                               <input type="file" name="resume" class="form-control @error('resume') valid @enderror" required>
                               <br>
                               <button class="btn btn-primary">Update</button>
                           </div>
                       </div>
                       @error('resume')
                       <blockquote class="text-danger">{{$message}}</blockquote>
                       @enderror
                   </form>
               </div>

            <div class="col-md-5">
                <br>
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" required cols="30" rows="3" class="@error('address') valid @enderror" value="{{old('address')}}">{{auth()->user()->profile->address}}</textarea>
                                @error('address')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input value="{{\Illuminate\Support\Facades\Auth::user()->profile->phone_number}}" required type="text" name="phone_number" class="form-control @error('phone_number') valid @enderror" >
                                @error('phone_number')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea class="form-control" name="experience" required cols="30" rows="3" class="@error('experience') valid @enderror" value="{{old('experience')}}">{{auth()->user()->profile->experience}}</textarea>
                                @error('experience')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="bio">BIO-DATA</label>
                                <textarea  name="bio" id="" cols="30" rows="3" class="form-control @error('bio') valid @enderror" required >{{auth()->user()->profile->bio}}</textarea>
                                @error('bio')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                            <br>
                            @if( \Illuminate\Support\Facades\Session::has( 'success' ))
                                <div class="alert alert-success">
                                    {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
                                </div>
                            @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
                                <div class="alert alert-danger">
                                {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
                                </div>

                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('message')}}
                                </div>

                            @else
                               @if(\Illuminate\Support\Facades\Session::has('denied'))
                                    <div class="alert alert-danger">
                                        {{\Illuminate\Support\Facades\Session::get('denied')}}
                                    </div>

                            @endif
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">
                        <p><b>Name: </b> {{auth()->user()->name}}</p>
                        <p><b>Email: </b> {{auth()->user()->email}}</p>
                        <p><b>Address: </b> {{auth()->user()->profile->address}}</p>
                        <p><b>Phone Number: </b> {{auth()->user()->profile->phone_number}}</p>
                        <p><b>Experience: </b> {{auth()->user()->profile->experience}}</p>
                        <p><b>Bio: </b> {{auth()->user()->profile->bio}}</p>
                        <p><b>Member Since: </b> {{auth()->user()->created_at->diffForHumans()}} - {{date('F d Y'),strtotime(auth()->user()->created_at)}}</p>
                        @if(!empty(\Illuminate\Support\Facades\Auth::user()->profile->cover_letter))
                        @if(!empty(auth()->user()->profile->cover_letter))
                            <p>
                                <a href="{{\Illuminate\Support\Facades\Storage::Url(auth()->user()->profile->cover_letter)}}">Cover Letter</a>
                            </p>
                        @else
                        <p>Please Upload Your Cover letter</p>
                        @endif
                        @if(!empty(auth()->user()->profile->resume))
                            <p>
                                <a href="{{\Illuminate\Support\Facades\Storage::Url(auth()->user()->profile->resume)}}">Resume</a>
                            </p>
                        @else
                        <p>Please Upload Your Resume</p>
                        @endif
                        @endif
                    </div>
                </div>
                <br>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" id="cover_letter" class="form-control @error('cover_letter') valid @enderror" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                    @error('cover_letter')
                    <blockquote class="text-danger">{{$message}}</blockquote>
                    @enderror
                </form>

                <br>

            </div>
        </div>
    </div>
@endsection




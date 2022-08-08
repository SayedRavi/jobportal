@extends('layouts.company_dashboard')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3 ">

                @if(empty(auth()->user()->company->logo))
                    <img  src="{{asset('avatar/apple.png')}}" alt="" width="100%" class="center">
                @else
                    <img  src="{{asset('uploads/logo')}}/{{auth()->user()->company->logo}}" alt="" width="100%" class="center @error('logo') valid @enderror">
                @endif
                <div class="form-group"></div>
                <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Change Logo</div>
                        <div class="card-body">
                            <input type="file" class="form-control form-control-sm" name="logo" accept="image/*" required>
                            <br>
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                    @error('logo')
                    <blockquote class="text-danger">{{$message}}</blockquote>
                    @enderror
                </form>
                    <br>
                    @if(empty(auth()->user()->company->cover_photo))
                        <img  src="{{asset('cover/banner4.png')}}" alt="" width="100%" class="center">
                    @else
                        <img  src="{{asset('uploads/cover_photo')}}/{{\Illuminate\Support\Facades\Auth::user()->company->cover_photo}}" alt="" width="100%" class="center @error('logo') valid @enderror">
                    @endif
                    <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">Update Cover Photo</div>
                            <div class="card-body">
                                <input type="file" name="cover_photo" id="cover_photo" class="form-control @error('cover_photo') valid @enderror" required>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        @error('cover_photo')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                    </form>

            </div>
            <div class="col-md-5">
                <br>
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" required cols="30" rows="3" class="@error('address') valid @enderror" value="{{old('address')}}">{{auth()->user()->company->address}}</textarea>
                                @error('address')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input value="{{old('phone') ? '' : \Illuminate\Support\Facades\Auth::user()->company->phone}}" type="text" name="phone" required class="form-control @error('phone') valid @enderror" >
                                @error('phone')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" class="form-control @error('website') valid @enderror"
                                value="{{ old('website') ? '' : \Illuminate\Support\Facades\Auth::user()->company->website}}" required>
                                @error('website')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <input type="text" name="slogan" class="form-control @error('slogan') valid @enderror"
                                value="{{old('slogan') ? '' : \Illuminate\Support\Facades\Auth::user()->company->slogan}}" required>
                                @error('slogan')
                                <blockquote class="text-danger">{{$message}}</blockquote>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3" class="@error('description') valid @enderror"
                                          value="{{old('description')}}" required>{{\Illuminate\Support\Facades\Auth::user()->company->description}}</textarea>
                                @error('description')
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
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">
                     <p><b>Company Name: </b>{{\Illuminate\Support\Facades\Auth::user()->company->cname}}</p>
                     <p><b>Company Email: </b>{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                     <p><b>Company Website: </b>{{\Illuminate\Support\Facades\Auth::user()->company->website}}</p>
                     <p><b>Company: </b><a href="company/{{\Illuminate\Support\Facades\Auth::user()->company->slug}}">View</a></p>
                     <p><b>Website: </b>{{\Illuminate\Support\Facades\Auth::user()->company->website}}</p>
                     <p><b>Phone: </b>{{\Illuminate\Support\Facades\Auth::user()->company->phone}}</p>
                     <p><b>Slogan: </b>{{\Illuminate\Support\Facades\Auth::user()->company->slogan}}</p>
                     <p><b>Description: </b>{{\Illuminate\Support\Facades\Auth::user()->company->description}}</p>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection

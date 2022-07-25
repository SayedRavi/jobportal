@extends('layouts.main')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <br>
            <div class="company-profile">
                @if(empty($company->cover_photo))
                    <div class="cover-container">
                        <img  src="{{asset('avatar/apple.png')}}" alt="" height="50%" class="cover-img">
                    </div>
                @elseif(\Illuminate\Support\Facades\Auth::user()->company->cover_photo)
                    <div class="cover-container">
                        <img  src="{{asset('uploads/cover_photo')}}/{{$company->cover_photo}}" alt="" width="100%" height="50%" class="img-fluid center">
                    </div>
                @endif
            </div>
            <div class="company-desc">
                <br>
                @if(empty(auth()->user()->company->logo))
                    <img  src="{{asset('avatar/apple.jpg')}}" alt="" width="10%" class="img-fluid center">
                @else
                    <img  src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" width="200px" class="img-fluid center @error('logo') valid @enderror">
                @endif
                <h1>{{$company->cname}}</h1>
                <p>{{$company->description}} </p>
                <p><b>Slogan: </b>&nbsp;{{$company->slogan}}</p>
                <p><b>Address: </b>&nbsp;{{$company->address}}</p>
                <p><b>Phone: </b>&nbsp;{{$company->phone}}</p>
                <p><b>Website: </b>&nbsp;{{$company->website}}</p>

            </div>
            {{--            <table class="table">--}}
            {{--                <thead>--}}
            {{--                <th>#</th>--}}
            {{--                <th>Logo</th>--}}
            {{--                <th>Position</th>--}}
            {{--                <th> <i class="fa fa-map-marker"></i>&nbsp;Address</th>--}}
            {{--                <th> <i class="fa fa-calendar-check"></i>&nbsp;Date</th>--}}
            {{--                <th></th>--}}
            {{--                </thead>--}}

            {{--                <tbody>--}}
            {{--                @php $i=1 @endphp--}}
            {{--                    @foreach($company->jobs as $job)--}}
            {{--                        <tr>--}}
            {{--                            <td>{{$i++}}</td>--}}
            {{--                            <td><img src="{{asset("avatar/apple.png")}}" alt="apple logo" width="100"></td>--}}
            {{--                            <td>--}}
            {{--                                <b>Position: </b> {{$job->position}}--}}
            {{--                                <br>--}}
            {{--                                <b>Job Type:</b>&nbsp; <i class="fa fa-clock"></i>&nbsp;  {{$job->type}}--}}
            {{--                            </td>--}}
            {{--                            <td><i class="fa fa-map-marker"></i>&nbsp;{{$job->address}}</td>--}}
            {{--                            <td><i class="fa fa-calendar-check"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>--}}
            {{--                            <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-success btn-small">Apply</button></a></td>--}}
            {{--                        </tr>--}}
            {{--                    @endforeach--}}
            {{--                </tbody>--}}
            {{--            </table>--}}
        </div>
    </div>
@endsection


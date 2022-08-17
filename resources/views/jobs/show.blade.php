@extends('layouts.main')
@section('content')

    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('alljobs')}}">Jobs List</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                @if( \Illuminate\Support\Facades\Session::has( 'success' ))
                    <div class="alert alert-success">
                        {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
                    </div>
                @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
                    <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
                    </div>
                @endif
                <div class="col-lg-8 col-md-8">
                    <div class="d-flex align-items-center mb-5">
                        @if(empty($job->company->logo))
                            <img  src="{{asset('avatar/th.jpg')}}" alt="" width="100px" height="100px" class="center">
                        @else
                            <img  src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="" width="200px" class="center @error('logo') valid @enderror">
                        @endif
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{$job->title}}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{\Illuminate\Support\Str::limit($job->address, 40)}}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->salary}}</span>
                            </div>
                    </div>


                    <div class="mb-5">
                        <h4 class="mb-3">Job description
                            <a href="" data-bs-toggle="modal" data-bs-target="#jobDescription">
{{--                                <i class="fa fa-envelope-square" style="font-size: 40px; color: greenyellow; float: right;" ></i>--}}
                            </a>
                        </h4>
                        <p class="mb-3">{{$job->description}}</p>

                        <h4 class="mb-3">Responsibility</h4>
                        <p class="mb-3">{{$job->responsibility}}</p>

                        <h4 class="mb-3">Qualifications</h4>
                        <p class="mb-3">{{$job->qualification}}</p>
                    </div>
                @if(\Illuminate\Support\Facades\Auth::user())
                     @if(\Illuminate\Support\Facades\Auth::user()->user_type=='seeker')
                         @if(!$job->checkApplication())
                            <form action="{{route('jobs.apply',['id'=>$job->id])}}" method="post">
                                @csrf
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                </div>
                            </form>
                        @endif
                    @endif
                    @else
                    <a class=" btn btn-danger" href="{{route('login')}}">Login For Applying</a>
                @endif


                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{$job->created_at->diffForHumans()}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{$job->vacancy}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$job->type}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{$job->salary}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$job->address}}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: {{$job->last_date}}</p>
                        <br>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            @if(\Illuminate\Support\Facades\Auth::user()->user_type=='seeker')
                                @if(!$job->checkApplication())
                                    <form action="{{route('jobs.apply',['id'=>$job->id])}}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        @else
                            <a class=" btn btn-danger" href="{{route('login')}}">Login For Applying</a>
                        @endif
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p style="color: black">{{$job->company->description}}</p>

                        <div class="col-12">
                            <a href="{{route('job.company.show',[$job->company->id, $job->company->slug])}}" class="btn btn-warning w-100" type="button">Visit Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

    <!-- Modal -->
    <div class="modal fade" id="jobDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Job to a Friend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('mail')}}" method="post">
                        @csrf
                        <input type="hidden" name="job_id" value="{{$job->id}}">
                        <input type="hidden" name="job_slug" value="{{$job->slug}}">
                        <div class="form-group">
                            <input type="text" name="your_name" placeholder="Your Name" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="your_email" placeholder="Your Email" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="friend_name" placeholder="Friend Name" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="friend_email" placeholder="Friend Email" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection

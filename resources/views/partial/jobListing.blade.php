
<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        @if(empty($jobs))
          <p>No jobs Found</p>
        @else
            @foreach($jobs as $job)
                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center" >

                            @if(empty(auth()->user()->company->logo))
                                <img  src="{{asset('avatar/th.jpg')}}" alt="" style="width: 100px; height: 100px;" class="center">
                            @else
                                <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('uploads/logo')}}/{{auth()->user()->company->logo}}" alt="" style="width: 80px; height: 80px;">

                            @endif
                            <a href="{{route('jobs.show',[$job->id, $job->slug])}}">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{\Illuminate\Support\Str::limit($job->title , 30)}}</h5>
                                    <span class="text-truncate me-3"><i class="fa-solid fa-building text-primary me-2"></i> {{$job->company->cname}}</span>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{\Illuminate\Support\Str::limit($job->address, 30)}}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$job->type}}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-primary" href="{{route('jobs.show',[$job->id, $job->slug])}}">Apply Now</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{$job->last_date}}</small>
                        </div>
                    </div>

                </div>
            @endforeach
            <a class=" container center btn btn-primary py-3 px-5 " href="{{route('alljobs')}}">Browse More Jobs</a>
        @endif

    </div>
    </div>
<!-- Jobs End -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>

            <h1>Recent Jobs</h1>
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Position</th>
                    <th> <i class="fa fa-map-marker"></i>&nbsp;Address</th>
                    <th> <i class="fa fa-calendar-check"></i>&nbsp;Date</th>
                    <th></th>
                    </thead>

                    <tbody>
                    @php $i=1 @endphp
                    @if($jobs)
                        @foreach($jobs as $job)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><img src="{{asset("avatar/apple.jpg")}}" alt="apple logo" width="100"></td>
                        <td>
                        <b>Position: </b> {{$job->position}}
                            <br>
                           <b>Job Type:</b>&nbsp; <i class="fa fa-clock"></i>&nbsp;  {{$job->type}}
                        </td>
                        <td><i class="fa fa-map-marker"></i>&nbsp;{{$job->address}}</td>
                        <td><i class="fa fa-calendar-check"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-success btn-small">Apply</button></a></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <p class="red text-center"></p>
            @endif

        </div>
        <div>
            <a href="{{route('alljobs')}}">
                <button style="width: 100% " class="btn btn-warning btn-lg" >See All Jobs</button>

            </a>
        </div>
        <br>
        <br>
        <h1>Featured Company</h1>
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{Str::limit($company->description, 20)}}</p>
                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>
                </div>
                    <br>
                @endforeach

            </div>
        </div>
    </div>
@endsection

<script>
    import SearchComponent
    export default {
        components: {SearchComponent}
    }
</script>

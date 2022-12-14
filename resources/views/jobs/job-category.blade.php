@extends('layouts.main')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <h1>{{$category_name->name}} Jobs</h1>

            <br>
            <table class="table" style="margin-top: 30px">
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
                @if(!$jobs)
                    <p>no jobs found</p>
                @else
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                @if(empty(auth()->user()->company->logo))
                                    <img  src="{{asset('avatar/th.jpg')}}" alt="" style="width: 100px; height: 100px;" class="center">
                                @else
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('uploads/logo')}}/{{auth()->user()->company->logo}}" alt="" style="width: 80px; height: 80px;">

                            @endif
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
            {{$jobs->links()}}

            @endif


        </div>

    </div>
@endsection


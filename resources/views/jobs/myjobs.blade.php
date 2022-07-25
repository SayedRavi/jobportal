@extends('layouts.company_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>

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
                                @foreach($jobs as $job)

                                        <tr>

                                            <td>{{$i++}}</td>
                                            <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><img src="{{asset("avatar/apple.png")}}" alt="apple logo" width="100">                                            </a>
                                            </td>
                                            <td>
                                                <a style="text-decoration: none; color: black" href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                                <b>Position: </b> {{$job->position}}
                                                <br>
                                                <b>Job Type:</b>&nbsp; <i class="fa fa-clock"></i>&nbsp;  {{$job->type}}
                                                </a>

                                            </td>
                                            <td><a style="text-decoration: none; color: black" href="{{route('jobs.show',[$job->id,$job->slug])}}"><i class="fa fa-map-marker"></i>&nbsp;{{$job->address}}</a></td>
                                            <td><a style="text-decoration: none; color: black" href="{{route('jobs.show',[$job->id,$job->slug])}}"><i class="fa fa-calendar-check"></i>&nbsp;{{$job->created_at->diffForHumans()}}</a></td>
                                            <td><a style="text-decoration: none; color: black" href="{{route('jobs.show',[$job->id,$job->slug])}}"><a href="{{route('jobs.editjobs',[$job->id,$job->slug])}}"><button class="btn btn-warning btn-small">Edit</button></a></td>
                                            <td><a style="text-decoration: none; color: black" href="{{route('jobs.show',[$job->id,$job->slug])}}"><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-success btn-small">Details</button></a></td>
                                        </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
@endsection

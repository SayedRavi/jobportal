@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if( \Illuminate\Support\Facades\Session::has( 'success' ))
                    <div class="alert alert-success">
                        {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
                    </div>
                @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
                    <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
                    </div>

                @endif
                <div class="card">

                    <div class="card-header">{{ $job->title }}</div>
                    <div class="card-body">

                        <p>
                            <h3>Description</h3>
                        {{$job->description}}
                        </p>

                        <p>
                            <h3>Duties</h3>
                        {{$job->roles}}
                        </p>
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info </div>
                    <div class="card-body">
                        <p> Company:
                            <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                {{$job->company->cname}}
                            </a>
                        </p>
                        <p> Address: {{$job->address}}</p>
                        <p> Job Position: {{$job->position}}</p>
                        <p> Estimates: {{$job->last_date}}</p>

                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->user_type=='seeker')
                @if(!$job->checkApplication())
                    <form action="{{route('jobs.apply',['id'=>$job->id])}}" method="post">
                        @csrf
                        <button class="btn btn-warning" style="width: 100%">Apply</button>
                    </form>
                @endif
                @endif

            </div>
        </div>
    </div>
@endsection

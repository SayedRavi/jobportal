@extends('layouts.admin')
@section('content')
    @if( \Illuminate\Support\Facades\Session::has( 'success' ))
        <div class="alert alert-success">
            {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
        </div>
    @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
        <div class="alert alert-danger">
        {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
        </div>
    @endif
    <div class="col-12">
        <div class="row">

                <table class="table">
                <thead>
                <th>#</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Roles</th>
                <th>Vacancy</th>
                <th>Position</th>
                <th>Dead Line</th>
                <th>Actions</th>
                </thead>
                @php $i=1 @endphp
                @foreach($jobs as $job)
                <tbody>
                <td>{{$i++}}</td>
                <td>{{\Illuminate\Support\Str::limit($job->title,30)}}</td>
                <td>{{$job->company->cname}}</td>
                <td>{{$job->roles}}</td>
                <td>{{$job->vacancy}}</td>
                <td>{{$job->position}}</td>
                <td>{{$job->last_date}}</td>
                <td>
                    <form action="{{route('admin.jobs.destroy',$job->id)}}" method="post">
                        @csrf
                        @method('delete')
                    <a href="{{route('admin.jobs.view',$job->id)}}" class="btn btn-sm btn-dark">View</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    @endsection

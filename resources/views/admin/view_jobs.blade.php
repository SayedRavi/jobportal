@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="card">
                <div class="card-header">Job Details</div>
                <div class="card-body">
                    @foreach($jobs as $job)
                    <p>Job Title: {{$job->title}}</p>
                    <p>Company: {{$job->company->cname}}</p>
                    <p>Roles: {{$job->roles}}</p>
                    <p>Description: {{$job->description}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>status: {{$job->status}}</p>
                    <p>type: {{$job->type}}</p>
                    <p>Dead Line: {{$job->last_date}}</p>
                    <p>Address: {{$job->address}}</p>
                    <p>Vacancy: {{$job->vacancy}}</p>
                    <p>Salary: {{$job->salary}}</p>
                    <p>Responsibility: {{$job->responsibility}}</p>
                    <p>Qualification: {{$job->qualification}}</p>
                    <p>Posted: {{$job->created_at->diffForHumans()}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection

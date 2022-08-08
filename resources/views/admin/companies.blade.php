@extends('layouts.admin')
@section('content')
<div class="col-12">
    <div class="row">
        @if( \Illuminate\Support\Facades\Session::has( 'success' ))
            <div class="alert alert-success">
                {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
            </div>
        @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
            <div class="alert alert-danger">
            {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
            </div>

        @endif
            <table class="table table-sm table-striped">
                <thead>
                <th>#</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Role</th>
                <th>Member Since</th>
                <th>Actions</th>
{{--                <th>Company Address</th>--}}
{{--                <th>Company Phone</th>--}}
{{--                <th>Company Website</th>--}}
{{--                <th>Member Since</th>--}}
                </thead>
                @php $i=1 @endphp
                @foreach($companies as $company)
                <tbody>
                <td>{{$i++}}</td>
                <td><b>{{$company->name}} </b></td>
                <td>{{$company->email}}</td>
                <td>{{$company->user_type}}</td>
                <td>{{$company->created_at->diffForHumans()}}</td>
                <td>
                    <form action="{{route('admin.company.deleted',$company->id)}}" method="post">
                        @csrf
                        @method('delete')
                    <a href="{{route('admin.company.show',[$company->id])}}" class="btn btn-sm btn-dark">View</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                </tbody>
                @endforeach
            </table>
    </div>
</div>
@endsection

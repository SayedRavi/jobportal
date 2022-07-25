@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="card-body">
                @if( \Illuminate\Support\Facades\Session::has( 'success' ))
                    <div class="alert alert-success">
                        {{ \Illuminate\Support\Facades\Session::get( 'success' ) }}
                    </div>
                @elseif( \Illuminate\Support\Facades\Session::has( 'warning' ))
                    <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get( 'warning' ) }} <!-- here to 'withWarning()' -->
                    </div>

                @endif
            <table class="table table-bordered table-striped">
                <thead>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Member Since</th>
                <th>Actions</th>
                </thead>
                @php $i=1 @endphp
                @foreach($users as $user)

                <tbody>
                <td class="text-center">{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
{{--                    @if($user->user_type == 'admin')--}}
{{--                        <a href="" class="btn btn-success">{{$user->user_type}}</a>--}}
{{--                    @endif--}}
{{--                    @if($user->user_type == 'employer')--}}
{{--                        <a href="" class="btn btn-warning">{{$user->user_type}}</a>--}}
{{--                        @endif--}}
                        @if($user->user_type == 'seeker')
                        <a href="" class="btn btn-primary">{{$user->user_type}}</a>
                        @endif

                </td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>
                    <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                        @csrf
                        @method('delete')
                    <a href="{{route('admin.users.view',$user->id)}}" class="btn-sm btn btn-dark">View</a>
                    <button type="submit" class="btn-sm btn btn-danger">Delete</button>
                    </form>
                </td>
                </tbody>
                @endforeach


            </table>
        </div>
    </div>

@endsection

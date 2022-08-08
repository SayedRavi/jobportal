@extends('layouts.admin')
@section('content')
    <div class="col-12 col-md-12 col-lg-12 col-sm-12">
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
        <div class="row">
            <div class="card">
                <div class="card-header">Add Category</div>
                <div class="card-body" >
                    <form action="{{route('category.save')}}" method="post">
                        @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Category Name">
                    </div>
                        <button class="btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

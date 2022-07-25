@extends('layouts.admin')
@section('content')
    <div class="col-12 col-md-12 col-lg-12 col-sm-12">
        <div class="row">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body" >
                    @foreach($category as $cat)
                    <form action="{{route('category.update',$cat->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$cat->name}}">
                            @endforeach
                        </div>
                        <button class="btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

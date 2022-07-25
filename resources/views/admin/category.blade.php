@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <br>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
                </thead>
                @php $i=1 @endphp
                @foreach($categories as $category)
                <tbody>
                <td>{{$i++}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{route('category.delete',$category->id)}}" method="post">
                        @csrf
                        @method('delete')
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="row">
            {{$categories->links()}}
        </div>

        <a href="{{route('category.add')}}" class="btn btn-primary">Add Category</a>

    </div>
    @endsection

@extends('layouts.main')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <h1>Recent Jobs</h1>
            <br>
            <form action="{{route('alljobs')}}" method="get">

                <div class="row">
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control" placeholder="Keyword">
                </div>
                <div class="col-md-2">
                    <select name="type" class="form-select @error('type') is-invalid @enderror" id="">
                        <option value="">Select Type</option>
                        <option value="fulltime">Full Time</option>
                        <option value="part">part Time</option>
                        <option value="casual">Casual</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="category_id" id="" class="form-select @error('category_id') is-invalid @enderror">
                        <option >Select Category</option>
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">

                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="col-md-2">

                    <button class="btn btn-outline-dark">Search</button>

                </div>
                        </div>

            </form>
            <br>
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
                @if($jobs)
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><img src="{{asset("avatar/apple.jpg")}}" alt="apple logo" width="100"></td>
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

            @else
                <p class="red text-center"></p>
            @endif

        </div>

    </div>
@endsection


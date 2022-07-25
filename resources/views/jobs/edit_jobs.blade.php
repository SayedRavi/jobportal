@extends('layouts.company_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">



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
                    <form action="{{route('jobs.update',[$job->id,$job->slug])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$job->title}}">
                        </div>
                        @error('title')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <input type="text" name="roles" class="form-control @error('roles') is-invalid @enderror" value="{{$job->roles}}">
                        </div>
                        @error('roles')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="3"
                                      class="form-control @error('description') is-invalid @enderror"
                            >{{$job->description}}</textarea>
                        </div>
                        @error('description')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                            value="{{$job->position}}">
                        </div>
                        @error('position')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="vacancy">Vacancy</label>
                            <input type="text" name="vacancy" class="form-control @error('vacancy') is-invalid @enderror"
                            value="{{$job->vacancy}}">
                        </div>
                        @error('vacancy')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror"
                            value="{{$job->salary}}">
                        </div>
                        @error('salary')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="responsibility">Responsibility</label>
                            <textarea name="responsibility" id="" cols="30" rows="3"
                                      class="form-control @error('responsibility') is-invalid @enderror">
                                {{$job->responsibility}}
                            </textarea>
                        </div>
                        @error('responsibility')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <textarea name="qualification" id="" cols="30" rows="3"
                                      class="form-control @error('qualification') is-invalid @enderror">
                                {{$job->qualification}}
                            </textarea>
                        </div>
                        @error('qualification')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="" class="custom-select @error('category_id') is-invalid @enderror">
                                @foreach(\App\Models\Category::all() as $cat)
                                    <option selected value="{{$job->category_id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="" cols="30" rows="3"
                                      class="form-control @error('address') is-invalid @enderror">
                                {{$job->address}}
                            </textarea>
                        </div>
                        @error('address')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="custom-select @error('type') is-invalid @enderror" id="">
                                <option selected value="{{$job->type}}" >{{$job->type}}</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>

                            </select>
                        </div>
                        @error('type')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="custom-select @error('status') is-invalid @enderror" id="inputGroupSelect01">

                                <option selected value="{{$job->status}}" disabled>{{$job->status}}</option>
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        @error('status')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <div class="form-group">
                            <label for="last_date">Apply Deadline</label>
                            <input type="date" name="last_date" class="form-control @error('apply_deadline') is-invalid @enderror"
                            value="{{$job->last_date}}">
                        </div>
                        @error('apply_deadline')
                        <blockquote class="text-danger">{{$message}}</blockquote>
                        @enderror
                        <br>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
@endsection

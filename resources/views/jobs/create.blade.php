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
                        <form action="{{route('jobs.store')}}" method="post">
                            @csrf
                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required>
                      </div>
                            @error('title')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                        <div class="form-group">
                          <label for="roles">Roles</label>
                          <input type="text" name="roles" class="form-control @error('roles') is-invalid @enderror" required>
                      </div>
                            @error('roles')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                        <div class="form-group">
                          <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" required class="form-control @error('description') is-invalid @enderror"></textarea>
                      </div>
                            @error('description')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                        <div class="form-group">
                          <label for="position">Position</label>
                          <input type="text" name="position" required class="form-control @error('position') is-invalid @enderror">
                      </div>
                            @error('position')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                            <div class="form-group">
                          <label for="vacancy">Vacancy</label>
                          <input type="text" name="vacancy" required class="form-control @error('vacancy') is-invalid @enderror">
                      </div>
                            @error('vacancy')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                            <div class="form-group">
                          <label for="salary">Salary</label>
                          <input type="text" name="salary" required class="form-control @error('salary') is-invalid @enderror">
                      </div>
                            @error('salary')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                            <div class="form-group">
                                <label for="responsibility">Responsibility</label>
                                <textarea name="responsibility" required cols="30" rows="3" class="form-control @error('responsibility') is-invalid @enderror"></textarea>
                            </div>
                            @error('responsibility')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                <textarea name="qualification" required cols="30" rows="3" class="form-control @error('qualification') is-invalid @enderror"></textarea>
                            </div>
                            @error('qualification')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                        <div class="form-group">
                          <label for="category_id">Category</label>
                            <select name="category_id" required class="custom-select @error('category_id') is-invalid @enderror">
                                <option value="" disabled selected>--Select Category--</option>
                                @foreach(\App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                      </div>
                            @error('category_id')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" required cols="30" rows="3" class="form-control @error('address') is-invalid @enderror"></textarea>
                        </div>
                            @error('address')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" required class="custom-select @error('type') is-invalid @enderror" id="">
                                <option value="" disabled selected>--Select Job Type--</option>
                                <option value="fulltime">Full Time</option>
                                <option value="part">part Time</option>
                                <option value="casual">Casual</option>
                            </select>
                        </div>
                            @error('type')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" required class="custom-select @error('status') is-invalid @enderror" id="">
                                <option value="" disabled selected>--Select Status--</option>
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                            @error('status')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                        <div class="form-group">
                            <label for="last_date">Apply Deadline</label>
                            <input type="date" name="last_date" required class="form-control @error('apply_deadline') is-invalid @enderror">
                        </div>
                            @error('apply_deadline')
                            <blockquote class="text-danger">{{$message}}</blockquote>
                            @enderror
                            <br>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>


            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMA Jobs</title>
    <!-- insert stylesheets here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/adminStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>--}}

    {{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
    {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>--}}

</head>
<body>


<nav class="navbar navbar-light bg-light p-3">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <a class="navbar-brand" href="#">
            User Dashboard
        </a>
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="">
            Hello, {{mb_strtoupper(\Illuminate\Support\Facades\Auth::user()->name)}}

        </div>

    </div>
</nav>
<div id="dash_container">
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <!-- sidebar content goes in here -->
                <div class="position-sticky">
                    <ul class="nav flex-column">
{{--                        <li class="nav-item" width="24" height="24">--}}
{{--                            <a class="nav-link ml-5 {{$active == 'profile' ? 'active' : ''}}" aria-current="page" href="{{route('user.profile')}}">--}}
{{--                                <i class="fa fa-user"></i>--}}
{{--                                &nbsp;--}}
{{--                                Profile--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" width="24" height="24">--}}
{{--                            <a class="nav-link ml-5" aria-current="page" href="{{route('/')}}">--}}
{{--                                <i class="fa fa-people-carry-box"></i>--}}
{{--                                &nbsp;--}}
{{--                                Jobs--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'profile' ? 'active' : ''}}" aria-current="page" href="{{route('user.profile')}}">
                                <i class="fa fa-user"></i>
                                <span class="ml-2">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'post' ? 'active' : ''}}" aria-current="page" href="/">
                                <i class="fa fa-people-carry-box"></i>
                                <span class="ml-2">Jobs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'u_pass' ? 'active' : ''}}" aria-current="page" href="{{route('u_password')}}">
                                <i class="fa fa-key"></i>
                                <span class="ml-2">Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-lock"></i>
                                &nbsp;
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-5 py-4">
                @yield('content')
            </main>

        </div>
    </div>
</div>



{{--        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>--}}
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
{{--        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>--}}
{{--        <script src="{{asset('js/all.min.js')}}"></script>--}}
</body>
</html>



{{--<div class="row my-4">--}}
{{--    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">--}}
{{--        <div class="card">--}}
{{--            <h5 class="card-header">Customers</h5>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">345k</h5>--}}
{{--                <p class="card-text">Feb 1 - Apr 1, United States</p>--}}
{{--                <p class="card-text text-success">18.2% increase since last month</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">--}}
{{--        <div class="card">--}}
{{--            <h5 class="card-header">Revenue</h5>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">$2.4k</h5>--}}
{{--                <p class="card-text">Feb 1 - Apr 1, United States</p>--}}
{{--                <p class="card-text text-success">4.6% increase since last month</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">--}}
{{--        <div class="card">--}}
{{--            <h5 class="card-header">Purchases</h5>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">43</h5>--}}
{{--                <p class="card-text">Feb 1 - Apr 1, United States</p>--}}
{{--                <p class="card-text text-danger">2.6% decrease since last month</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">--}}
{{--        <div class="card">--}}
{{--            <h5 class="card-header">Traffic</h5>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">64k</h5>--}}
{{--                <p class="card-text">Feb 1 - Apr 1, United States</p>--}}
{{--                <p class="card-text text-success">2.5% increase since last month</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



{{--<nav aria-label="breadcrumb">--}}
{{--    <ol class="breadcrumb">--}}
{{--        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--        <li class="breadcrumb-item active" aria-current="page">Overview</li>--}}
{{--    </ol>--}}
{{--</nav>--}}


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
            Admin Dashboard
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
            @if(\Illuminate\Support\Facades\Auth::check())
                Hello, {{mb_strtoupper(\Illuminate\Support\Facades\Auth::user()->company->cname)}}
            @endif

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
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'company' ? 'active' : ''}}" aria-current="page" href="{{route('company.create')}}">
                                <i class="fa fa-home"></i>
                                <span class="ml-2">Company</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'post' ? 'active' : ''}}" aria-current="page" href="{{route('jobs.create')}}">
                                <i class="fa fa-columns"></i>
                                <span class="ml-2">Job Post</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'jobs' ? 'active' : ''}}" aria-current="page" href="{{route('jobs.myjobs')}}">
                                <i class="fa fa-user"></i>
                                <span class="ml-2">My Jobs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">
                                <i class="fa fa-home-user"></i>
                                <span class="ml-2">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$active == 'applicants' ? 'active' : ''}}" aria-current="page" href="{{route('jobs.applicants')}}">
                                <i class="fa fa-people-line"></i>
                                <span class="ml-2">Applicants</span>
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


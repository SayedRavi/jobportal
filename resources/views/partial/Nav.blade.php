<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
{{--        <h1 class="m-0 text-primary">JobEntry</h1>--}}
        <img src="{{asset('sigma2.png')}}" height="50px" width="100px" alt="">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @if(!\Illuminate\Support\Facades\Auth::check())
            <a href="/" class="nav-item nav-link ">Home</a>
            <a href="/register" class="nav-item nav-link">Register</a>
                <a href="{{route('employer.registration')}}" class="nav-link nav-item">Employer Register</a>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check())
            @if(auth()->user()->user_type=='seeker')
            <a href="{{route('user.profile')}}" class="nav-item nav-link ">Profile</a>
            @endif
            @endif
                @if(\Illuminate\Support\Facades\Auth::check())
            @if(auth()->user()->user_type=='employer')
            <a href="{{route('company.create')}}" class="nav-item nav-link ">Company</a>
            @endif
            @endif

                @if(\Illuminate\Support\Facades\Auth::check())
            @if(auth()->user()->user_type=='admin')
            <a href="{{route('admin.index')}}" class="nav-item nav-link ">Dashboard</a>
            @endif
            @endif

            <!-- Button trigger modal -->
            @if(!\Illuminate\Support\Facades\Auth::check())
            <a  type="button" class="nav-item nav-link active" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Login
            </a>
            @else
            <a class="nav-link nav-item active" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
                @endif
        </div>

    </div>
</nav>
<!-- Navbar End -->
<div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

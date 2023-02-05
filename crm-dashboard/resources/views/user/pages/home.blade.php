@extends('user.layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (Auth::check())
 {{ __('You are logged in!') }}
 {{Auth::user()->name}}
 {{Auth::user()->role}}

                        @else
{{_('Login!')}}
                        @endif

                </div>
            </div>
        </div>
    </div>
</div> --}}


<body class="bg-light ">
    <div class="container h-100 d-flex flex-column justify-content-center">
      <h1 class="text-center text-primary">LECHEENE LANDING PAGE</h1>
      <p class="text-center lead">
        Coming Soon
      </p>
      <form class="form-inline d-flex justify-content-center">
        <div class="form-group mx-3">
          <input
            type="email"
            class="form-control"
            placeholder="Enter your email"
          />
        </div>
        <button type="submit" class="btn btn-primary">
          Notify Me
        </button>
      </form>
      @if (Route::has('login'))
      <div class="d-flex justify-content-center mt-3">
        @auth
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-link mx-3">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @else
        <a href="{{ route('login') }}" class="btn btn-link mx-3">Login</a>
        <a href="{{ route('register') }}" class="btn btn-link mx-3">Register</a>
        @endif
        @endauth
      </div>
    </div>
  </body>

@endsection

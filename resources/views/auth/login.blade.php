@extends('user.layouts.app')

@section('content')
    {{-- <div class="">
    <main class="main-content mt-0">
        <nav class="navbar navbar-main bg-dark navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Le Chene</h6>
        </nav>

      </div>
    </nav>
        <section>
          <div class="page-header min-vh-100">
            <div class="container">
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                  <div class="card card-header">
                    <div class="card-header pb-0 text-start">
                      <h4 class="font-weight-bolder">Sign In</h4>
                      <p class="mb-0">Enter your email and password to sign in</p>
                    </div>
                    <div class="card-body">

                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                          <input type="email" name="email" required class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <input type="password" name="password" required class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" value="{{ old('password') }}">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                      <p class="mb-4 text-sm mx-auto">
                        @if (Route::has('register'))
                        @endif
                    </p>
                    </div>
                  </div>
                </div>
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                  <div class="position-relative bg-gradient-dark h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('/assets/img/lechene-bg.jpg');
                  background-size: cover;">
                        <span class="mask bg-gradient-dark opacity-9"></span>
                        <h4 class="mt-5 text-white font-weight-bolder position-relative">Manage your business effortlessly</h4>
                        <p class="text-white position-relative">Be the best version of you today</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </main>



</div> --}}

    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area" data-bg-color="#F1FAEE">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Account</li>
                            </ol>
                            <h2 class="page-header-title">My Account</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">
                          <a href="{{ route('register') }}">  Register</a> </h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Login Wrapper ==-->
        <section class="login-register-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 login-register-border">
                        <div class="login-register-content">
                            <div class="login-register-title mb-30">
                                <h2>Login</h2>
                                <p>Welcome back! Please enter your email and password to login. </p>
                            </div>
                            <div class="login-register-style login-register-pr">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="login-register-input">
                                        <input type="email" name="email" required class=" @error('email') is-invalid @enderror"
                                            placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="login-register-input">
                                        <input type="password" name="password" required
                                            class="@error('password') is-invalid @enderror" placeholder="Password"
                                            aria-label="Password" value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="forgot">
                                                <a href="#">Forgot?</a>
                                            </div>
                                        </div>
                                        <div class="remember-me-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>

                                        </div>
                                        <div>
                                         <label>Dont Have an Account?</label> <a href="{{ route('register') }}" class="text-primary">  Register</a>
                                        </div>
                                         <div class="btn-register">
                                            <button type="submit" class="btn-register-now"
                                            >Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!--== End Login Wrapper ==-->

            <!--== Start News Letter Area Wrapper ==-->
            <section class="news-letter-area section-bottom-space">
                <div class="container">
                    <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.jpg">
                        <div class="newsletter-content">
                            <h2 class="title">Connect with us | merier</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="newsletter-form">
                                <form>
                                    <input type="email" class="form-control" placeholder="Email address">
                                    <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End News Letter Area Wrapper ==-->

        </main>
    @endsection

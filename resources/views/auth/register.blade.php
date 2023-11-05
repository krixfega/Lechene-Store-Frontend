@extends('user.layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Le Chene</h1>
                        <p class="text-lead text-white">Create Account</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 my   -10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Create New Account</h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger text-secondary">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <div class="mb-3">
                                    Full Name
                                    <input type="text" name="name" required
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        placeholder="Full Name" aria-label="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    Email
                                    <input type="email" name="email" required
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                   Address
                                    <input type="text" name="address" required
                                        class="form-control form-control-lg @error('address') is-invalid @enderror"
                                        placeholder="Address" aria-label="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    Phone Number
                                    <input type="tel" name="phone" required
                                        class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                        placeholder="Phone Number" aria-label="Phone Number"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                        <input type="date" name="dob" class="form-control form-control-lg @error('dob') is-invalid @enderror"
                                            placeholder="Date of Birth" aria-label="Date of Birth" value="{{ old('dob') }}">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="my-3">
                                        Gender
                                        <select name="gender" class="form-control form-control-lg mb-3 w-100 @error('gender') is-invalid @enderror" value="{{ old('gender') }}">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                <div class="my-3">

                                    <input type="password" name="password" required
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Password" aria-label="Password" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    Confirm Password
                                    <input type="password" name="password_confirmation" required
                                        class="form-control form-control-lg" placeholder="Confirm Password"
                                        aria-label="Confirm Password">
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" required type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">I agree to the <a href="javascript:;"
                                            class="text-dark font-weight-bolder">Terms and Conditions</a></label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-50 mt-4 mb-4">Create</button>
                                </div>
                            </form>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}"
                                            class="text-primary text-gradient font-weight-bold">Login</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

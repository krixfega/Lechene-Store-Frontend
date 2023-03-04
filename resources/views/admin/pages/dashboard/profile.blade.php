@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button class="btn btn-primary btn-sm ms-auto"></button>
                            </div>
                        </div>
                        <form action="{{ route('admin.updateProfile', Auth::user()->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <p class="text-uppercase text-sm">User Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Fullname</label>
                                            <input class="form-control @error('name')is-invalid @enderror" required
                                                name="name" type="text"
                                                value="{{ old('name') ?? Auth::user()->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email address</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                                required name="email" value="{{ old('email') ?? Auth::user()->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Address</label>
                                            <input class="form-control @error('address') is-invalid @enderror"
                                                name="address" type="text" required
                                                value="{{ old('address') ?? Auth::user()->address }}">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender-input" class="form-control-label">Gender</label>
                                            <select class="form-control @error('gender') is-invalid @enderror" id="gender-input" name="gender">
                                                <option value="male" {{ (old('gender') ?? Auth::user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ (old('gender') ?? Auth::user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob-input" class="form-control-label">Date of birth</label>
                                            <input class="form-control @error('dob') is-invalid @enderror" type="date" id="dob-input" name="dob"
                                                value="{{ Auth::user()->dob }}" required>
                                                @error('dob')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                    <a href="javascript:;">
                                        <img src="../assets/img/team-2.jpg"
                                            class="rounded-circle img-fluid border border-2 border-white">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row">
                                {{-- <div class="col">
                        <div class="d-flex justify-content-center">
                          <div class="d-grid text-center">
                            <span class="text-lg font-weight-bolder">22</span>
                            <span class="text-sm opacity-8">Friends</span>
                          </div>
                          <div class="d-grid text-center mx-4">
                            <span class="text-lg font-weight-bolder">10</span>
                            <span class="text-sm opacity-8">Photos</span>
                          </div>
                          <div class="d-grid text-center">
                            <span class="text-lg font-weight-bolder">89</span>
                            <span class="text-sm opacity-8">Comments</span>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                                <div class="text-center mt-4">
                                    <h5>
                                        {{ Auth::user()->name }}<span class="font-weight-light">,
                                            {{ Auth::user()->dob }}</span>
                                    </h5>
                                    <div class="h6 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>{{ Auth::user()->address }}
                                    </div>
                                    <div class="h6 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>{{ Auth::user()->role }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </main>
@endsection

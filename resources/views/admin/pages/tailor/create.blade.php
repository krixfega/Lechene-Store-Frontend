@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Assign Tailor</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('staffs.index') }}" class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Tailors</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-2 pt-2 pb-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('tailor.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tailor">Tailor:</label>
                                    <select name="tailor" id="tailor"
                                        class="form-control @error('tailor') is-invalid @enderror">

                                        @foreach ($tailors as $tailor)
                                            <option value="{{ $tailor->user->id }}">{{ $tailor->user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tailor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="booking_no">Booking Number:</label>
                                    <select name="booking_no" id="booking_no"
                                        class="form-control @error('booking_no') is-invalid @enderror">
                                        {{-- <option value="">Select a booking</option> --}}
                                        @foreach ($bookings as $booking)
                                            <option value="{{ $booking->id }}">{{ $booking->booking_no }}</option>
                                        @endforeach
                                    </select>
                                    @error('booking_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="total_price">Total Price:</label>
                                    <input type="number" name="total_price" id="total_price" required
                                        class="form-control @error('total_price') is-invalid @enderror"
                                        value="{{ old('total_price') }}">
                                    @error('total_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="paid_price">Paid Price:</label>
                                    <input type="number" name="paid_price" id="paid_price" required
                                        class="form-control @error('paid_price') is-invalid @enderror"
                                        value="{{ old('paid_price') }}">
                                    @error('paid_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="balance_price">Balance Price:</label>
                                    <input type="number" name="balance_price" id="balance_price" required
                                        class="form-control @error('balance_price') is-invalid @enderror"
                                        value="{{ old('balance_price') }}">
                                    @error('balance_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection


@section('script')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection

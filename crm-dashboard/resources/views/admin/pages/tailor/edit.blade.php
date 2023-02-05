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
                                <h6>Edit Assigned  Tailor</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('tailor.index') }}" class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Assigned Tailors</h6>
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

                            <form action="{{ route('tailor.update', $tailor->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="tailor">tailor</label>
                                  {{-- <select class="form-control @error('tailor') is-invalid @enderror" id="tailor" name="tailor"> --}}
                                   
                                    <select name="tailor" id="tailor" class="form-control @error('tailor') is-invalid @enderror">
                                         {{-- <option value="">Select User</option> --}}
                                        @foreach ($tailors as $tailor_options)
                                          <option value="{{ $tailor_options->user->id }}" {{ ($tailor->user_id == $tailor_options->user->id) ? 'selected' : '' }}>{{ $tailor_options->user->name }}</option>
                                        @endforeach
                                      </select>
                                  {{-- </select> --}}
                                  @error('tailor')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="booking_id">Booking</label>
                                  <select class="form-control @error('booking_id') is-invalid @enderror" id="booking_id" name="booking_id">
                                  @forelse($bookings as $booking)
                                <option value="{{ $booking->id }}" {{ ( $tailor->booking_id == $booking->id) ? 'selected' : '' }}>{{ $booking->booking_no }}</option>
  
                                  @empty
                                      <option >No Booking Available</option>
                                  @endforelse
                                   
                                  </select>
                                  @error('booking_id')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="total_price">Total Price</label>
                                  <input type="text" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price', $tailor->total_price) }}">
                                  @error('total_price')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="paid_price">Paid Price</label>
                                  <input type="text" class="form-control @error('paid_price') is-invalid @enderror" id="paid_price" name="paid_price" value="{{ old('paid_price', $tailor->paid_price) }}">
                                  @error('paid_price')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="balance_price">Balance Price:</label>
                                    <input type="number" name="balance_price" id="balance_price" required
                                        class="form-control @error('balance_price') is-invalid @enderror"
                                        value="{{ old('balance_price',$tailor->balance_price) }}">
                                    @error('balance_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

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
                                <h6>Edit Fashion Booking</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('booking.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Bookings</h6>
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

                            <form action="{{url('admin/booking/'.$booking->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label for="fabrics_id">Fabric</label>
                                <select class="form-control @error('fabrics_id') is-invalid @enderror" id="fabrics_id" name="fabrics_id" required>
                                @foreach($fabrics as $fabric)
                                <option value="{{ $fabric->id }}" {{ $fabric->id == $booking->fabrics_id ? 'selected':'' }}>{{ $fabric->name }}</option>
                                @endforeach
                                </select>
                                @error('fabrics_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="fullName">Full Name(*required)</label>
                                <input type="text" required class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" value="{{ $booking->fullName }}" required>
                                @error('fullName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="phoneNumber">Phone Number(*required)</label>
                                <input type="text" required class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" value="{{ $booking->phoneNumber }}" required>
                                @error('phoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="address">Address(*required)</label>
                                <input type="text" required class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $booking->address }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="email">Email(*required)</label>
                                <input type="email" required class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ $booking->email }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>



                                <div class="form-group">
                                <label for="pickupDate">Pickup Date (*required) </label>
                                <input type="date" required class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate" name="pickupDate" value="{{ $booking->pickupDate }}" required>
                                @error('pickupDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="bookingStatus">Booking Status (*required)</label>
                                <select class="form-control @error('bookingStatus') is-invalid @enderror" id="bookingStatus" name="bookingStatus">
                                <option value="pending" {{ $booking->bookingStatus == 'pending' ? 'selected':'' }}>Pending</option>
                                <option value="approved" {{ $booking->bookingStatus == 'approved' ? 'selected':'' }}>Approved</option>
                                <option value="rejected" {{ $booking->bookingStatus == 'rejected' ? 'selected':'' }}>Rejected</option>
                                </select>
                                @error('bookingStatus')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="desc">Style Description</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="3">
                                    {{ $booking->desc }}
                                </textarea>
                                @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>


                                <div class="form-group">

                                    <label for="image"> Edit Style Images</label>


                                    <input  type="file" class="form-control @error('image') is-invalid @enderror"
                                     id="images" name="images[]"  multiple>
                                     {{-- <div id="images-container" class="row"></div> --}}

                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                  </div>
                                  <div class="row">
                                    @foreach($booking->styles as $img)
                                    <br>

                                    <img src="{{asset('images/products/'.$img->name)}}" alt="{{$img->name}}" class="img-thumbnail w-25 col-6">
                                    @endforeach
                                        </div>
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
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}
@endsection

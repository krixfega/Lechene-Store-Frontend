@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Booking Details for Customer {{ $booking->customer->email}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">All Booking</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View booking</li>
                    </ol>
                </nav>


                <div class="row px-3">
                    <div class="col-12 col-lg-6 mb-3 shadow p-3 mb-5  bg-white ">
                        {{-- <h4>User Details</h4> --}}
                        <table class="table  table-striped table-responsive-sm">

                            <tr>
                                <th>Full Name:</th>
                                <td class="text-secondary">{{ $booking->fullName }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td class="text-secondary">{{ $booking->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td class="text-secondary">{{ $booking->address }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td class="text-secondary">{{ $booking->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td class="text-secondary">{{ $booking->gender }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-lg-6 shadow p-3 mb-5  bg-white ">
                        {{-- <h4>Product Details</h4> --}}
                        <table class="table table-striped table-responsive-sm">
                            <tr>
                                <th>Booking Number:</th>
                                <td class="text-secondary">{{ $booking->booking_no }}</td>
                            </tr>
                            <tr>
                                <th>Fabric:</th>
                                <td class="text-secondary">{{ $booking->fabric->name }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td class="text-primary font-weight-bold">NGN{{ $booking->fabric->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Quantity:</th>
                                <td class="text-secondary">{{ $booking->qty }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td class="text-secondary">{{ $booking->bookingStatus }}</td>
                            </tr>
                            <tr>
                                <th>Pickup Date:</th>
                                <td class="text-secondary">{{ $booking->pickupDate }}</td>
                            </tr>
                        </table>
                    </div>
                </div>



                <div class="container my-5">
                    <h5 class="text-underline text-center mb-3">Measurement Details</h5>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <table class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Neck</td>
                                        <td class="text-secondary ">{{ $booking->customer->neck }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Shoulder</td>
                                        <td class="text-secondary ">{{ $booking->customer->shoulder }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Front Arc</td>
                                        <td class="text-secondary ">{{ $booking->customer->frontArc }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Waist</td>
                                        <td class="text-secondary ">{{ $booking->customer->waist }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Hips</td>
                                        <td class="text-secondary ">{{ $booking->customer->hip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Top Length</td>
                                        <td class="text-secondary ">{{ $booking->customer->topLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Trouser Length</td>
                                        <td class="text-secondary ">{{ $booking->customer->trouserLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Arm Hole</td>
                                        <td class="text-secondary ">{{ $booking->customer->armHole }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Round Sleeve</td>
                                        <td class="text-secondary ">{{ $booking->customer->roundSleeve }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Thigh</td>
                                        <td class="text-secondary ">{{ $booking->customer->thigh }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Knee</td>
                                        <td class="text-secondary ">{{ $booking->customer->knee }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Crotch</td>
                                        <td class="text-secondary ">{{ $booking->customer->crotch }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- @if ($booking->gender == 'female')
                      <div class="col-12 col-lg-6">
                        <table class="table table-bordered table-responsive">
                          <tbody>
                            <tr> --}}
                        @if ($booking->customer->gender == 'female')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UpperBust:</td>
                                            <td class="text-secondary ">{{ $booking->customer->upperBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Bust:</td>
                                            <td class="text-secondary ">{{ $booking->customer->bust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UnderBust:</td>
                                            <td class="text-secondary ">{{ $booking->customer->underBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">BustPoint:</td>
                                            <td class="text-secondary ">{{ $booking->customer->bustPoint }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">N-N:</td>
                                            <td class="text-secondary ">{{ $booking->customer->N_N }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length:</td>
                                            <td class="text-secondary ">{{ $booking->customer->halfLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length Back:</td>
                                            <td class="text-secondary ">{{ $booking->customer->halfLengthBack }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Highwaist:</td>
                                            <td class="text-secondary ">{{ $booking->customer->highWaist }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Knee:</td>
                                            <td class="text-secondary ">{{ $booking->customer->shoulderToKnee }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Hip:</td>
                                            <td class="text-secondary ">{{ $booking->customer->shoulderToHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Full Length:</td>
                                            <td class="text-secondary ">{{ $booking->customer->fullLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Dress Length:</td>
                                            <td class="text-secondary ">{{ $booking->customer->dressLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve Length:</td>
                                            <td class="text-secondary ">{{ $booking->customer->sleeveLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Calf:</td>
                                            <td class="text-secondary ">{{ $booking->customer->calf }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if ($booking->customer->gender == 'male')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">

                                    <tbody>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Chest:</td>
                                            <td class="text-secondary ">{{ $booking->customer->chest }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Stomach:</td>
                                            <td class="text-secondary ">{{ $booking->customer->stomach }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Top Hip:</td>
                                            <td class="text-secondary ">{{ $booking->customer->topHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Biceps:</td>
                                            <td class="text-secondary ">{{ $booking->customer->biceps }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve:</td>
                                            <td class="text-secondary ">{{ $booking->customer->sleeve }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="row my-4">

                    <div class="col-12 col-lg-6">
                      <h4 class="text-center">Style Images</h4>
                      <div id="styleCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          @foreach ($booking->styles as $key => $img)
                          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/styles/' . $img->name) }}" alt="{{ $img->name }}" class="img-fluid w-100 rounded">
                          </div>
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#styleCarousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#styleCarousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <h4 class="text-center">Style Description</h4>
                      <p class="text-justify my-3">{{ $booking->desc }}</p>
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
@endsection

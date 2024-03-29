@extends('user.layouts.app')
@section('content')
    <main class="main-content  ">
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Booking Details</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.account.index') }}">Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View bookings</li>
                    </ol>
                </nav>


                <div class="row px-3">
                    <div class="col-12 col-lg-6 mb-3 shadow p-3 mb-5  bg-white ">
                        {{-- <h4>User Details</h4> --}}
                        <table class="table  table-striped table-responsive-sm">
                            <tr>
                                <th>Full Name:</th>
                                <td class="">{{ $booking->fullName }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td class="">{{ $booking->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td class="">{{ $booking->address }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td class="">{{ $booking->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td class="">{{ $booking->gender }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-lg-6 shadow p-3 mb-5  bg-white ">
                        {{-- <h4>Product Details</h4> --}}
                        <table class="table table-striped table-responsive-sm">
                            <tr>
                                <th>Booking Number:</th>
                                <td class="">{{ $booking->booking_no }}</td>
                            </tr>
                            <tr>
                                <th>Fabric:</th>
                                <td class="">{{ $booking->fabric->name }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td class="text-primary font-weight-bold">NGN{{ $booking->fabric->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Quantity:</th>
                                <td class="">{{ $booking->qty }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td class="">{{ $booking->bookingStatus }}</td>
                            </tr>
                            <tr>
                                <th>Pickup Date:</th>
                                <td class="">{{ $booking->pickupDate }}</td>
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
                                        <td class=" ">{{ $booking->neck }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Shoulder</td>
                                        <td class=" ">{{ $booking->shoulder }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Front Arc</td>
                                        <td class=" ">{{ $booking->frontArc }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Waist</td>
                                        <td class=" ">{{ $booking->waist }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Hips</td>
                                        <td class=" ">{{ $booking->hip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Top Length</td>
                                        <td class=" ">{{ $booking->topLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Trouser Length</td>
                                        <td class=" ">{{ $booking->trouserLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Arm Hole</td>
                                        <td class=" ">{{ $booking->armHole }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Round Sleeve</td>
                                        <td class=" ">{{ $booking->roundSleeve }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Thigh</td>
                                        <td class=" ">{{ $booking->thigh }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Knee</td>
                                        <td class=" ">{{ $booking->knee }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Crotch</td>
                                        <td class=" ">{{ $booking->crotch }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- @if ($booking->gender == 'female')
                      <div class="col-12 col-lg-6">
                        <table class="table table-bordered table-responsive">
                          <tbody>
                            <tr> --}}
                        @if ($booking->gender == 'female')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UpperBust:</td>
                                            <td class=" ">{{ $booking->upperBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Bust:</td>
                                            <td class=" ">{{ $booking->bust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UnderBust:</td>
                                            <td class=" ">{{ $booking->underBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">BustPoint:</td>
                                            <td class=" ">{{ $booking->bustPoint }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">N-N:</td>
                                            <td class=" ">{{ $booking->N_N }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length:</td>
                                            <td class=" ">{{ $booking->halfLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length Back:</td>
                                            <td class=" ">{{ $booking->halfLengthBack }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Highwaist:</td>
                                            <td class=" ">{{ $booking->highWaist }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Knee:</td>
                                            <td class=" ">{{ $booking->shoulderToKnee }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Hip:</td>
                                            <td class=" ">{{ $booking->shoulderToHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Full Length:</td>
                                            <td class=" ">{{ $booking->fullLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Dress Length:</td>
                                            <td class=" ">{{ $booking->dressLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve Length:</td>
                                            <td class=" ">{{ $booking->sleeveLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Calf:</td>
                                            <td class=" ">{{ $booking->calf }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if ($booking->gender == 'male')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">

                                    <tbody>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Chest:</td>
                                            <td class=" ">{{ $booking->chest }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Stomach:</td>
                                            <td class=" ">{{ $booking->stomach }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Top Hip:</td>
                                            <td class=" ">{{ $booking->topHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Biceps:</td>
                                            <td class=" ">{{ $booking->biceps }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve:</td>
                                            <td class=" ">{{ $booking->sleeve }}</td>
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




@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Booking Details</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('booking.index')}}">All Booking</a></li>
                      <li class="breadcrumb-item active" aria-current="page">View booking</li>
                    </ol>
                  </nav>
                  

                <div class="col-12  col-lg-6 mt-10 mb-3 ">
                    <h4 class="">User Details</h4>
                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Full Name:</td>
                            <td class="text-secondary">{{ $booking->fullname }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Phone Number:</td>
                            <td class="text-secondary">{{ $booking->phoneNumber }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Address:</td>
                            <td class="text-secondary">{{ $booking->address }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Email:</td>
                            <td class="text-secondary">{{ $booking->email }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Gender:</td>
                            <td class="text-secondary">{{ $booking->gender }}</td>
                        </tr>


                        <!-- All other fields -->
                    </table>
                </div>
                <div class="col-12  col-lg-6 mt-lg-10 mt-3 my-0">
                    <h4 class="r ">Product details</h4>

                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Booking Number:</td>
                            <td class="text-secondary">{{ $booking->booking_no }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Fibric:</td>
                            <td class="text-secondary">{{ $booking->fabric->name }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Price:</td>
                            <td>NGN{{ $booking->fabric->selling_price }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Quantity:</td>
                            <td class="text-secondary">{{ $booking->qty }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Quantity:</td>
                            <td class="text-secondary">{{ $booking->booking_status }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Pickup Date:</td>
                            <td class="text-secondary">{{ $booking->pickupDate }}</td>
                        </tr>

                    </table>
                </div>
                <div class="col-12  col-lg-12 my-lg-2 my-2">
                    <h4 class="">Measurement details</h4>
                    <div class="row">
                    <table class="text-primary table-responsive col-12 col-lg-3">
                        <tr class="d-flex flex-wrap">
                            <td>Burst Front Arc:</td>
                            <td class="text-secondary">{{ $booking->bustFrontArc }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Burst Back Arc:</td>
                            <td class="text-secondary">{{ $booking->bustBackArc }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Corset Lenght:</td>
                            <td>{{ $booking->corsetLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>3/4 Lenght:</td>
                            <td class="text-secondary">{{ $booking->Length3_4 }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Elbow:</td>
                            <td class="text-secondary">{{ $booking->shortSleeveElbow }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Round Elbow:</td>
                            <td class="text-secondary">{{ $booking->shortSleeveRoundlbow }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Full Sleeve Length:</td>
                            <td class="text-secondary">{{ $booking->shortSleeveFullSleeveLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Neck:</td>
                            <td class="text-secondary">{{ $booking->neck }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Shoulder:</td>
                            <td class="text-secondary">{{ $booking->shoulder }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>OffShoulder:</td>
                            <td class="text-secondary">{{ $booking->OffShoulder }}</td>
                        </tr>



                    </table>
                    <table class="text-primary table-responsive col-lg-3 col-12">

                        <tr class="d-flex flex-wrap">
                            <td>UpperBust:</td>
                            <td class="text-secondary">{{ $booking->upperBust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Bust:</td>
                            <td class="text-secondary">{{ $booking->bust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>UnderBust:</td>
                            <td class="text-secondary">{{ $booking->underBust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>BustPoint:</td>
                            <td class="text-secondary">{{ $booking->bustPoint }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>N-N:</td>
                            <td class="text-secondary">{{ $booking->N_N }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>acrossF/B:</td>
                            <td class="text-secondary">{{ $booking->acrossF_B }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>HalfLengthF/B:</td>
                            <td class="text-secondary">{{ $booking->halfLengthF_B }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Top Length:</td>
                            <td class="text-secondary">{{ $booking->topLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Waist/Highwaist:</td>
                            <td class="text-secondary">{{ $booking->waist_highwaist }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>hip/hipLength:</td>
                            <td class="text-secondary">{{ $booking->hip_hipLength }}</td>
                        </tr>
                    </table>
                    <table class="text-primary table-responsive col-12 col-lg-3">


                        <tr class="d-flex flex-wrap">
                            <td>thigh/knee_ankle:</td>
                            <td class="text-secondary">{{ $booking->thigh_knee_ankle }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>knee Circumfrence:</td>
                            <td class="text-secondary">{{ $booking->kneeCircumfrence }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>shoulderToHip/knee:</td>
                            <td class="text-secondary">{{ $booking->shoulderToHip_knee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>waistToknee:</td>
                            <td class="text-secondary">{{ $booking->waistToknee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>armhole/hicep:</td>
                            <td class="text-secondary">{{ $booking->armhole_hicep }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>sleeve:</td>
                            <td class="text-secondary">{{ $booking->sleeve }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>roundSleeve:</td>
                            <td class="text-secondary">{{ $booking->roundSleeve }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>wrist:</td>
                            <td class="text-secondary">{{ $booking->wrist }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>trouserLength:</td>
                            <td class="text-secondary">{{ $booking->trouserLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>fullLength:</td>
                            <td class="text-secondary">{{ $booking->fullLength }}</td>
                        </tr>

                    </table>


                    <table class="text-primary table-responsive col-12 col-lg-3">

                        <tr class="d-flex flex-wrap">
                            <td>dressLength:</td>
                            <td class="text-secondary">{{ $booking->dressLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>shirt/Trouser:</td>
                            <td class="text-secondary">{{ $booking->shirt_Trouser }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Length:</td>
                            <td class="text-secondary">{{ $booking->Length }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>RoundKnee:</td>
                            <td class="text-secondary">{{ $booking->RoundKnee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>KneeLength:</td>
                            <td class="text-secondary">{{ $booking->KneeLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>waist/hips:</td>
                            <td class="text-secondary">{{ $booking->waist_hips }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>thigh:</td>
                            <td class="text-secondary">{{ $booking->thigh }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>ankle:</td>
                            <td class="text-secondary">{{ $booking->ankle }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>crotch F/B:</td>
                            <td class="text-secondary">{{ $booking->crotchF_B }}</td>
                        </tr>

                    </table>
                    </div>
                </div>

                <div class="col-12  col-lg-12 my-lg-2 my-2">
                    <h4 class="">Comment</h4>
                    <p>
                        {{$booking->comment}}
                    </p>
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

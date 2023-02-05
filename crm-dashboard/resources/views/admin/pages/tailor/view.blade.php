@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Tailor Assignment Details</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('tailor.index')}}">All Assigned Tailors</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$tailor->user->name}}</li>
                    </ol>
                  </nav>


                <div class="col-12 col-lg-4 mt-10 mb-3 ">
                    <h6 class="text-decoration-underline">Tailor Details</h6>
                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Full Name:</td>
                            <td class="text-secondary">{{ $tailor->user->name }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Phone Number:</td>
                            <td class="text-secondary">{{ $tailor->user->phone }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Address:</td>
                            <td class="text-secondary">{{ $tailor->user->address }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Email:</td>
                            <td class="text-secondary">{{ $tailor->user->email }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Gender:</td>
                            <td class="text-secondary">{{ $tailor->user->gender }}</td>
                        </tr>


                        <!-- All other fields -->
                    </table>
                </div>
               
                    
                <div class="col-12  col-lg-4 mt-10 mb-3 ">
                    <h6 class="text-decoration-underline">User Details</h6>
                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Full Name:</td>
                            <td class="text-secondary">{{ $tailor->booking->fullname }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Phone Number:</td>
                            <td class="text-secondary">{{ $tailor->booking->phoneNumber }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Address:</td>
                            <td class="text-secondary">{{ $tailor->booking->address }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Email:</td>
                            <td class="text-secondary">{{ $tailor->booking->email }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Gender:</td>
                            <td class="text-secondary">{{ $tailor->booking->gender }}</td>
                        </tr>


                        <!-- All other fields -->
                    </table>
                </div>
                <div class="col-12  col-lg-4 mt-lg-10 mt-3 my-0">
                    <h6 class="text-decoration-underline ">Product details</h6>

                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Booking Number:</td>
                            <td class="text-secondary">{{ $tailor->booking->booking_no }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Fibric:</td>
                            <td class="text-secondary">{{ $tailor->booking->fabric->name }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Price:</td>
                            <td>NGN{{ $tailor->booking->fabric->selling_price }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Quantity:</td>
                            <td class="text-secondary">{{ $tailor->booking->qty }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Status:</td>
                            <td class="text-secondary">{{ $tailor->booking->booking_status }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Pickup Date:</td>
                            <td class="text-secondary">{{ $tailor->booking->pickupDate }}</td>
                        </tr>

                    </table>
                </div>
                <div class="col-12  col-lg-12 my-lg-2 my-2">
                    <h6 class="text-center mb-3 text-decoration-underline">Measurement details</h6>
                    <div class="row">
                    <table class="text-primary table-responsive col-12 col-lg-3">
                        <tr class="d-flex flex-wrap">
                            <td>Burst Front Arc:</td>
                            <td class="text-secondary">{{ $tailor->booking->bustFrontArc }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Burst Back Arc:</td>
                            <td class="text-secondary">{{ $tailor->booking->bustBackArc }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Corset Lenght:</td>
                            <td>{{ $tailor->booking->corsetLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>3/4 Lenght:</td>
                            <td class="text-secondary">{{ $tailor->booking->Length3_4 }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Elbow:</td>
                            <td class="text-secondary">{{ $tailor->booking->shortSleeveElbow }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Round Elbow:</td>
                            <td class="text-secondary">{{ $tailor->booking->shortSleeveRoundlbow }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Short Sleeve Full Sleeve Length:</td>
                            <td class="text-secondary">{{ $tailor->booking->shortSleeveFullSleeveLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Neck:</td>
                            <td class="text-secondary">{{ $tailor->booking->neck }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Shoulder:</td>
                            <td class="text-secondary">{{ $tailor->booking->shoulder }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>OffShoulder:</td>
                            <td class="text-secondary">{{ $tailor->booking->OffShoulder }}</td>
                        </tr>



                    </table>
                    <table class="text-primary table-responsive col-lg-3 col-12">

                        <tr class="d-flex flex-wrap">
                            <td>UpperBust:</td>
                            <td class="text-secondary">{{ $tailor->booking->upperBust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Bust:</td>
                            <td class="text-secondary">{{ $tailor->booking->bust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>UnderBust:</td>
                            <td class="text-secondary">{{ $tailor->booking->underBust }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>BustPoint:</td>
                            <td class="text-secondary">{{ $tailor->booking->bustPoint }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>N-N:</td>
                            <td class="text-secondary">{{ $tailor->booking->N_N }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>acrossF/B:</td>
                            <td class="text-secondary">{{ $tailor->booking->acrossF_B }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>HalfLengthF/B:</td>
                            <td class="text-secondary">{{ $tailor->booking->halfLengthF_B }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Top Length:</td>
                            <td class="text-secondary">{{ $tailor->booking->topLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Waist/Highwaist:</td>
                            <td class="text-secondary">{{ $tailor->booking->waist_highwaist }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>hip/hipLength:</td>
                            <td class="text-secondary">{{ $tailor->booking->hip_hipLength }}</td>
                        </tr>
                    </table>
                    <table class="text-primary table-responsive col-12 col-lg-3">


                        <tr class="d-flex flex-wrap">
                            <td>thigh/knee_ankle:</td>
                            <td class="text-secondary">{{ $tailor->booking->thigh_knee_ankle }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>knee Circumfrence:</td>
                            <td class="text-secondary">{{ $tailor->booking->kneeCircumfrence }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>shoulderToHip/knee:</td>
                            <td class="text-secondary">{{ $tailor->booking->shoulderToHip_knee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>waistToknee:</td>
                            <td class="text-secondary">{{ $tailor->booking->waistToknee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>armhole/hicep:</td>
                            <td class="text-secondary">{{ $tailor->booking->armhole_hicep }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>sleeve:</td>
                            <td class="text-secondary">{{ $tailor->booking->sleeve }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>roundSleeve:</td>
                            <td class="text-secondary">{{ $tailor->booking->roundSleeve }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>wrist:</td>
                            <td class="text-secondary">{{ $tailor->booking->wrist }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>trouserLength:</td>
                            <td class="text-secondary">{{ $tailor->booking->trouserLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>fullLength:</td>
                            <td class="text-secondary">{{ $tailor->booking->fullLength }}</td>
                        </tr>

                    </table>


                    <table class="text-primary table-responsive col-12 col-lg-3">

                        <tr class="d-flex flex-wrap">
                            <td>dressLength:</td>
                            <td class="text-secondary">{{ $tailor->booking->dressLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>shirt/Trouser:</td>
                            <td class="text-secondary">{{ $tailor->booking->shirt_Trouser }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Length:</td>
                            <td class="text-secondary">{{ $tailor->booking->Length }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>RoundKnee:</td>
                            <td class="text-secondary">{{ $tailor->booking->RoundKnee }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>KneeLength:</td>
                            <td class="text-secondary">{{ $tailor->booking->KneeLength }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>waist/hips:</td>
                            <td class="text-secondary">{{ $tailor->booking->waist_hips }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>thigh:</td>
                            <td class="text-secondary">{{ $tailor->booking->thigh }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>ankle:</td>
                            <td class="text-secondary">{{ $tailor->booking->ankle }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>crotch F/B:</td>
                            <td class="text-secondary">{{ $tailor->booking->crotchF_B }}</td>
                        </tr>

                    </table>
                    </div>
                </div>

                <div class="col-12  col-lg-12 my-lg-2 my-2">
                    <h6 class="tetx-center">Comment</h6>
                    <p>
                        {{$tailor->booking->comment}}
                    </p>
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

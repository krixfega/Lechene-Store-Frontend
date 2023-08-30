@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Measurement Details</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">All customers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Measurement</li>
                    </ol>
                </nav>





                <div class="container my-5">
                    {{-- <h5 class="text-underline text-center mb-4">Measurement For {{$measurement->users->email}}</h5> --}}
                    <div class="row mt-6">
                        <div class="col-12 my-6 row">

                    <div class="col-12 col-lg-12">
                        <h5 class="text-center">Measurement For {{$measurement->users->email}}</h5>
                    </div>
                          <div class="col-12 col-lg-12">
                             <a href="{{route('measurement.edit',$measurement->users->id)}}" role="button" class="justify-center btn btn-primary">Change Measurement</a>
                        </div>
                              </div>
                        <div class="col-12 col-lg-6">
                            <table class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Neck</td>
                                        <td class="text-secondary ">{{ $measurement->neck }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Shoulder</td>
                                        <td class="text-secondary ">{{ $measurement->shoulder }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Front Arc</td>
                                        <td class="text-secondary ">{{ $measurement->frontArc }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Waist</td>
                                        <td class="text-secondary ">{{ $measurement->waist }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Hips</td>
                                        <td class="text-secondary ">{{ $measurement->hip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Top Length</td>
                                        <td class="text-secondary ">{{ $measurement->topLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Trouser Length</td>
                                        <td class="text-secondary ">{{ $measurement->trouserLength }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Arm Hole</td>
                                        <td class="text-secondary ">{{ $measurement->armHole }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Round Sleeve</td>
                                        <td class="text-secondary ">{{ $measurement->roundSleeve }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Thigh</td>
                                        <td class="text-secondary ">{{ $measurement->thigh }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Knee</td>
                                        <td class="text-secondary ">{{ $measurement->knee }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary font-weight-bold">Crotch</td>
                                        <td class="text-secondary ">{{ $measurement->crotch }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- @if ($measurement->gender == 'female')
                      <div class="col-12 col-lg-6">
                        <table class="table table-bordered table-responsive">
                          <tbody>
                            <tr> --}}
                        @if ($measurement->gender == 'female')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UpperBust:</td>
                                            <td class="text-secondary ">{{ $measurement->upperBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Bust:</td>
                                            <td class="text-secondary ">{{ $measurement->bust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">UnderBust:</td>
                                            <td class="text-secondary ">{{ $measurement->underBust }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">BustPoint:</td>
                                            <td class="text-secondary ">{{ $measurement->bustPoint }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">N-N:</td>
                                            <td class="text-secondary ">{{ $measurement->N_N }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length:</td>
                                            <td class="text-secondary ">{{ $measurement->halfLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Half Length Back:</td>
                                            <td class="text-secondary ">{{ $measurement->halfLengthBack }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Highwaist:</td>
                                            <td class="text-secondary ">{{ $measurement->highWaist }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Knee:</td>
                                            <td class="text-secondary ">{{ $measurement->shoulderToKnee }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Shoulder To Hip:</td>
                                            <td class="text-secondary ">{{ $measurement->shoulderToHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Full Length:</td>
                                            <td class="text-secondary ">{{ $measurement->fullLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Dress Length:</td>
                                            <td class="text-secondary ">{{ $measurement->dressLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve Length:</td>
                                            <td class="text-secondary ">{{ $measurement->sleeveLength }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Calf:</td>
                                            <td class="text-secondary ">{{ $measurement->calf }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if ($measurement->gender == 'male')
                            <div class="col-12 col-lg-6">
                                <table class="table table-bordered table-responsive">

                                    <tbody>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Chest:</td>
                                            <td class="text-secondary ">{{ $measurement->chest }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Stomach:</td>
                                            <td class="text-secondary ">{{ $measurement->stomach }}</td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Top Hip:</td>
                                            <td class="text-secondary ">{{ $measurement->topHip }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Biceps:</td>
                                            <td class="text-secondary ">{{ $measurement->biceps }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-primary font-weight-bold">Sleeve:</td>
                                            <td class="text-secondary ">{{ $measurement->sleeve }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif


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

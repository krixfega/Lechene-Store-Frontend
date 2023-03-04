@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Yearly income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358;{{ $yearly_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $yearly_increase }}%</span>
                                            since Last Year
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-md opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Monthly income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358;{{ $current_month_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $monthly_percentage_increase }}%</span>
                                            since Last month
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-md opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">weekly income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $weekly_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $weekly_increase }}%</span>
                                            since Last week
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Daily income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $daily_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $daily_percent_increase }}%</span>
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row mb-3 ">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers text-white">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Sales</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $total_sales }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-success text-xs font-weight-bolder">Acuumulated total
                                                sales</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers text-white">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Customers</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $total_customers }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $users_percentage_increase }}%</span>
                                            since last week
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers ">
                                        <p class="text-sm mb-0 text-danger text-uppercase font-weight-bold">in Progress</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $pending_orders }}
                                        </h5>
                                        <p class="mb-0 text-white text-sm">
                                            <span class=" text-xs font-weight-bolder"></span>
                                            all pending orders
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers ">
                                        <p class="text-sm mb-0 text-success text-uppercase font-weight-bold">Approved</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $approved_orders }}
                                        </h5>
                                        <p class="mb-0 text-white text-sm">
                                            <span class=" text-xs font-weight-bolder"></span>
                                            all approved orders
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- booking --}}
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">Yearly Booking income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358;{{$net_annual_booking_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $yearly_booking_increase }}%</span>
                                            since Last Year
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-md opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">Monthly Booking income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358;{{ $net_monthly_booking_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $monthly_booking_increase }}%</span>
                                            since Last month
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-md opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">weekly booking income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $net_weekly_booking_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $weekly_booking_increase }}%</span>
                                            Last Week
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">Daily Booking income</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $net_daily_booking_income }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $daily_booking_increase }}%</span>
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row mb-3 ">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers text-white">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">Total Booking  Sales</p>
                                        <h5 class="font-weight-bolder">
                                            &#8358; {{ $total_booking_sales }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span class="text-success text-xs font-weight-bolder">Booking total
                                                sales</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers text-white">
                                        <p class="text-xs mb-0 text-uppercase font-weight-bold">Total Booking</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $total_booking }}
                                        </h5>
                                        <p class="mb-0 text-sm">
                                            <span
                                                class="text-success text-xs font-weight-bolder">{{ $bookings_percentage_increase }}%</span>
                                            since last week
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers ">
                                        <p class="text-xs mb-0 text-danger text-uppercase font-weight-bold">Booking in Progress</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $pending_booking }}
                                        </h5>
                                        <p class="mb-0 text-white text-sm">
                                            <span class=" text-xs font-weight-bolder"></span>
                                            all pending orders
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-9">
                                    <div class="numbers ">
                                        <p class="text-sm mb-0 text-success text-uppercase font-weight-bold">Booking Approved</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $approved_booking }}
                                        </h5>
                                        <p class="mb-0 text-white text-sm">
                                            <span class=" text-xs font-weight-bolder"></span>
                                            all approved orders
                                        </p>
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Sales overview</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card card-carousel overflow-hidden h-100 p-0">
                        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner border-radius-lg h-100">
                                <div class="carousel-item h-100 active"
                                    style="background-image: url('../assets/img/carousel-1.jpg');
      background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">Admin Dashboard</h5>
                                        <p>Analytics of business operations</p>
                                    </div>
                                </div>
                                <div class="carousel-item h-100"
                                    style="background-image: url('../assets/img/carousel-2.jpg');
      background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">Read documentation</h5>
                                        <p>Custom made admin panel for Le Chene</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Top 10 Products</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    @foreach ($top_sold_products as $prod)
<tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="../assets/img/apple-icon.png" alt="Client Image">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                                                    <h6 class="text-sm mb-0">{{$prod->products->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Quantities sold</p>
                                                <h6 class="text-sm mb-0">{{$prod->total_quantity}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Value:</p>
                                                <h6 class="text-sm mb-0"> &#8358; {{$prod->products->selling_price * $prod->total_quantity}}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Percentage of Income:</p>
                                                <h6 class="text-sm mb-0">{{ round((( $prod->products->selling_price - $prod->products->cost_price ) / $prod->products->cost_price) * 100, 2) }} %</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Categories</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <i class="ni ni-mobile-button text-white opacity-10"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                            <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                                    sold</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <i class="ni ni-tag text-white opacity-10"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                            <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                                    open</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <i class="ni ni-box-2 text-white opacity-10"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                            <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                                    closed</span></span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                            <i class="ni ni-satisfied text-white opacity-10"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                            <span class="text-xs font-weight-bold">+ 430</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            @include('admin.layouts.includes.footer')
        </div>
    </main>
@endsection
@section('script')
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Total Income",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [{{ $jan_income }}, {{ $feb_income }}, {{ $mar_income }},
                        {{ $apr_income }}, {{ $may_income }}, {{ $jun_income }},
                        {{ $jul_income }}, {{ $aug_income }}, {{ $sep_income }},
                        {{ $oct_income }}, {{ $nov_income }}, {{ $dec_income }}
                    ],

                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
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
< @endsection

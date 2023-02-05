@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
           
        </div>
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
 <div class="row">
                <div class="col-md-12 text-secondary">
                    <h1>{{ $product->name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/products/'. $image->name) }}" class="d-block w-100  carousel-img" alt="...">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                    </div>
                </div>
                <div class="col-md-6 py-7 text-primary">

                    <p>Category: {{ $product->Category->name }}</p>
                    <p>Cost Price: NGN{{ $product->cost_price }}</p>
                    <p>Selling Price: NGN{{ $product->selling_price }}</p>
                    <p>Discounted Price: NGN{{ $product->discounted_price }}</p>
                    <p>Quantity: {{ $product->qty }} PCS</p>
                    <p>Size: {{$product->size}}</p>


                    <h3>Details</h3>
                    <p>{{ $product->details }}</p>
                    

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
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
@endsection

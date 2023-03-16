@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $fibric->name }}</h3>
                </div>
                <div class="card-body">
                    <p>Type/Colors: {{ $fibric->typeOrColors }}</p>
                    <p>Quantity: {{ $fibric->qty }}</p>
                    <p>Category: {{ $fibric->category}}</p>
                    <p>Cost Price: {{ $fibric->cost_price }}</p>
                    <p>Selling Price: {{ $fibric->selling_price }}</p>

                       <h4> Details:</h4>
                         <p>{{ $fibric->details }}</p>
                    <div class="card-subtitle">
                        <h4>Images:</h4>
                        <div class="row">
                            @foreach($fibric->FibricImages as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('images/fibrics/'.$image->name) }}" width="100">
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>

                    </div>
                </div>
            </div>

        </div>
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

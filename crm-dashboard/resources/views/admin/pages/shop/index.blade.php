@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">
                @if(session()->has('error'))
    <div class="alert alert-danger text-secondary">
        {{ session()->get('error') }}
    </div>
@endif
                @if(session()->has('success'))
    <div class="alert alert-primary text-secondary">
        {{ session()->get('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger text-secondary">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card col-12">
                    <div class="card-body">
                        <h4 class="card-title"> Cart</h4>
                        <div class="row ">
                            <div class="table-responsive">
                                <table id="cart" class="table  table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;

                                        @endphp
                                        @if (session('products'))
                                            @foreach (session('products') as $id => $details)
                                                @php
                                                    $total += $details['selling_price'] * $details['quantity']
                                                @endphp


                                                <tr class="" data-id="{{$id}}">

                                                    <td data-th="name" class="text-xs w-20 font-weight-bold mb-0 text-secondary">{{ $details['name'] }}</td>
                                                    <td data-th="quantity" class="w-50">
                                                        <div class="row">
                                                        <input type="number"
                                                            id="qty"
                                                            value="{{ $details['quantity'] }}"
                                                            class="update-cart quantity form-control "
                                                            min="1" max="{{ $details['qty'] }}" step="1">
                                                            </div>

                                                    </td>
                                                    <td data-th="price" class="text-xs w-10 font-weight-bold mb-0 text-secondary">
                                                        {{ $details['selling_price'] }}</td>
                                                    <td class="text-xs font-weight-bold mb-0 w-10 text-secondary">
                                                        {{ $details['quantity'] * $details['selling_price'] }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0  w-10 text-secondary">
                                                        <button
                                                            class="btn btn-tbl-delete btn-xs remove-from-cart"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right text-xs font-weight-bold mb-0 text-secondary">
                                                <h5><strong> Total {{ $total }} NGN</strong></h5>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                                <div class="d-grid gap-2">
                                <a name="" id="" class="btn btn-primary btn-sm w-lg-25  " href="{{route('shop.sell')}}" role="button">Sell</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h4 class="card-title">Shop</h4>
                            </div>
                            <div class="p-0">
                                <a href="" class="btn btn-link btn-sm bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Book Design</h6>
                                </a>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example3">
                                   <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Category</th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Selling Price</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Discounted Price</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Qty</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Size</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{ $product->name }}</td>
                                                <td class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{ $product->Category->name }}</td>

                                                <td class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{ $product->selling_price }}</td>
                                                <td class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{ $product->discounted_price }}</td>
                                                <td class="text-xs font-weight-bold mb-0 text-secondary">{{ $product->qty }}
                                                </td>
                                                <td class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{ $product->size }}</td>


                                                {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                                                {{-- <input type="number" name="qty" value="1" class="w-25"> --}}
                                                <td class="align-middle">
                                                    <form action="{{route('shop.addToCart',$product->id)}}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-success  border-0 font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Delete user">
                                                            <i class="fas fa-cart-plus fa-lg text-success"></i>add to cart
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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



  $("input[type='number']").inputSpinner({
        buttonsOnly:true,

    });


    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}
<script>
   const navItems = document.querySelectorAll('#sidenav-main .nav-item');

navItems.forEach((navItem) => {
    navItem.addEventListener('click', (e) => {
        e.stopPropagation();
    });

});

 $('.update-cart').change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                method: "patch",
                url: "{{route('shop.updateCart')}}",
                data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                success: function (response) {
                    // alert("hety");
                    window.location.reload();

                }
            });
        });
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("are you sure you want to remove?")) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route('shop.deleteCart') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        // console.log("delete");
                        window.location.reload();
                    }
                });
            }
        });



</script>



@endsection

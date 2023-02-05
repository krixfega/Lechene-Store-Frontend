@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->

        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">


                <h2>Order invioce</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('orders.index')}}">orders</a></li>
                      <li class="breadcrumb-item active" aria-current="page">order{{$order->order_no}}</li>
                    </ol>
                  </nav>


                <div class="col-12  col-lg-8 mt-10 mb-3 ">
                    <h4 class="">Seller Details</h4>
                    <table class="text-primary table-responsive">
                        <tr class="d-flex flex-wrap">
                            <td>Full Name:</td>
                            <td class="text-secondary">{{ $order->user->name }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Phone Number:</td>
                            <td class="text-secondary">{{ $order->user->phone }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Address:</td>
                            <td class="text-secondary">{{ $order->user->address }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Email:</td>
                            <td class="text-secondary">{{ $order->user->email }}</td>
                        </tr>
                        <tr class="d-flex flex-wrap">
                            <td>Gender:</td>
                            <td class="text-secondary">{{ $order->user->gender }}</td>
                        </tr>


                        <!-- All other fields -->
                    </table>
                </div>
                <div class="col-12  col-lg-4 mt-lg-10 mt-3 my-0">
                    <h4 class="pr-3 ">Product details</h4>

                    <table class="text-primary table-responsive">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-successs   py-2  pr-3 font-weight-bolder opacity-7">
                                    Name</th>



                                <th class="text-uppercase text-successs  text-center py-2  pr-3 font-weight-bolder opacity-7">
                                     Price</th>
                                <th class="text-uppercase text-successs  text-center py-2  pr-3 font-weight-bolder opacity-7">
                                    Qty</th>

                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($order->orderItems as $product)
                        <tr>
                            <td class=" font-weight-bold mb-0 m-3 text-sm py-2  pr-3 text-secondary">
                                {{ $product->name }}</td>


                            <td class=" font-weight-bold mb-0 m-3 text-sm text-center py-2  pr-3 text-secondary">
                               NGN{{ $product->price }}</td>


                            <td class=" font-weight-bold mb-0 m-3 text-sm text-center py-2  pr-3 text-secondary">
                                {{ $product->qty }} pcs</td>


                            {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                            {{-- <input type="number" name="qty" value="1" class="w-25"> --}}

                        </tr>
                        @empty
                            <h4>Empty Product</h4>
                        @endforelse
                        </tbody>
                        <tfoot>



                    </tfoot>

                    </table>
                    <h6 class='py-2 '>Total: NGN{{$order->total_selling_price}}</h6>
                </div>

            </div>

            <h5>Change Status</h5>
            <form action="{{route('orders.update.status',$order->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="status">Order Status </label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected':'' }}>Pending</option>
                    <option value="approved" {{ $order->status == 'approved' ? 'selected':'' }}>Approved</option>
                    <option value="rejected" {{ $order->status == 'rejected' ? 'selected':'' }}>Rejected</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                  <button type="submit" class="btn btn-primary">update</button>
            </form>
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

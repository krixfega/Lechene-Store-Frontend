@extends('user.layouts.app')

@section('content')
    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area" data-bg-color="#F1FAEE">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                            <h2 class="page-header-title">All Trending Products</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Cart Page</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Cart Area Wrapper ==-->
        <section class="cart-page-area section-space">
            <div class="container">
                @if($cart)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table-wrap">
                            <div class="cart-table table-responsive">

                                <table>
                                    <thead>
                                        <tr>
                                            <th class="width-thumbnail"></th>
                                            <th class="width-name">Product</th>
                                            <th class="width-price"> Prce</th>
                                            <th class="width-quantity">Quantity</th>
                                            <th class="width-subtotal">Subtotal</th>
                                            <th class="width-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp

                                        @forelse ($cart->cart_items as $prod)
                                            @php
                                                $itemTotal = $prod->prod->discounted_price * $prod->qty;
                                                $totalPrice += $itemTotal;
                                            @endphp
                                            <tr class="cart-item">
                                                <td class="product-thumbnail">
                                                    <a href="shop-single-product.html"><img class="w-100"
                                                            src="{{ asset('images/products/' . $prod->prod->productImages->first()->name) }}"
                                                            alt="Image" width="85" height="85"></a>
                                                </td>
                                                <td class="product-name">
                                                    <h5><a href="">{{ $prod->prod->name }}</a></h5>
                                                </td>
                                                <td class="product-price"><span
                                                        class="amount">&#8358;{{ $prod->prod->discounted_price }}</span>
                                                </td>
                                                <td class="cart-quality">
                                                    <div class="product-details-quality">
                                                        <div class="pro-qty" data-item-id="{{ $prod->id }}">
                                                            <input type="text" title="Quantity"
                                                                value="{{ $prod->qty }}" max="{{ $prod->prod->qty }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    <span>&#8358;{{ $prod->prod->discounted_price * $prod->qty }}</span>
                                                </td>
                                                <td>
                                                 <form action="{{route('cart.delete',$prod->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger  border-0 font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete cart">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                </td>

                                            </tr>
                                        @empty

                                            <h1>Empty</h1>
                                        @endforelse

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-btn continure-btn">
                                <a class="btn btn-link" href="{{ url('/') }}"><i class="fa fa-angle-left"></i> Back To Shop</a>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="grand-total-wrap mt-2 mt-lg-0">
                                    <div class="grand-total-content">

                                        <div class="grand-total">
                                            <h4>Total <span>&#8358;{{ $totalPrice }}</span></h4>
                                        </div>
                                    </div>
                                    <div class="grand-total-btn">
                                        <a class="btn btn-link" href="{{ route('cart.checkout')  }}">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                @else

                                 @endif
                <div class="row">
                    <div class="col-md-12 col-lg-8">

                    </div>


                </div>
            </div>
        </section>
        <!--== End Cart Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="news-letter-area section-bottom-space">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.jpg">
                    <div class="newsletter-content">
                        <h2 class="title">Connect with us | merier</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="newsletter-form">
                            <form>
                                <input type="email" class="form-control" placeholder="Email address">
                                <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End News Letter Area Wrapper ==-->

    </main>
@endsection

@section('scripts')
    <script>
        var proQty = $(".pro-qty");
        proQty.append('<div class= "dec qty-btn">-</div>');
        proQty.append('<div class="inc qty-btn">+</div>');
        $('.qty-btn').on('click', function(e) {
            e.preventDefault();

            var $button = $(this);
            var $proQty = $button.parent('.pro-qty');
            var oldValue = $proQty.find('input').val();
            var maxQty = parseInt($proQty.find('input').attr('max'));
            console.log(maxQty);
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
                if (newVal > maxQty) {
                    newVal = maxQty;
                }
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                    if (newVal > maxQty) {
                        newVal = maxQty;
                    }
                } else {
                    newVal = 1;
                }
            }

            // $proQty.find('input').val(newVal);
            $proQty.find('input').val(newVal);

            var itemId = $proQty.data('item-id');
            var route_url = "{{ route('cart.update') }}";
            $.ajax({
                url: route_url,
                method: 'PUT',
                data: {
                    item_id: itemId,
                    qty: newVal,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Update cart quantity
                        window.location.reload();
                        // Handle success response
                    } else {
                        // Handle failure response
                    }
                },

                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle error response
                    swal(errorThrown)
                }
            });
        });


    </script>
@endsection

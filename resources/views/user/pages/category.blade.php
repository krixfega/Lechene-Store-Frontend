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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">category</li>
                            </ol>
                            <h2 class="page-header-title">All {{ $category->name }} Products</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Showing 09 Results</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->


        <!--== Start Product Categories Area Wrapper ==-->
        <section class="product-categories-area section-top-space">
            <div class="container">
                <div class="row mb-n8">

                        <div class="col-12 col-md-12 col-lg-12 mb-8">
                            <!--== Start Product Categories Item ==-->
                            <a class="product-two-category-item" >
                                <img class="product-two-category-thumb" src="{{ asset('images/categories/' . $category->image) }}"
                                    width="40%" height="80" alt="Image-HasTech">
                                <h4 class="product-two-category-title">{{ $category->name }}</h4>
                            </a>
                            <!--== End Product Categories Item ==-->
                        </div>



                </div>
            </div>
        </section>
        <!--== End Product Categories Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="product-area section-space">
            <div class="container">
                <div class="row mb-n6 product-items-two">

                    @forelse ($categoryProd as  $prod)
                      <div class="col-sm-6 col-lg-4 col-xl-3 mb-6">
                        <!--== Start Product Item ==-->
                        <div class="product-item">
                            <a class="product-thumb" href="{{ route('product.show', $prod->id) }}">
                                <img src="{{ asset('images/products/' . $prod->productImages->first()->name) }}"
                                    width="300" height="200" alt="Image-HasTech">
                            </a>
                                   <span class="badges">{{$prod->Category->name}}</span>
                             <div class="product-action">
                                <a href="{{ route('product.show', $prod->id) }}"><button type="button" class="product-action-btn action-btn-quick-view"
                                   >
                                    <i class="fa fa-eye"></i>
                                </button>
                                </a>


                            </div>
                            <div class="product-info">
                                <h4 class="title"><a href="">{{ $prod->name }}</a></h4>
                                {{-- <div class="price">$650.00 <span class="price-old">$650.00</span></div> --}}
                                <div class="price">
                                    @if ($prod->discounted_price != null && $prod->discounted_price != 0)
                                        <span class="price">&#8358;{{ $prod->discounted_price }}</span>
                                        <span class="price-old">&#8358;{{ $prod->selling_price }}</span>
                                    @else
                                        <span class="price">&#8358;{{ $prod->selling_price }}</span>
                                    @endif
                                </div>

                                <button type="button" class="info-btn-wishlist add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                        <!--== End prPduct Item ==-->
                    </div>
                    @empty
                    no product
                    @endforelse


                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

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
         $(document).on('click', '.add-to-cart', function(e) {
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var productId = $(this).data('product-id');
    var quantity = 1;
        $.ajax({

            url: "/cart",
            method: "POST",
            data: {
            product_id: productId,
            quantity: quantity,
            _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (response) {
                if(response.info){
                alert(response.info);
                }else{
                    alert(response.success);
                };
                loadcart();
            },
            error: function(response) {
                alert(response.responseJSON.error);
            }
        })
    })
        </script>
@endsection




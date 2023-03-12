<
    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area" data-bg-color="#F1FAEE">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page-header-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                        <h2 class="page-header-title">All Trending Products</h2>
                    </div>
                </div>
                <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                    <h5 class="showing-pagination-results">Showing 09 Results</h5>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Shop Top Bar Area Wrapper ==-->
    <section class="shop-top-bar-area">
        <div class="container">
            <div class="shop-top-bar">
                <select class="select-shoing" name="price_order">


                    <option value="1">Price: low to high</option>
                    <option value="2">Price: high to low</option>
                </select>

                <div>
                    <select class="select-shoing" name="price_range">

                        <option value="0-5000">Pricing:0-5000</option>
                        <option value="5000-10000">Pricing:5000-10000</option>
                        <option value="10000-100000000000000000000000000000000000000000000000000000000000000">Pricing:10000+</option>
                    </select>
                </div>


            </div>
        </div>
        <h6 class="visually-hidden">Shop Top Bar Area</h6>
    </section>
    <!--== End Shop Top Bar Area Wrapper ==-->

    <!--== Start Product Categories Area Wrapper ==-->
    <section class="product-categories-area section-top-space">
        <div class="container">
            <div class="row mb-n8">
                @forelse ($category as $cate)
                    <div class="col-6 col-md-4 col-lg-2 mb-8">
                        <!--== Start Product Categories Item ==-->
                        <a class="product-two-category-item" href="#">
                            <img class="product-two-category-thumb" src="{{ asset('images/categories/' . $cate->image) }}"
                                width="80" height="80" alt="Image-HasTech">
                            <h4 class="product-two-category-title">{{ $cate->name }}</h4>
                        </a>
                        <!--== End Product Categories Item ==-->
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>
    <!--== End Product Categories Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area section-space">
        <div class="container">
            <div class="row mb-n6 product-items-two">

                @forelse ($products as  $prod)
                  <div class="col-sm-6 col-lg-4 col-xl-3 mb-6">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                        <a class="product-thumb" href="shop-single-product.html">
                            <img src="{{ asset('shop/images/shop/13.png') }}" width="300" height="286"
                                alt="Image-HasTech">
                        </a>
                        <span class="badges">New</span>
                        <div class="product-action">
                            <button type="button" class="product-action-btn action-btn-quick-view"
                                data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                <i class="fa fa-eye"></i>
                            </button>


                        </div>
                        <div class="product-info">
                            <h4 class="title"><a href="shop-single-product.html">{{ $prod->name }}</a></h4>
                            {{-- <div class="price">$650.00 <span class="price-old">$650.00</span></div> --}}
                            <div class="price">
                                @if ($prod->discounted_price != null && $prod->discounted_price != 0)
                                    <span class="new-price">${{ $prod->discounted_price }}</span>
                                    <span class="old-price">${{ $prod->selling_price }}</span>
                                @else
                                    <span class="new-price">${{ $prod->selling_price }}</span>
                                @endif
                            </div>

                            <button type="button" class="info-btn-wishlist" data-bs-toggle="modal"
                                data-bs-target="#action-WishlistModal">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                @empty

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


    <script>
        $(document).ready(function() {
            // Bind an event handler to the change event of the select elements
            $('.select-shoing').change(function() {
                // Get the selected values of all the select elements
                var values = {};
                $('select').each(function() {
                    var name = $(this).attr('name');
                    var value = $(this).val();
                    values[name] = value;
                });

                console.table(values);

                // Make the AJAX request
                var filter_url = '{{ route("user.shop.filter") }}';
                $.ajax({
                    url: filter_url,
                    type: 'GET',
                    data: values,
                    success: function(data) {
                        // Update the product items on the page
                        $('.main-content').html(data);
                        console.table(data);
                    },
                    error: function() {
                        alert('There was an error applying filters');
                    }
                });
            });
        });
    </script>

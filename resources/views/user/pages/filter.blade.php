
    <section class="product-area section-space">
        <div class="container">
            <div class="row mb-n6 product-items-two">

                @forelse ($products as  $prod)
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
                            <h4 class="title"><a href="{{ route('product.show',$prod->id) }}">{{ $prod->name }}</a></h4>
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

                @endforelse


            </div>
        </div>
    </section>

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
                        $('.product-area').html(data);
                        console.table(data);
                    },
                    error: function() {
                        alert('There was an error applying filters');
                    }
                });
            });
        });
    </script>

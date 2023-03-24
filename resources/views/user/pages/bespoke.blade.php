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
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">bespoke</li>
                            </ol>
                            <h2 class="page-header-title">All Styles</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Showing 16 Results</h5>
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
                                <img class="product-two-category-thumb" src="{{ asset('assets\img\curved-images\curved-6.jpg') }}"
                                    width="40%" height="80" alt="Image-HasTech">
                                <h4 class="product-two-category-title">Styles</h4>
                            </a>
                            <!--== End Product Categories Item ==-->
                        </div>



                </div>
            </div>
        </section>


        <section class="product-area section-space">
            <div class="container">
                <div class="row mb-n8">
                    @foreach ($bespoke as $prod)
                    <div class="col-sm-6 col-lg-4 mb-6 my-6">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-item-border">
                            @if ($prod->FibricImages->count() > 0)
                                <a class="product-thumb" href="{{ route('product.booking', $prod->id) }}">
                                    <img src="{{ asset('images/fibrics/' . $prod->FibricImages->first()->name) }}"
                                        width="300" height="286" alt="Image-HasTech">
                                </a>
                            @endif
                            <span class="badges">{{ $prod->typeOrColors }}</span>
                            <div class="product-action">
                                <a href="{{ route('product.booking', $prod->id) }}"><button type="button"
                                    class="product-action-btn action-btn-quick-view">
                                    <i class="fa fa-book"></i>
                                </button>
                            </a>
                            </div>
                            {{-- <div class="product-info">
                                <h4 class="title"><a href="#">{{ $prod->name }}</a></h4>
                                <div class="price">&#8358;{{ $prod->selling_price }} <span class="price-old"></span>
                                </div>
                                <a href="{{ route('product.booking', $prod->id) }}" type="button"
                                    class="info-btn-wishlist">
                                    <i class="fa fa-book"></i>
                                </a>
                            </div> --}}
                        </div>
                        <!--== End prPduct Item ==-->
                    </div>
                @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $bespoke->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    </main>

@endsection

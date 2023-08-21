@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Create Product</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('products.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Products</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-2 pt-2 pb-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                  <label for="name">Product Name</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                  @error('name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="products_categories_id">Category</label>
                                  <select class="form-control @error('products_categories_id') is-invalid @enderror" id="products_categories_id" name="products_categories_id" required>
                                    @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('products_categories_id')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>

                                <div class="form-group">
                                  <label for="cost_price">Cost Price</label>
                                  <input type="number" class="form-control @error('cost_price') is-invalid @enderror" id="cost_price" name="cost_price" required>
                                  @error('cost_price')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="selling_price">Selling Price</label>
                                  <input type="number" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price" required>
                                  @error('selling_price')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="discounted_price">Discounted Price</label>
                                  <input type="number" class="form-control @error('discounted_price') is-invalid @enderror" id="discounted_price" name="discounted_price">
                                  @error('discounted_price')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="details">Details</label>
                                  <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3"></textarea>
                                    @error('details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}" required>
                                    @error('qty')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  </div>

                                  <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" value="{{ old('size') }}" required>
                                    @error('size')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  </div>


                                  <label for="image"> Upload Product Images</label>
                                  <input  type="file" class="form-control @error('image') is-invalid @enderror"
                                   id="images" name="images[]" required multiple>
                                   {{-- <div id="images-container" class="row"></div> --}}

                                  @error('image')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror

                                </div>
                                      <button type="submit" class="btn btn-primary">Create Product</button>
                                    </form>


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
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>


@endsection

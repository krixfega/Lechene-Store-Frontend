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
                                <h6>Edit Fibric</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('fibrics.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Fabrics</h6>
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
                            <form action="{{ route('fibrics.update', $fibric->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $fibric->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type/colors">Type/Colors:</label>
                                    <input type="text" name="typeOrColors" class="form-control @error('typeOrColors') is-invalid @enderror" value="{{ old('typeOrColors') ?? $fibric->typeOrColors }}">
                                    @error('type/colors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                 <div class="form-group">
                                    <label for="category">category</label>
                                    <select class="form-control @error('category') is-invalid @enderror" id="category"
                                        name="category" required>
                                        <option value="male"  {{ $fibric->category == 'male' ? 'selected': '' }}>Male</option>
                                        <option value="female" {{ $fibric->category == 'female' ? 'selected': '' }}>Female</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity:</label>
                                    <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') ?? $fibric->qty }}">
                                    @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cost-price">Cost Price:</label>
                                    <input type="number" name="cost_price" class="form-control @error('cost_price') is-invalid @enderror" value="{{ old('cost_price') ?? $fibric->cost_price }}">
                                    @error('cost_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="selling_price">Selling Price:</label>
                                    <input type="number" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price') ?? $fibric->selling_price }}">
                                    @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="details">Details:</label>
                                    <textarea name="details" class="form-control @error('details') is-invalid @enderror">{{ old('details') ?? $fibric->details }}</textarea>
                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                        <label for="images">Images:</label>
                                        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" multiple>
                                        @error('images')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <br>
                                        @foreach($fibric->FibricImages as $image)
                                        <img src="{{ asset('images/fibrics/'.$image->name) }}" width="100">
                                        @endforeach
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>

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
    {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}


@endsection

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
                                <h6>Product Category Table</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('productsCategory.create') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Create</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example2">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name 
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Created</th>
                                            @if(Auth::user()->role == 'Admin')

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)


                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{asset('images/categories/'.$category->image)}}" class="avatar avatar-sm me-3"
                                                            alt="{{$category->name}} image">
                                                    </div>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$category->name}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>


                                            <td>
                                                <span class="text-secondary text-xs font-weight-bold">{{ date('Y-m-d', strtotime($category->created_at)) }}</span>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                            @if(Auth::user()->role == 'Admin')

                                            
                                            <td class="align-middle">
                                                <a href="{{route('productsCategory.edit',$category->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-pen"></i> Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{url('admin/productsCategory/'.$category->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger  border-0 font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                            @endif


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Fibrics Table</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('fibrics.create') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Create</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example3">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name 
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            color/type
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            qty
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Created</th>
                                            <th class="text-secondary opacity-7"></th>
                                            @if(Auth::user()->role == 'Admin')

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fibrics as $fibric)


                                        <tr>
                                            {{-- <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{asset('images/categories/'.$fibric->fibricImages->)}}" class="avatar avatar-sm me-3"
                                                            alt="{{$fibric->fibricIame}s->} image">
                                                    </div>

                                            </td> --}}
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$fibric->name}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$fibric->typeOrColors}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$fibric->qty}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$fibric->selling_price}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                                


                                            <td>
                                                <span class="text-secondary text-xs font-weight-bold">{{ date('Y-m-d', strtotime($fibric->created_at)) }}</span>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                           
                                            <td class="align-middle">
                                                <a href="{{route('fibrics.show',$fibric->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="View More">
                                                    <i class="fa fa-eye"></i>View
                                                </a>
                                            </td>
                                            @if(Auth::user()->role == 'Admin')

                                             <td class="align-middle">
                                                <a href="{{route('fibrics.edit',$fibric->id)}}" class="text-primary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-pen"></i> Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{url('admin/fibrics/'.$fibric->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger  border-0 font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                            @endif



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Products Table</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{route('products.create')}}" class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Create</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example4">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Category</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                               Qty</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Seliing Price</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Discounted Price</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                            @if(Auth::user()->role == 'Admin')

                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)


                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        {{-- <h6 class="mb-0 text-sm text-primary">John Michael</h6> --}}
                                                        <p class="text-xs font-weight-bold mb-0 text-secondary">

                                                            {{$product->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                    {{$product->Category->name}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                {{$product->qty}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                {{$product->selling_price}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                {{$product->discounted_price}}

                                                </p>
                                            </td>
                                            <td>
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('Y-m-d', strtotime($product->created_at)) }}

                                                </span>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                            
                                            <td class="align-middle">
                                                <a href="{{route('products.show',$product->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="View More">
                                                    <i class="fa fa-eye"></i>View
                                                </a>
                                            </td>
                                            @if(Auth::user()->role == 'Admin')
                                            
                                            <td class="align-middle">
                                                <a href="{{route('products.edit',$product->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit Product">
                                                    <i class="fa fa-pen"></i>Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger  border-0 font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                            @endif


                                        </tr>


                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@endsection

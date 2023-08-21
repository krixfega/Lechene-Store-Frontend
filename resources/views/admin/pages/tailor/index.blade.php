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
                                <h6>All Tailor Assigned Booking</h6>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                                      <li class="breadcrumb-item"><a href="{{route('shop.index')}}">All Tailors Booking/a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Assigned Tailors</li>
                                    </ol>
                                  </nav>
                            </div>
                            <div class="p-1">
                                <a href="{{route('tailor.index')}}" class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Assigned Tailors</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example4">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Booking No</th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                              Tailor Name
                                            </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                              Total Price </th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                               Paid</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                               Balance</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                            @if(Auth::user()->role == 'Admin')
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)


                                        <tr>
                                            <td>

                                                        <p class="text-xs font-weight-bold mb-0 text-secondary">

                                                            {{$data->booking->booking_no}}
                                                        </p>
                                            </td>
                                            <td>

                                                        <p class="text-xs font-weight-bold mb-0 text-secondary">

                                                            {{$data->user->name}}
                                                        </p>
                                            </td>


                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                NGN{{$data->total_price}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                NGN{{$data->paid_price}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                NGN{{$data->balance_price}}
                                                </p>
                                                {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                            </td>


                                            <td>
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ date('Y-m-d', strtotime($data->created_at)) }}

                                                </span>
                                            </td>
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}

                                            <td class="align-middle">
                                                <a href="{{route('tailor.show',$data->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="View More">
                                                    <i class="fa fa-eye"></i>View
                                                </a>
                                            </td>
                                            @if(Auth::user()->role == 'Admin')

                                            <td class="align-middle">
                                                <a href="{{route('tailor.edit',$data->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="download invioce">
                                                    <i class="fa fa-pen" aria-hidden="true"></i>Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{route('tailor.destroy',$data->id)}}" method="POST">
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
@endsection

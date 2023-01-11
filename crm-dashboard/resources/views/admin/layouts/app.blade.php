@include('admin.layouts.includes.head')
<body class="g-sidenav-show   bg-gray-100">
@include('admin.layouts.includes.header')
@yield('content')
@include('admin.layouts.includes.settings')

<script src="{{ asset('assets/js/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script src="https://releases.transloadit.com/uppy/v3.3.1/uppy.min.js"></script>

<script src="{{asset('assets/js/plugins/table/table_data.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/dropzone/dropzone.js')}}"></script>
@yield('script')
</body>
</html>

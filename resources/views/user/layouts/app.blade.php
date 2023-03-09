<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.layouts.includes.head')
<body>
<div class="wrapper">
@include('user.layouts.includes.header')
@yield('content')
</div>
@include('user.layouts.includes.footer')
<script>
loadcart();

function loadcart() {
    

var load_url = "{{ route('cart.count') }}";
$.ajax({
    method: "GET",
    url: load_url,
    success: function (response) {
    //   console.log(response.count);
    $('#cart-count').html('');
    $('#cart-count').html(response.count);
    }
});
}
</script>
@yield('scripts')
</body>
</html>

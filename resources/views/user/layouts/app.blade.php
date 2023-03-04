<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.layouts.includes.head')
<div class="wrapper">
@include('user.layouts.includes.header')
@yield('content')
</div>
@include('user.layouts.includes.footer')

@yield('scripts')

</html>

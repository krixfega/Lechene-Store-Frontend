<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.layouts.includes.head')
{{-- @include('user.layouts.includes.header') --}}
@yield('content')
@include('user.layouts.includes.footer')
@yield('scripts')

</html>

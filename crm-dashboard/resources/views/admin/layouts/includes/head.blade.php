<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css') }}" rel='stylesheet'/>
    <link href="{{asset('assets/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
   
    {{-- <link  href="assets/css/style.css?v=2.0.4" rel="stylesheet" /> --}}
    <link id="pagestyle" rel="stylesheet" href="{{asset('assets/css/style.css?v=2.0.4')}}">
<link href="{{ asset('assets/js/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"  >
<!-- Include Dropzone.js CSS and js-->
<link href="{{asset('assets/js/plugins/dropzone/dropzone.css')}}" rel="stylesheet">


</head>

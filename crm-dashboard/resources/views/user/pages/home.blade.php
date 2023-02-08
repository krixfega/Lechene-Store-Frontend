@extends('user.layouts.app')

@section('content')

    <body class="loaded">

        <div class="bgimg">
            <div class="topleft">
                <img src="{{ asset('assets/img/Le_chene.png') }}" alt="logo" srcset="" class="w-25">
            </div>
            <div class="middle">
                <h1 class="text-bold">COMING SOON</h1>
                <h5 style="color:black;" class="text-bold">Lecheene Store Comming soon</h5>
                <hr>
                @auth
                <a href="{{ route('logout') }}" class="btn-primary btn"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            
                @endauth
            </div>
            <div class="bottomleft">
                <p>Some text</p>
            </div>
        </div>
    </body>
@endsection
@section('script')
    <script></script>
@endsection

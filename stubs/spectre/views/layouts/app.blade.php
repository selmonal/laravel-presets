<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="top-nav py-2 bg-gray mb-4">
            <div class="container grid-xl">
                <div class="navbar">
                    <section class="navbar-section">
                        <a href="/">
                            <h5>{{ config('app.name') }}</h5>
                        </a>
                    </section>
                    <section class="navbar-section">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                        @else
                            <div class="dropdown">
                                <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                                    {{ Auth::user()->name }} <span class="icon icon-arrow-down"></span>
                                </a>
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </section>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

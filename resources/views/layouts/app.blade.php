<?php $route = \Route::currentRouteName(); ?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Panel
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::guest())
                @else
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="{{ (preg_match('/^(home.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/home') }}">Home <span class="sr-only">(current)</span></a></li>
                    <!--    <li class="{{ (preg_match('/^(promotion.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/promotion') }}">Promotion</a></li>
                        <li class="{{ (preg_match('/^(blog.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/blog') }}">Blog </a></li> -->
                        <li class="{{ (preg_match('/^(contact.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/contact') }}">Contact </a></li>
                        <li class="{{ (preg_match('/^(category.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/category') }}">Category </a></li>
                        <li class="{{ (preg_match('/^(type.).*/', $route))? 'active':'' }}"><a href="{{ url('/admin/type') }}">Type </a></li>
                    </ul>
                  @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
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
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

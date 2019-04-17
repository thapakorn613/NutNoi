<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NUTNOI</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
</head>
<body>
    <div id="app">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                <a>
                        <img src="images/logo.png" width="120" height="90" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            @guest
                            <li class="active">
                                <a href="#home">Home</a>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            

                        @else

                            @if (Auth::user()->type != "admin" && Auth::user()->project_id != NULL && Auth::user()->haveWaitTable != NULL )
                            <li class="nav-item">
                                <a class="nav-link" href='/home/table' >{{ __('ShowTable') }}</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('UserController@profile') }}" >{{ __('Profile') }}</a>
                            </li>
                            @if (Auth::user()->type == "admin")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('AdminController@admin') }}" >{{ __('Manager') }}</a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('UserController@showproject') }}" >{{ __('show') }}</a>
                            </li>
                            @if (Auth::user()->type != "admin")
                                @if (Auth::user()->haveWaitTable != NULL && Auth::user()->project_id != NULL)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ action('UserController@addproject') }}" >{{ __('Add Project') }}</a>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>   
    </div> 
    <div class="triangle"></div>
    <main class="py-4">
       @yield('content')
    </main>
</body>
</html>

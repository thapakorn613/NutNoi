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
                                <a href="/home">Home</a>
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
                            @if (Auth::user()->type != "admin")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('UserController@profile') }}" >{{ __('Profile') }}</a>
                                </li>
                            @else 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('AdminController@admin') }}" >{{ __('Manager') }}</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('UserController@showproject') }}" >{{ __('show') }}</a>
                            </li>
                            @if (Auth::user()->type != "admin")
                                @if (Auth::user()->haveWaitTable != NULL && Auth::user()->project_id == NULL)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ action('UserController@addproject') }}" >{{ __('Add Project') }}</a>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item dropdown">
                                @if (Auth::user()->type != "admin")
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ action('UserController@profile') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @else <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @endif 
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
       
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ข้อมูลโปรเจคคร่าวๆของ {{$users->name}}</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped ">
                        <tr> 
                        <th>Project ID</th>
                        <th>Name Project</th>
                        <tr>
                        <td>{{$users->project_id}}</td>
                        <td>{{$project->project_name}}</td>
                        </tr>
                    </table>  
                    @if ( $users->booking == NULL && $waitTable->status_confirm == NULL)
                        @if ($waitTable->status_submit == NULL )
                            <a class="btn btn-danger"  href="#" >+++++++++++++++++++++++++++++ ตอนนี้คุณยังไม่ได้ Submit +++++++++++++++++++++++++++++</a>
                        @else
                            <a class="btn btn-success" href="#" >+++++++++++++ ตอนนี้คุณได้ทำการ Submit เรียบร้อยเเล้ว กรุณารอการยืนยันจาก Admin +++++++++++++</a>
                        @endif
                        <table class="table table-bordered table-striped">
                            <td>Order</td>
                            <th>Booking ID</th>
                            <td>Time</td>
                            <td>Move</td>
                            <tr>
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id)
                                    @if ($waitTable->booking_id1 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 1</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="#" >up</a>
                                        <a class="btn btn-warning" href="#" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID1')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                    @if ($waitTable->booking_id2 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 2</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="#" >up</a>
                                        <a class="btn btn-warning" href="#" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID2')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                    @if ($waitTable->booking_id3 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 3</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="#" >up</a>
                                        <a class="btn btn-warning" href="#" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID3')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                @endif
                                </tr>
                            @endfor
                        </table>
                        <table class="table table-bordered table-hover">
                            <td>You can comfirm to submit</td>
                            <td><a class="btn btn-success" href="{{ action('UserController@submitted',$users->project_id)}}" >SUBMIT</a></td>   
                        </table>
                    @else
                        <table class="table table-bordered table-hover">
                        <tr>
                        <td><a class="btn btn-success" href="#" >+++++++++++++++ ตอนนี้ Admin ได้ยืนยันการจองเวลาของคุณเเล้ว คุณได้เวลาตั้งนี้ ++++++++++++++</a></td>
                        </tr>
                        </table>
                        <table class="table table-bordered table-striped">
                        <tr>
                        <td>Booking ID</td><td>DateTime</td>
                        </tr>
                        <tr>
                        <td>{{$users->booking_id}}</td>
                        <td>{{$timeUser->datetime}}</td>
                        </tr>
                        </table>
                        
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">Select your time for examination</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Booking ID</th>
                        <th>Date Time</th>
                        <th>Add</th>
                        <tr>
                        @if ($users->haveWaitTable == NULL)
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id  )
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a href="{{ action('UserController@setBooking',$timebookingTable[$i]->booking_id)}}" class="btn btn-danger">Add</a></td>
                                @endif
                                </tr>
                            @endfor
                        @else
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id && $timebookingTable[$i]->booking_id != $waitTable->booking_id1 && $timebookingTable[$i]->booking_id!= $waitTable->booking_id2&& $timebookingTable[$i]->booking_id!= $waitTable->booking_id3)
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a href="{{ action('UserController@setBooking',$timebookingTable[$i]->booking_id)}}" class="btn btn-danger">Add</a></td>
                                @endif
                                </tr>
                            @endfor
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    </main>
</body>
</html>



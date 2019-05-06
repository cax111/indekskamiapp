<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Aplikasi Indeks KAMI</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <!-- Bootstrap core CSS     -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{ URL::asset('css/animate.min.css') }}" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="{{ URL::asset('css/paper-dashboard.css') }}" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="{{ URL::asset('css/demo.css') }}" rel="stylesheet" />


        <!--  Fonts and icons     -->
        <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="{{ URL::asset('css/themify-icons.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="primary">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Aplikasi Indeks KAMI
                        </a>
                    </div>
                    <ul class="nav">
                        @if($_SERVER['PHP_SELF']=="/index.php")
                          <li class="active">
                        @else
                          <li>
                        @endif
                            <a href="/">
                                <i class="ti-panel"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        @if(Auth::user()->role == "assessor")
                          @if(isset($get))
                            @if($_SERVER['PHP_SELF']=="/index.php/tampil-detail-hasil-assessment/$get")
                                <li class="active">
                            @else
                              <li>
                            @endif
                          @else
                            @if($_SERVER['PHP_SELF']=="/index.php/tampil-hasil-assessment")
                                <li class="active">
                            @else
                              <li>
                            @endif
                          @endif
                            <a href="/tampil-hasil-assessment">
                              <i class="ti-user"></i>
                              <p>Tampil Hasil Assessment</p>
                            </a>
                          </li>
                        @endif
                        @if($_SERVER['PHP_SELF']=="/index.php/tampil-user" || $_SERVER['PHP_SELF']=="/index.php/tambah-user" || $_SERVER['PHP_SELF']=="/index.php/ubah-user")
                          <li class="active">
                        @else
                          <li>
                        @endif
                        @if(Auth::user()->role != "user")
                            <a href="/tampil-user">
                              <i class="ti-user"></i>
                              <p>Kelola User</p>
                            </a>
                          </li>
                        @endif
                        @if(Auth::user()->role == "admin")
                            @if($_SERVER['PHP_SELF']=="/index.php/tampil-variable")
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="/tampil-variable">
                                    <i class="ti-user"></i>
                                    <p>Tampil Variable</p>
                                </a>
                            </li>
                        @endif
                        @if($_SERVER['PHP_SELF']=="/index.php/identitas-user")
                          <li class="active">
                        @else
                          <li>
                        @endif
                            <a href="/identitas-user">
                                <i class="ti-user"></i>
                                <p>Identitas User</p>
                            </a>
                          </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Indeks KAMI</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-panel"></i>
                                        <p>Stats</p>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="#">
                                        <i class="ti-bell"></i>
                                        <p class="notification">0</p>
                                        <p>Notifikasi</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="ti-user"></i>
                                            <!-- <p class="notification">5</p> -->
                                            <p>Hi {{(Auth::user()->username)}} Akun</p>
                                            <b class="caret"></b>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Ubah Profil</a></li>
                                        <li><a href="/logout">Keluar</a></li>
                                      </ul>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        <i class="ti-settings"></i>
                                        <p>Settings</p>
                                    </a>
                                </li> -->
                            </ul>

                        </div>
                    </div>
                </nav>

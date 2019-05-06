<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Aplikasi Indeks KAMI</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo e(URL::asset('css/animate.min.css')); ?>" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="<?php echo e(URL::asset('css/paper-dashboard.css')); ?>" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo e(URL::asset('css/demo.css')); ?>" rel="stylesheet" />


        <!--  Fonts and icons     -->
        <link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo e(URL::asset('css/themify-icons.css')); ?>" rel="stylesheet">

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
                        <?php if($_SERVER['PHP_SELF']=="/index.php/"): ?>
                        <li class="active">
                        <?php else: ?>
                        <li>
                        <?php endif; ?>
                            <a href="/">
                                <i class="ti-panel"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <?php if($_SERVER['PHP_SELF']=="/index.php/tampil-user" || $_SERVER['PHP_SELF']=="/index.php/tambah-user" || $_SERVER['PHP_SELF']=="/index.php/ubah-user"): ?>
                        <li class="active">
                        <?php else: ?>
                        <li>
                        <?php endif; ?>
                            <?php if(Auth::user()->role != "user"): ?>
                            <a href="/tampil-user">
                                <i class="ti-user"></i>
                                <p>Kelola User</p>
                            </a>
                            <?php endif; ?>
                        </li>
                        <?php if(Auth::user()->role == "admin"): ?>
                            <?php if($_SERVER['PHP_SELF']=="/index.php/tampil-variable"): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="/tampil-variable">
                                    <i class="ti-user"></i>
                                    <p>Tampil Variable</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($_SERVER['PHP_SELF']=="/index.php/identitas-user"): ?>
                        <li class="active">
                        <?php else: ?>
                        <li>
                        <?php endif; ?>
                            <a href="/identitas-user">
                                <i class="ti-user"></i>
                                <p>Identitas User</p>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="table.html">
                                <i class="ti-view-list-alt"></i>
                                <p>Table List</p>
                            </a>
                        </li>
                        <li>
                            <a href="typography.html">
                                <i class="ti-text"></i>
                                <p>Typography</p>
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i class="ti-pencil-alt2"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li>
                            <a href="maps.html">
                                <i class="ti-map"></i>
                                <p>Maps</p>
                            </a>
                        </li>
                        <li>
                            <a href="notifications.html">
                                <i class="ti-bell"></i>
                                <p>Notifications</p>
                            </a>
                        </li> -->
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
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="ti-bell"></i>
                                            <p class="notification">2</p>
                                            <p>Notifikasi</p>
                                            <b class="caret"></b>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                      </ul>
                                </li>
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="ti-bell"></i>
                                            <!-- <p class="notification">5</p> -->
                                            <p>Hi <?php echo e((Auth::user()->username)); ?> Akun</p>
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
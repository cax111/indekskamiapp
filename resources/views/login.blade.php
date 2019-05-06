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

    </head>
    <body>
		<div style="padding-top:150px" class="content">
		    <div class="container">
		    	<div class="col-sm-6 col-sm-offset-3">
			    	<div class="card">
				        <div class="row">
				            <div class="header">
				                <h3 class="title"><i class="icon-default ti-write"> </i>Aplikasi Indeks <strong>KAMI</strong></h3>
				                <hr style="margin-bottom:0"/>
				            </div>
				        </div>
				        <div style="padding-top:0" class="content">
					        <div class="row">
					            <div class="col-md-12">
							        <h3><i class="icon-default ti-key"> </i>Form Login</h3>
							        <p>Silakan isi Username dan Password untuk mengakses aplikasi ini.</p>
								    <form method="post" action="">
								    	{{ csrf_field() }}
				                    	<div class="form-group">
				                    		<label>Username</label>
								            <input type="text" name="username" placeholder="Isi username disini..." class="form-control border-input">
								        	<p class="label label-danger">{{ $errors->first('username') }}</p>
								        </div>
								        <div class="form-group">
					                    	<label>Password</label>
								            <input type="password" name="password" placeholder="Isi password disini..." class="form-control border-input">
	                            			<p class="label label-danger">{{ $errors->first('password') }}</p>
								        </div>
								        <button type="submit" class="btn btn-success">Login</button>
								    </form>
					            </div>
					        </div>
					    </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                            	<div class="col-md-12">
	                            	<p class="label label-danger">{{ $errors->first('gagalLogin') }}</p>
								</div>
                            </div>
                        </div>
				    </div>
				</div>
@include('templates.footer')
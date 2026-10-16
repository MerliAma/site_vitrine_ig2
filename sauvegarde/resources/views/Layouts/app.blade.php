<!doctype html>
<html lang="fr" class="fullscreen-bg"> <!--{{ str_replace('_', '-', app()->getLocale()) }}-->
<head>
    
	<title>Espace Administrateur | Login</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/css/main.css')}}">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
                            <style> /*#img{width:30%; margin-top:-40px; margin-bottom:-40px;} .navbar-form{margin-left:-165px;} .navbar-btn{margin-left:-200px;}*/ 
                                .brand{ color:#3cd80d; font-size:30px;} .brand span{ color:#4c504b;}
                            </style>
                            <div class="brand">
                                <span>INTER-</span>GROUPE
                            </div>
								<p class="lead">{{$titre}}</p>
							</div>
                            @yield('content')
							
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Espace Administrateur</h1>
							<p>by Inter-Groupe</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>

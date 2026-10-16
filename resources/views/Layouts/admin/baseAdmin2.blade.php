<!DOCTYPE html>
<html lang="fr">

<head>
	<title>IG-Espace Administrateur | {{$title}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project 
	<link rel="stylesheet" href="{{asset('template/css/demo.css')}}">-->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">

	<!--SWEET ALERT
	<script src="{{asset('sweetAlert/sweetalert.min.js')}}"> </script>-->
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<style> /*#img{width:30%; margin-top:-40px; margin-bottom:-40px;} .navbar-form{margin-left:-165px;} .navbar-btn{margin-left:-200px;}*/ 
				.brand{ color:#3cd80d; font-size:30px;} .brand span{ color:#4c504b;}
			</style>
			<div class="brand">
				<span>INTER-</span>GROUPE
			</div>
		</nav>
		<!-- END NAVBAR -->
        
        <!--MAIN-->
        @yield('contenu')
        <!--END MAIN-->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	
</body>

</html>

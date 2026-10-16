<!doctype html>
<html lang="fr" class="fullscreen-bg">
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

	<!-- GOOGLE FONTS : DM Sans & Inter (DEC-007) -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- SYSTÈME DE DESIGN INTER-GROUPE -->
	<link rel="stylesheet" href="{{asset('css/design-system.css')}}">

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
				<div class="auth-box">
					<div class="left">
						<div class="content">
							<div class="header text-center">
								<div class="brand ig-brand mb-2">
									<span>INTER-</span>GROUPE
								</div>
								<p class="lead" style="font-family: var(--ig-font-heading); font-weight: 600; color: var(--ig-secondary, #1A3A6B);">{{$titre}}</p>
							</div>
                            @yield('content')
						</div>
					</div>
					<div class="right" style="background-color: var(--ig-secondary, #1A3A6B);">
						<div class="overlay" style="background: linear-gradient(135deg, rgba(10, 110, 63, 0.85) 0%, rgba(26, 58, 107, 0.92) 100%);"></div>
						<div class="content text">
							<h1 class="heading" style="font-family: var(--ig-font-heading); font-weight: 700;">Espace Administrateur</h1>
							<p style="font-size: 1rem; opacity: 0.9;">Cabinet d'Ingénierie &amp; Formation INTER-GROUPE</p>
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

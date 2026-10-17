<!doctype html>
<html lang="fr" class="fullscreen-bg">
<head>
	<title>{{ !empty($titre) ? $titre . ' | ' : '' }}Espace Administrateur &bull; INTER-GROUPE</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<!-- SYSTÈME DE DESIGN INTER-GROUPE (LOT 2 & 5) -->
	<link rel="stylesheet" href="{{asset('css/design-system.css')}}">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">
</head>
<body>
    <!-- Lien d'évitement accessible (WCAG 2.4.1) -->
    <a href="#auth-box" class="skip-link">Aller au formulaire</a>

    <!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box" id="auth-box">
					<div class="left">
						<div class="content">
							<div class="header text-center">
								<a href="{{ route('accueil') }}" class="brand ig-brand mb-2" title="Retour au site public INTER-GROUPE">
									<span>INTER-</span>GROUPE
								</a>
								<h1 class="lead">{{ $titre ?? 'Espace d\'Authentification' }}</h1>
								@if(!empty($sousTitre))
									<p class="auth-desc">{{ $sousTitre }}</p>
								@endif
							</div>
                            @yield('content')
						</div>
					</div>
					<div class="right" style="background-color: var(--ig-secondary, #1A3A6B);">
						<div class="overlay" style="background: linear-gradient(135deg, rgba(10, 110, 63, 0.88) 0%, rgba(26, 58, 107, 0.94) 100%);"></div>
						<div class="content text text-center p-4">
							<div class="mb-3">
								<span class="badge badge-light px-3 py-2 text-uppercase font-weight-bold" style="letter-spacing: 0.08em; font-size: 0.75rem; color: var(--ig-primary, #0A6E3F);">
									Portail Sécurisé
								</span>
							</div>
							<h2 class="heading" style="font-family: var(--ig-font-heading); font-weight: 700; font-size: 1.6rem; color: #FFFFFF; margin-bottom: 0.75rem;">
								Espace Administrateur
							</h2>
							<p style="font-size: 0.95rem; opacity: 0.92; line-height: 1.6; max-width: 380px; margin: 0 auto; color: #FFFFFF;">
								Cabinet d'Ingénierie Informatique &amp; Formation Continue agréé FDFP N° 0039 &bull; Treichville, Abidjan.
							</p>
							<div class="mt-4 pt-3 border-top" style="border-color: rgba(255, 255, 255, 0.2) !important;">
								<a href="{{ route('accueil') }}" class="btn btn-sm btn-outline-light" style="border-radius: 9999px; padding: 0.35rem 1rem;">
									<i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour au site public
								</a>
							</div>
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

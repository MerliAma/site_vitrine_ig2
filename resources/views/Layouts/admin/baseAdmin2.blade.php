<!DOCTYPE html>
<html lang="fr">

<head>
	<title>IG-Espace Administrateur | {{$title ?? 'Administration'}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/css/main.css')}}">
	<!-- GOOGLE FONTS : DM Sans & Inter (DEC-007) -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">

	<!-- SYSTÈME DE DESIGN INTER-GROUPE -->
	<link rel="stylesheet" href="{{asset('css/design-system.css')}}">
</head>

<body class="layout-fullwidth no-sidebar">
	<!-- Lien d'évitement accessible (WCAG 2.4.1) -->
	<a href="#admin-main" class="skip-link">Aller au contenu principal</a>

	<!-- WRAPPER -->
	<div id="wrapper" class="no-sidebar">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<div class="brand">
				<a href="{{route('accueilAd')}}" class="ig-brand" title="INTER-GROUPE Administration">
					<span>INTER-</span>GROUPE
				</a>
			</div>
			<div class="container-fluid barre">
				<div class="navbar-btn navbar-btn-right">
					<a href="{{ route('accueilAd') }}" class="btn btn-sm btn-default" style="margin-top: 14px; margin-right: 15px; border-radius: var(--ig-radius-md, 8px);">
						<i class="fa fa-arrow-left"></i> Retour au Tableau de bord
					</a>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
        
        <!--MAIN-->
        <main id="admin-main" style="padding-top: 80px; min-height: calc(100vh - 120px);">
            @yield('contenu')
        </main>
        <!--END MAIN-->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright mb-0">&copy; {{ date('Y') }} <strong>INTER-GROUPE</strong> — Espace Administration. Tous droits réservés.</p>
				<div class="footer-extra">
					<i class="fa fa-graduation-cap text-success"></i>
					<span>Cabinet d'Ingénierie & Formation Professionnelle &bull; Treichville, Abidjan</span>
				</div>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

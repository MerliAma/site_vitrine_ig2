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
<body class="auth-page-body">
    <!-- Lien d'évitement accessible (WCAG 2.4.1) -->
    <a href="#auth-card" class="skip-link">Aller au formulaire</a>

    <!-- WRAPPER CENTRÉ MODERNE & PROFESSIONNEL -->
    <div class="auth-page-wrapper">
        <div class="auth-card" id="auth-card">
            <!-- En-tête de la carte -->
            <div class="auth-header">
                <a href="{{ route('accueil') }}" class="auth-brand" title="Retour au site public INTER-GROUPE">
                    <span class="auth-brand-green">INTER-</span><span class="auth-brand-navy">GROUPE</span>
                </a>
                <div>
                    <span class="auth-badge">
                        <i class="fa fa-shield" aria-hidden="true"></i> Portail Back-Office Sécurisé
                    </span>
                </div>
                <h1 class="auth-title">{{ $titre ?? 'Espace d\'Authentification' }}</h1>
                @if(!empty($sousTitre))
                    <p class="auth-subtitle">{{ $sousTitre }}</p>
                @endif
            </div>

            <!-- Corps du formulaire -->
            <div class="auth-body">
                @yield('content')
            </div>

            <!-- Pied institutionnel discret -->
            <div class="auth-card-footer">
                Cabinet d'Ingénierie &amp; Formation Continue &bull; Agréé FDFP N° 0039 &bull; Treichville, Abidjan
            </div>
        </div>
    </div>
</body>
</html>

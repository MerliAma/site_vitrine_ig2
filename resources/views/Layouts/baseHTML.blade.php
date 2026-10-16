<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="INTER-GROUPE, cabinet d'ingénierie informatique et de formation professionnelle agréé FDFP à Treichville, Abidjan, Côte d'Ivoire.">
    <link rel="shortcut icon" href="{{asset('img/2.png')}}">
    <title>Inter-Groupe | {{$title ?? 'Cabinet d\'ingénierie informatique & formation'}}</title>

    <!-- Google Fonts : DM Sans (Titres) & Inter (Corps de texte) - Conforme DEC-007 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.x (Framework CSS obligatoire) -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" />

    <!-- Icônes : Font Awesome & Ionicons -->
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('ionicons-2.0.1/css/ionicons.css')}}" />

    <!-- Système de Design INTER-GROUPE (Tokens & Composants partagés) -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/design-system.css')}}" />

    <!-- Feuille de style publique (Mise en page des vues) -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

    <!-- Scripts JavaScript -->
    <script src="{{asset('jquery-3.4.1.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fontawesome/js/fontawesome.min.js')}}"></script>
</head>

<body>
    <div id="contenu">
        @include('Layouts/header')
        <main id="main-content" class="container-fluid px-3 px-md-4 py-2">
            <div class="row">
                @yield('corps')
                @include('Layouts/infosDroit')
            </div>
        </main>
        @include('Layouts/footer')
    </div>
</body>
</html>
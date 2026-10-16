<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/2.png')}}">
    <title>Inter-Groupe | {{$title}}</title>

    <!--CSS links-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

    <!--jquery links-->
    <script src="{{asset('jquery-3.4.1.js')}}" > </script>

    <!--bootstrap links-->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" />
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" > </script>

    <!--liens d'icones-->
    <!--<link rel="stylesheet" type="text/css" href="{{asset('css/ionicons.min.css')}}" />-->
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('ionicons-2.0.1/css/ionicons.css')}}" />
    
    <script src="{{asset('fontawesome/js/fontawesome.min.js')}}" > </script>
    
    <!--<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">-->
</head>


<body>
    <div id="contenu"> <!--page au-dessus-->
        @include('Layouts/header') <!--page pour le header commun-->
        <div class="container">
            <div class="row">
                @yield('corps') <!--section pour le contenu de la page--> @include('Layouts/infosDroit')
            </div>
        </div>
        <br/>
        <br/>    
        @include('Layouts/footer') <!--page pour le footer commun-->
    </div>
</body>
</html>
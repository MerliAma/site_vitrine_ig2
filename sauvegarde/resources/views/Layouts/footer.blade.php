<!--<footer class="container">-->
<div class="container">
    <footer class="row foot1">
        <ul class="col menubas">
        @if(isset($idEnt))
            <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=Ac')}}">  Accueil</a></li>
            <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=present')}}">  Présentation</a></li>
            <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=domF')}}">  Formations</a></li>
            <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=dev')}}">  Développement</a></li>
            <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=cont')}}">  Contact</a></li>  <!--<i class="ion-ios-arrow-right"></i>-->
        @else
            <li><a href="{{route('accueil')}}">  Accueil</a></li>
            <li><a href="{{route('presentation')}}">  Présentation</a></li>
            <li><a href="{{route('formation')}}">  Formations</a></li>
            <li><a href="{{route('developpement')}}">  Développement</a></li>
            <li><a href="{{route('contact')}}">  Contact</a></li>  <!--<i class="ion-ios-arrow-right"></i>-->
        @endif
        </ul>
        <ul class="col">
            <li>  Phone : (+225) 21-24-72-02</li>
            <li> Adresse: 08 BP 1697 Abj 08</li>
            <li>  Mobile : (+225) 21-24-60-13</li>
            <li>  Email : <a href="mailto:intergroupeci@gmail.com" color="green">intergroupeci@gmail.com</a></li>
            <li>  Siège : Treichville, Abidjan - Côte d'Ivoire</li>
        </ul>
    </footer>
</div>
<div class="container">
    <footer class=" row foot2">
        <p class="col"> Copyright © 2015 by Inter-Groupe. All rights reserved.</p>
        <ul class="col">
            <li><a href="https://fr-fr.facebook.com/"><i class="ion-social-facebook"></i></a></li>
            <li><a href="https://twitter.com/login?lang=fr"><i class="ion-social-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/?hl=fr"><i class="ion-social-instagram"></i></a></li>
        </ul>
    </footer>
</div>
<!--</footer>-->
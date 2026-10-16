@extends('Layouts/baseHTML',['title'=>'Espace FDFP'])

@section('menu')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('presentation')}}">Présentation</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('formation')}}">Domaines de Formations</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('developpement')}}">Développement</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
    </li>
@endsection

@section('corps')
<!--espace fdfp-->
    <div class="col-8">
        <h2 class="titreCadre"> Présentation du FDFP </h2> <br/> <!-- class utilisée dans sur la page "developpement" -->
        <p>
            Depuis 1991, à la faveur de la mise en œuvre du Programme de Valorisation des Ressources Humaines (PVRH),
            par le gouvernement ivoirien, la Côte d'Ivoire s'est dotée d'un dispositif de formation professionnelle 
            des plus performants. Au centre de ce dispositif, se trouve le FDFP (Fonds de Développement de la 
            Formation Professionnelle).
        </p>
        <div class="row">
            <div class="col">
                <img src="{{asset('img\FDFP3.jpg')}}" class="fdfpImg" />
            </div>

            <div class="col">
                <p> 
                    Véritable structure de conception, d'organisation et de gestion de la formation professionnelle, 
                    le FDFP oriente, impulse et met en œuvre la politique de formation professionnelle continue et 
                    l'Apprentissage en Côte d'Ivoire. Il gère :
                    <ul type="sqare">
                        <li>la Taxe d'Apprentissage (0,4% de la masse salariale), </li>
                        <li>la Taxe Additionnelle à la Formation Professionnelle Continue (1,2%), </li>
                    </ul>
                </p>
            </div>
        </div>
        <p>
            ainsi que tout autre fonds dédié à la formation professionnelle mise à sa disposition. 
            Ses missions portent sur le financement, le contrôle et l'évaluation des plans et projets de formation. 
            Ainsi, est prise en compte, la formation des salariés d'entreprises, des artisans et des autres 
            composantes de la population active dites "non cotisantes".
        </p>

        <br/>

        <h4 class="sousTitreF"> Le FDFP exécute des missions d'information, d'appui et de conseil auprès de l'ensemble de ses clients.</h4>
        <p> 
            Grace à son organisation et aux partenaires techniques qu'il mobilise, le FDFP assure :
            <ul type="disc">
                <li> La formation des nouveaux embauchés (l'intégration) </li>
                <li> L'amélioration des acquis des stagiaires dans les spécialités qui sont les leurs (Le Perfectionnement)</li>
                <li>La formation permettant l'accès du travailleur à une position plus avantageuse (La promotion) </li>
                <li> La formation en vue d'un changement d'activité professionnelle (La reconversion) </li>
            </ul>
        </p>
        <p> 
            Véritable structure de conception, d'organisation et de gestion de la formation professionnelle, 
            le FDFP oriente, impulse et met en œuvre la politique de formation professionnelle continue et 
            l'Apprentissage en Côte d'Ivoire. Il gère :
            <ol type="1">
                <li>Être à jour de ses cotisations ou taxe à la charge de l’employeur, </li>
                <li>Retirer un plan au FDFP (situé en face de IVOSEP), </li>
                <li>Fournir tous les renseignements à mettre sur le plan de formation, </li>
                <li>Choisir un ou plusieurs modules de formation figurant dans le catalogue à télécharger au besoin, </li>
            </ul>
        </p>
    </div>
<!--end espace fdfp-->
@endsection
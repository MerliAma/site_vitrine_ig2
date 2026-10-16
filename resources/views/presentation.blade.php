@extends('Layouts/baseHTML',['title'=>'Présentation'])

@section('menu')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active enCours">
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
<!--presentation-->
    <div class="col-8">
        <h2 class="titreCadre"> Présentation </h2> <br/> <!-- class utilisée sur la page "developpement" -->
        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_1878-7.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_1921-33.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_6.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_5.jpg')}}" alt="fourth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--infos sur l'entreprise en-dessous du slide -->
                <div class="infoSarl">
                    SARL au capital de 2.000.000 FCFA dont le siège est à Abidjan, 
                    Inscrit au Registre de Commerce d’Abidjan, sous le N° CI-ABJ-1993-B-170312.<br/>
                    <span>
                        -Treichville Avenue 1, Résidence PONT DE GAULE Escalier A 1er Etage Porte A/1
                    </span>
                </div>
                <!--end infos sur l'entreprise en-dessous du slide -->
            </div>
    
            <div class="col">
                <p class="">
                    INTER-GROUPE est un organisme de formation destiné aux travailleurs salariés
                    de tous secteurs d’activités. Depuis 1992 nous avons formé plusieurs centaines de 
                    personnes de secteurs d’activités divers. La société est constituée de spécialistes de la 
                    formation et qui disposent d'une expérience de plusieurs années dans leurs activités d'expert(s).
                    C’est une Société qui intervient dans les domaines informatiques suivants:
                    <ul type="circle">
                        <li>Conception de Solutions Informatiques.</li>
                        <li>Conception de Logiciels Professionnels.</li>
                        <li>Réalisation de Réseaux Informatiques 
                            (Télécommunications, réseaux locaux).</li>
                        <li>FORMATION FDFP Agrément N° 92-529.</li>
                    </ul>
                </p>
            </div>
        </div>
<br/><br/>
        <!--activites-->
        <center><h4 class="sousTitreF"> Les Activités Actuelles</h4></center> <!-- class utilisée sur la page "fdfp" -->
        <div class="row">
            <div class="col activite">
                <div>
                    <i class="fa fa-shopping-bag"></i><b><span>Vente de logiciel Consult 6</span></b>
                    <p>Ce logiciel de télécommunication est une interface 
                        entre la trésorerie des entreprises
                        et les différents serveurs financiers (banques etc.).
                    </p>
                </div>
                <div>
                    <i class="fa fa-user-graduate"></i><b><span>Formation</span></b>
                    <p>Formation continue de salariés.
                    </p>
                </div>
            </div>
            <div class="col activite">
                <div>
                    <i class="fa fa-laptop-code"></i><b><span>Développement de Logiciel</span></b>
                    <p>Aujourd'hui Inter-Groupe se développe autour 
                    de produit logiciel conçu pour les entreprises et particulier.
                    </p>
                </div>
                <div>
                    <i class="fa fa-question-circle"></i><b><span>Contrat d'assistance et divers</span></b>
                    <p>
                    </p>
                </div>
            </div>
        </div>
        <!--end activites-->

       <!-- <div class="gray-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
          <img alt="" src="img/itg.png">  
          </div>
          <div class="col-lg-7" id="skillz">
            <h3 class="skills">
              Indice de performance
            </h3>

            <div class="skill_bar">
              <div class="skill_bar_progress skill_one">
                <p>
                  Windev : 85% Complete
                </p>
              </div>
            </div>

            <div class="skill_bar">
              <div class="skill_bar_progress skill_two">
                <p>
                  Web application : 65% Complete
                </p>
              </div>
            </div>

            <div class="skill_bar">
              <div class="skill_bar_progress skill_three">
                <p>
                  Formation : 90% Complete
                </p>
              </div>
            </div>

            <div class="skill_bar">
              <div class="skill_bar_progress skill_four">
                <p>
                  Assistance et conseils : 70% Complete
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
<br/><br/>
    <!--equipe-->
        <center><h4 class="sousTitreF"> Pour satisfaire sa clientèle Inter-Groupe dispose d'une équipe compétente</h4></center> <!-- class utilisée sur la page "fdfp" -->
        
        <div class="container"><div class="row">
            <div class="equipe">
                <img src="{{asset('img/team/member2.jpg')}}" /> <br/>
                <p>
                    ANET CLEMENT BROU <br/>
                    <span>Le Gérant</span>
                </p>
            </div>
            <div class="equipe">
                <img src="{{asset('img/team/member3.jpg')}}" /> <br/>
                <p>
                    OUEGNIN RAPHAEL<br/>
                    <span>Responsable de Formation</span>
                </p>
            </div>
            <div class="equipe">  
                <img src="{{asset('img/portfolios/itg/MED_2233.jpg')}}" /> <br/> 
                <p>
                    LES COMMERCIAUX<br/>
                    <span>Une équipe dynamique</span> 
                </p>
            </div>
        </div></div>

            <!--<ul class="bureau-showcase clearfix">
                    <li>
                        <figure class="photo">
                            <img src="{{asset('img/team/member2.jpg')}}" alt="bureau1" />
                        </figure>
                    </li>
                    <li>
                        <figure class="photo">
                            <img src="{{asset('img/team/member3.jpg')}}" alt="bureau2" />
                        </figure>
                    </li>
                    <li>
                        <figure class="photo">
                            <img src="{{asset('img/portfolios/itg/MED_2233.jpg')}}" alt="bureau3" />
                        </figure>
                    </li>
                </ul>-->
        
    <!--end equipe-->
    </div>
<!--end presentation-->
@endsection
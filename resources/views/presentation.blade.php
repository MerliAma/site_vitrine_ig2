@extends('Layouts/baseHTML',['title'=>'Présentation du Cabinet'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DE PAGE -->
    <div class="mb-4">
        <h1 class="hero-title" style="font-size: 1.85rem;">
            Présentation d'INTER-GROUPE
        </h1>
        <p class="hero-lead mb-0">
            Cabinet d'ingénierie informatique et organisme de formation professionnelle continue à Abidjan depuis 1992.
        </p>
    </div>

    <!-- CARTE D'IDENTITÉ & REPRÉSENTATION -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div id="carouselPresentation" class="carousel slide rounded overflow-hidden shadow-sm" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_1878-7.jpg')}}" alt="Locaux et salle de formation INTER-GROUPE" style="height: 260px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_1921-33.jpg')}}" alt="Salle de cours et travaux pratiques" style="height: 260px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_6.jpg')}}" alt="Espace d'ingénierie informatique" style="height: 260px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('img/portfolios/itg/MED_5.jpg')}}" alt="Équipements et serveurs informatiques" style="height: 260px; object-fit: cover;">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselPresentation" role="button" data-slide="prev" aria-label="Photo précédente">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPresentation" role="button" data-slide="next" aria-label="Photo suivante">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h2 class="h5 font-weight-bold text-secondary mb-3">
                        Plus de 30 ans d'expertise au service des entreprises
                    </h2>
                    <p class="text-muted small mb-3">
                        <strong>INTER-GROUPE</strong> est un organisme de formation et une société d'ingénierie informatique intervenant auprès des travailleurs salariés et des entreprises de tous secteurs d'activités. Depuis 1992, nous avons formé plusieurs centaines de cadres, techniciens et collaborateurs.
                    </p>
                    <div class="p-3 bg-light rounded border mb-0" style="font-size: 0.875rem; line-height: 1.6;">
                        <div class="mb-1">
                            <strong class="text-secondary">Statut légal :</strong> SARL au capital de 2.000.000 FCFA
                        </div>
                        <div class="mb-1">
                            <strong class="text-secondary">RCCM :</strong> N° CI-ABJ-1993-B-170312 (Abidjan)
                        </div>
                        <div class="mb-1">
                            <strong class="text-secondary">Agrément FDFP :</strong> N° 92-529 &bull; Habilitation N° 0039
                        </div>
                        <div>
                            <strong class="text-secondary">Siège :</strong> Treichville Avenue 1, Résidence Pont de Gaulle, Esc. A, 1er Étage, Porte A/1
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DOMAINES D'INTERVENTION -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="section-title">
                <i class="fas fa-cubes mr-2" aria-hidden="true"></i> Domaines d'Intervention
            </h2>
            <p class="text-muted mb-4">
                Nos compétences s'articulent autour de 4 piliers technologiques et pédagogiques majeurs :
            </p>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-success mr-3 mt-1" style="font-size: 1.25rem;">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">Conception de Solutions Informatiques</h3>
                            <p class="small text-muted mb-0">Architecture de systèmes d'information, conseil technique et intégration d'outils métiers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-success mr-3 mt-1" style="font-size: 1.25rem;">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">Conception de Logiciels Professionnels</h3>
                            <p class="small text-muted mb-0">Développement d'applications de gestion et de télécommunication bancaire (Consult 6).</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-success mr-3 mt-1" style="font-size: 1.25rem;">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">Réseaux &amp; Télécommunications</h3>
                            <p class="small text-muted mb-0">Installation et maintenance de réseaux locaux d'entreprise (LAN), câblage et interconnexions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-success mr-3 mt-1" style="font-size: 1.25rem;">
                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">Formation Continue Agréée FDFP</h3>
                            <p class="small text-muted mb-0">Plans de formation financés et adaptés aux besoins réels des équipes opérationnelles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NOS ACTIVITÉS PRINCIPALES -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="section-title">
                <i class="fas fa-cogs mr-2" aria-hidden="true"></i> Activités Principales
            </h2>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-money-check-alt" aria-hidden="true"></i>
                        </div>
                        <h3 class="feature-title">Logiciel de Trésorerie Consult 6</h3>
                        <p class="small text-muted mb-3">
                            Interface de télécommunication sécurisée assurant la liaison directe entre la trésorerie des entreprises et les serveurs bancaires (relevés, rapprochement).
                        </p>
                        <a href="{{route('developpement')}}" class="btn btn-sm btn-outline-primary">
                            En savoir plus <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <h3 class="feature-title">Formation Continue des Salariés</h3>
                        <p class="small text-muted mb-3">
                            Perfectionnement des collaborateurs dans les domaines clés : Bureautique, RH, Comptabilité, Gestion financière, Réseaux et Programmation.
                        </p>
                        <a href="{{route('formation')}}" class="btn btn-sm btn-outline-primary">
                            Voir le catalogue <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-laptop-code" aria-hidden="true"></i>
                        </div>
                        <h3 class="feature-title">Développement Spécifique</h3>
                        <p class="small text-muted mb-3">
                            Conception de solutions informatiques sur mesure adaptées aux processus métiers des entreprises et aux exigences organisationnelles.
                        </p>
                        <a href="{{route('dmdPrestation')}}" class="btn btn-sm btn-outline-secondary">
                            Demander une étude <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        </div>
                        <h3 class="feature-title">Assistance &amp; Maintenance</h3>
                        <p class="small text-muted mb-3">
                            Contrats d'assistance informatique, maintenance préventive, audit de parc et support technique pour garantir la continuité opérationnelle.
                        </p>
                        <a href="{{route('contact')}}" class="btn btn-sm btn-outline-secondary">
                            Nous contacter <i class="fas fa-chevron-right ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ÉQUIPE DIRIGEANTE ET PÉDAGOGIQUE -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="section-title">
                <i class="fas fa-users mr-2" aria-hidden="true"></i> Équipe d'INTER-GROUPE
            </h2>
            <p class="text-muted mb-4">
                Une équipe compétente, expérimentée et dévouée pour vous accompagner à chaque étape :
            </p>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="team-card">
                        <img src="{{asset('img/team/member2.jpg')}}" alt="Anet Clément BROU, Gérant d'INTER-GROUPE" class="team-photo" />
                        <h3 class="team-name">Anet Clément BROU</h3>
                        <p class="team-role">Le Gérant</p>
                        <p class="small text-muted mt-2 mb-0">Direction stratégique, ingénierie informatique et relations institutionnelles.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="team-card">
                        <img src="{{asset('img/team/member3.jpg')}}" alt="Ouegnin Raphael, Responsable de Formation" class="team-photo" />
                        <h3 class="team-name">Ouegnin Raphael</h3>
                        <p class="team-role">Responsable Formation</p>
                        <p class="small text-muted mt-2 mb-0">Coordination pédagogique, ingénierie de formation et gestion des plans FDFP.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="team-card">
                        <img src="{{asset('img/portfolios/itg/MED_2233.jpg')}}" alt="Équipe commerciale INTER-GROUPE" class="team-photo" />
                        <h3 class="team-name">Équipe Commerciale</h3>
                        <p class="team-role">Conseil &amp; Relations Clients</p>
                        <p class="small text-muted mt-2 mb-0">Accompagnement personnalisé des entreprises partenaires et suivi des demandes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
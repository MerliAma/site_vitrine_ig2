@extends('Layouts/baseHTML',['title'=>'Cabinet d\'ingénierie informatique & formation professionnelle à Abidjan'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- HERO SECTION INSTITUTIONNELLE -->
    <section class="hero-card" aria-labelledby="hero-heading">
        <div class="d-inline-flex align-items-center mb-3">
            <span class="badge badge-success px-3 py-2" style="font-size: 0.8125rem;">
                <i class="fas fa-certificate mr-1" aria-hidden="true"></i> Agrément FDFP N° 0039 &bull; Habilitation Officielle
            </span>
        </div>
        <h1 id="hero-heading" class="hero-title">
            Ingénierie informatique &amp; Formation professionnelle en Côte d'Ivoire
        </h1>
        <p class="hero-lead">
            Basé à Treichville, Abidjan, <strong>INTER-GROUPE</strong> accompagne les entreprises, institutions et salariés dans la montée en compétences et la transformation numérique grâce à des formations continues agréées et des solutions informatiques éprouvées.
        </p>
        <div class="hero-actions">
            <a href="{{route('formation')}}" class="btn btn-accent btn-lg shadow-sm">
                <i class="fas fa-graduation-cap mr-2" aria-hidden="true"></i> Découvrir les formations
            </a>
            <a href="{{route('dmdPrestation')}}" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-laptop-code mr-2" aria-hidden="true"></i> Demander une prestation
            </a>
            <!--<a href="{{route('fdfp')}}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-file-invoice mr-2" aria-hidden="true"></i> Espace FDFP
            </a>-->
        </div>

        <!-- CARROUSEL VISUEL DU CABINET (HAUTE LISIBILITÉ & VISUEL ATTRÉYANT) -->
        <div id="heroCarousel" class="carousel slide hero-carousel-wrapper mt-4" data-ride="carousel" data-interval="5000" aria-label="Galerie et activités clés d'INTER-GROUPE">
            <ol class="carousel-indicators">
                <li data-target="#heroCarousel" data-slide-to="0" class="active" aria-label="Diapositive 1"></li>
                <li data-target="#heroCarousel" data-slide-to="1" aria-label="Diapositive 2"></li>
                <li data-target="#heroCarousel" data-slide-to="2" aria-label="Diapositive 3"></li>
                <li data-target="#heroCarousel" data-slide-to="3" aria-label="Diapositive 4"></li>
            </ol>
            <div class="carousel-inner">
                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img/works/img11.jpg')}}" alt="Séances de formation pratique et interactive à INTER-GROUPE">
                    <div class="hero-carousel-caption">
                        <span class="hero-slide-tag">
                            <i class="fas fa-user-graduate" aria-hidden="true"></i> Formation Continue Salariés
                        </span>
                        <h2 class="hero-slide-title">
                            Des formations pratiques orientées compétences métiers
                        </h2>
                        <p class="hero-slide-desc">
                            Du stage d'initiation aux perfectionnements pointus, nos ateliers renforcent l'efficacité opérationnelle de vos collaborateurs en entreprise.
                        </p>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/works/form.jpg')}}" alt="Accompagnement et plans de formation continue d'entreprises">
                    <div class="hero-carousel-caption">
                        <span class="hero-slide-tag">
                            <i class="fas fa-certificate" aria-hidden="true"></i> Habilitation FDFP N° 0039
                        </span>
                        <h2 class="hero-slide-title">
                            Plans de formation agréés et financés
                        </h2>
                        <p class="hero-slide-desc">
                            Accompagnement expert dans le montage, l'instruction et la prise en charge de vos projets de formation continue auprès du FDFP.
                        </p>
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/works/img92.jpg')}}" alt="Équipements informatiques et serveurs pédagogiques modernes">
                    <div class="hero-carousel-caption">
                        <span class="hero-slide-tag">
                            <i class="fas fa-network-wired" aria-hidden="true"></i> Infrastructures Informatiques
                        </span>
                        <h2 class="hero-slide-title">
                            Salles équipées et environnements techniques récents
                        </h2>
                        <p class="hero-slide-desc">
                            Des postes informatiques performants, des réseaux locaux interconnectés et des conditions d'apprentissage professionnelles.
                        </p>
                    </div>
                </div>

                <!-- SLIDE 4 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/works/site3.png')}}" alt="Solutions logicielles de trésorerie et intégration de progiciels">
                    <div class="hero-carousel-caption">
                        <span class="hero-slide-tag">
                            <i class="fas fa-laptop-code" aria-hidden="true"></i> Ingénierie Logicielle
                        </span>
                        <h2 class="hero-slide-title">
                            Solutions progicielles pour les entreprises ivoiriennes
                        </h2>
                        <p class="hero-slide-desc">
                            Déploiement et intégration des solutions de trésorerie CONSULT 6 et SAGE 1000 FRP, adaptées à vos flux financiers quotidiens.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CONTRÔLES PRÉCÉDENT / SUIVANT -->
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev" aria-label="Diapositive précédente">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next" aria-label="Diapositive suivante">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </section>

    <!-- SECTION PRÉSENTATION -->
    <section class="card mb-4 border-0 shadow-sm" aria-labelledby="pres-heading">
        <div class="card-body p-4">
            <h2 id="pres-heading" class="section-title">
                <i class="fas fa-building mr-2" aria-hidden="true"></i> Présentation du Cabinet
            </h2>
            <p class="lead" style="font-size: 1.05rem; font-weight: 600; color: var(--ig-secondary, #1A3A6B);">
                INTER-GROUPE &bull; Une offre indépendante, large et diversifiée au service des professionnels.
            </p>
            <p class="text-muted">
                Société d'ingénierie informatique agréée par le FDFP, INTER-GROUPE conçoit et dispense des formations continues destinées en priorité aux travailleurs des entreprises ivoiriennes. Du stage d’initiation aux perfectionnements les plus avancés, notre catalogue propose des modules concrets en <strong>Ressources Humaines, Comptabilité, Gestion, Réseaux et Ingénierie logicielle</strong>.
            </p>

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="feature-card text-center p-3">
                        <div class="feature-icon-wrapper mx-auto">
                            <i class="fas fa-laptop-code" aria-hidden="true"></i>
                        </div>
                        <h3 class="h6 font-weight-bold text-secondary mb-2">Ingénierie &amp; Logiciels</h3>
                        <p class="small text-muted mb-0">Conception de logiciels professionnels et déploiement de réseaux d'entreprise.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="feature-card text-center p-3">
                        <div class="feature-icon-wrapper mx-auto">
                            <i class="fas fa-user-graduate" aria-hidden="true"></i>
                        </div>
                        <h3 class="h6 font-weight-bold text-secondary mb-2">Formation Continue</h3>
                        <p class="small text-muted mb-0">Modules adaptés aux salariés pour développer leurs compétences métiers.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="feature-card text-center p-3">
                        <div class="feature-icon-wrapper mx-auto">
                            <i class="fas fa-handshake" aria-hidden="true"></i>
                        </div>
                        <h3 class="h6 font-weight-bold text-secondary mb-2">Habilitation FDFP</h3>
                        <p class="small text-muted mb-0">Accompagnement dans le montage et le financement de votre plan de formation.</p>
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <a href="{{route('presentation')}}" class="btn btn-outline-primary">
                    Découvrir l'histoire et l'équipe d'INTER-GROUPE <i class="fas fa-arrow-right ml-1" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION MOT DU GÉRANT -->
    <section class="exec-quote-card" aria-labelledby="gerant-heading">
        <h2 id="gerant-heading" class="section-title">
            <i class="fas fa-quote-left mr-2" aria-hidden="true"></i> Mot du Gérant
        </h2>
        <div class="row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="{{asset('img/gerant2.jpg')}}" alt="Anet Clément BROU, Gérant d'INTER-GROUPE" class="exec-photo" />
                <div class="exec-signature mt-2">
                    Anet Clément BROU
                    <br/>
                    <span>Gérant d’INTER-GROUPE</span>
                </div>
            </div>
            <div class="col-md-9">
                <blockquote class="exec-quote-text mb-3">
                    Être la référence dans les secteurs d’ingénierie informatique et de la formation professionnelle en Côte d’Ivoire, voilà une excellente toile de fond qui va au-delà du cœur du métier d’informaticien et de formateur. Sans faire abstraction de la qualité des services offerts, qui demeure la pierre angulaire de notre existence, la poursuite de cette vision nous amène quotidiennement à prendre en considération les attentes de nos clients et partenaires tout en demeurant une entreprise pleinement responsable.
                </blockquote>
                <p class="text-muted small mb-0">
                    Au titre de Gérant d’INTER-GROUPE, je suis particulièrement fier de pouvoir mettre l’épaule à la roue afin de relever ces défis enrichissants avec une équipe expérimentée, mettant son expertise au profit d’une organisation dynamique. Je vous souhaite la bienvenue sur notre plateforme Web et espère qu'elle vous apportera les réponses pertinentes à vos besoins.
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION ÉVÉNEMENTS & FORMATIONS À VENIR -->
    <section class="card mb-4 border-0 shadow-sm" aria-labelledby="events-heading">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <h2 id="events-heading" class="section-title mb-0">
                    <i class="fas fa-calendar-alt mr-2" aria-hidden="true"></i> Sessions &amp; Formations Récentes
                </h2>
                <a href="{{route('formation')}}" class="btn btn-sm btn-outline-primary mt-2 mt-sm-0">
                    Catalogue complet <i class="fas fa-arrow-right ml-1" aria-hidden="true"></i>
                </a>
            </div>

            @if(isset($listeEventAc) && $nbEventAc > 0)
                <div class="row">
                    @foreach($listeEventAc as $event)
                        @php
                            $datedeb = date('d/m/Y', strtotime($event->datedebEvent));
                            $datefin = date('d/m/Y', strtotime($event->datefinEvent));
                        @endphp
                        <div class="col-md-6 mb-3">
                            <div class="event-card">
                                <div>
                                    <div class="event-date-badge">
                                        <i class="far fa-calendar-check" aria-hidden="true"></i> Du {{ $datedeb }} au {{ $datefin }}
                                    </div>
                                    <h3 class="event-title">
                                        <i class="fas fa-building mr-1 text-muted" aria-hidden="true"></i> {{ $event->entEvent }}
                                    </h3>
                                    <p class="event-theme">
                                        <strong class="text-secondary">Thème :</strong> {{ $event->themEvent }}
                                    </p>
                                </div>
                                <div class="mt-3 pt-2 border-top text-right">
                                    <span class="badge badge-status-lu">
                                        <i class="fas fa-check-circle mr-1" aria-hidden="true"></i> Session planifiée
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info border-left-4 p-4 mb-0" role="status">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-info-circle fa-2x mr-3 text-info" aria-hidden="true"></i>
                        <div>
                            <h3 class="h6 font-weight-bold mb-1 text-secondary">Nouvelles sessions en cours de programmation</h3>
                            <p class="mb-0 small text-muted">
                                De nouveaux modules sont régulièrement organisés pour les entreprises partenaires. Vous pouvez consulter l'ensemble des modules disponibles ou formuler une demande spécifique pour votre organisation.
                            </p>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <a href="{{route('formation')}}" class="btn btn-sm btn-outline-primary mr-2">
                            Consulter les domaines
                        </a>
                        <a href="{{route('dmdFormation')}}" class="btn btn-sm btn-primary">
                            Formuler une demande
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- SECTION FDFP (FINANCEMENT & ÉTAPES) -->
    <section class="fdfp-card" aria-labelledby="fdfp-heading">
        <h2 id="fdfp-heading" class="section-title">
            <i class="fas fa-award mr-2" aria-hidden="true"></i> Espace Financement FDFP
        </h2>
        <div class="row align-items-center">
            <div class="col-lg-5 text-center mb-4 mb-lg-0">
                <img src="{{asset('img/tab1.png')}}" alt="Dispositif de formation agréé FDFP" class="img-fluid rounded shadow-sm mb-3" style="max-height: 220px;" />
                <a href="{{asset('documents/Lettre dhabilitation 2021-2022.pdf')}}" class="btn btn-accent btn-block shadow-sm" target="_blank" rel="noopener noreferrer">
                    <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i> Consulter l'Agrément FDFP (PDF)
                </a>
            </div>
            <div class="col-lg-7">
                <h3 class="h5 font-weight-bold mb-3 text-secondary">
                    Comment bénéficier du financement FDFP pour vos équipes ?
                </h3>
                <div class="step-item">
                    <div class="step-number">1</div>
                    <p class="step-text">
                        <strong>Être à jour de ses cotisations :</strong> S'acquitter de la taxe de formation professionnelle continue à la charge de l'employeur.
                    </p>
                </div>
                <div class="step-item">
                    <div class="step-number">2</div>
                    <p class="step-text">
                        <strong>Retirer un plan de formation :</strong> Obtenir le dossier auprès du FDFP (situé en face d'IVOSEP à Treichville).
                    </p>
                </div>
                <div class="step-item">
                    <div class="step-number">3</div>
                    <p class="step-text">
                        <strong>Constituer votre dossier :</strong> Renseigner les objectifs et informations requises pour vos collaborateurs.
                    </p>
                </div>
                <div class="step-item">
                    <div class="step-number">4</div>
                    <p class="step-text">
                        <strong>Sélectionner les modules INTER-GROUPE :</strong> Choisir dans notre catalogue habilité les modules répondant à vos besoins.
                    </p>
                </div>
                <div class="text-right mt-3">
                    <a href="{{route('fdfp')}}" class="btn btn-outline-secondary btn-sm">
                        En savoir plus sur le FDFP <i class="fas fa-arrow-right ml-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

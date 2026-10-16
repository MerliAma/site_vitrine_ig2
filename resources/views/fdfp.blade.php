@extends('Layouts/baseHTML',['title'=>'Espace Financement FDFP'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DE PAGE -->
    <div class="mb-4">
        <h1 class="hero-title" style="font-size: 1.85rem;">
            Espace Financement FDFP
        </h1>
        <p class="hero-lead mb-0">
            Comprendre le dispositif du Fonds de Développement de la Formation Professionnelle et valoriser les compétences de vos salariés.
        </p>
    </div>

    <!-- PRÉSENTATION INSTITUTIONNELLE DU FDFP -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="section-title">
                <i class="fas fa-landmark mr-2" aria-hidden="true"></i> Présentation du Dispositif FDFP
            </h2>
            <p class="text-muted" style="line-height: 1.65;">
                Depuis 1991, à la faveur de la mise en œuvre du Programme de Valorisation des Ressources Humaines (PVRH) par le gouvernement ivoirien, la Côte d'Ivoire s'est dotée d'un dispositif de formation professionnelle continue performant. Au cœur de ce dispositif national se trouve le <strong>FDFP (Fonds de Développement de la Formation Professionnelle)</strong>.
            </p>

            <div class="row align-items-center mt-4">
                <div class="col-md-5 mb-3 mb-md-0 text-center">
                    <img src="{{asset('img/FDFP3.jpg')}}" alt="FDFP Côte d'Ivoire — Fonds de Développement de la Formation Professionnelle" class="img-fluid rounded shadow-sm" style="max-height: 220px;" />
                </div>
                <div class="col-md-7">
                    <div class="p-3 bg-light rounded border">
                        <h3 class="h6 font-weight-bold text-secondary mb-2">
                            <i class="fas fa-coins text-warning mr-1" aria-hidden="true"></i> Financement du système :
                        </h3>
                        <p class="small text-muted mb-2">
                            Véritable structure de gestion et d'orientation, le FDFP impulse et met en œuvre la politique de formation continue et d'apprentissage en Côte d'Ivoire. Il gère notamment :
                        </p>
                        <ul class="list-unstyled mb-0 small">
                            <li class="py-1 border-bottom">
                                <i class="fas fa-check text-success mr-2" aria-hidden="true"></i>
                                <strong>Taxe d’Apprentissage :</strong> 0,4% de la masse salariale brute.
                            </li>
                            <li class="py-1">
                                <i class="fas fa-check text-success mr-2" aria-hidden="true"></i>
                                <strong>Taxe Additionnelle à la Formation Continue :</strong> 1,2% de la masse salariale.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <p class="text-muted small mt-3 mb-0">
                Les missions du FDFP portent sur l’instruction, le financement, le contrôle et l’évaluation des plans et projets de formation des entreprises cotisantes, des artisans et des autres composantes actives de la population ivoirienne.
            </p>
        </div>
    </div>

    <!-- LES 4 MISSIONS DE FORMATION -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="section-title">
                <i class="fas fa-bullseye mr-2" aria-hidden="true"></i> Les 4 Objectifs de Formation Soutenus
            </h2>
            <p class="text-muted small mb-3">
                Le FDFP exécute des missions d’appui et de conseil auprès de ses adhérents pour couvrir les étapes clés de la vie professionnelle :
            </p>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-primary mr-3" style="font-size: 1.25rem;">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">L'Intégration</h3>
                            <p class="small text-muted mb-0">Accompagnement et formation rapide des nouveaux collaborateurs embauchés.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-success mr-3" style="font-size: 1.25rem;">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">Le Perfectionnement</h3>
                            <p class="small text-muted mb-0">Actualisation et approfondissement des compétences dans les spécialités existantes.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-info mr-3" style="font-size: 1.25rem;">
                            <i class="fas fa-medal" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">La Promotion</h3>
                            <p class="small text-muted mb-0">Développement des aptitudes managériales ou techniques permettant l'accès à un poste supérieur.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-start p-3 bg-light rounded border h-100">
                        <div class="text-warning mr-3" style="font-size: 1.25rem;">
                            <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="h6 font-weight-bold text-secondary mb-1">La Reconversion</h3>
                            <p class="small text-muted mb-0">Acquisition de nouvelles compétences en vue d'une réorientation professionnelle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DÉMARCHES ENTREPRISES -->
    <div class="fdfp-card mb-4">
        <h2 class="section-title">
            <i class="fas fa-tasks mr-2" aria-hidden="true"></i> Comment Faire Financer Votre Plan de Formation ?
        </h2>
        <p class="text-muted small mb-4">
            Pour mobiliser vos droits à la formation continue et faire financer vos actions pédagogiques auprès du FDFP :
        </p>

        <div class="step-item">
            <div class="step-number">1</div>
            <p class="step-text">
                <strong>Être à jour de ses cotisations fiscales :</strong> Vérifier la régularité du paiement des taxes de formation continue et d’apprentissage auprès de l'administration.
            </p>
        </div>

        <div class="step-item">
            <div class="step-number">2</div>
            <p class="step-text">
                <strong>Retirer le dossier de plan au FDFP :</strong> Le formulaire officiel est disponible auprès des bureaux du FDFP (situés à Treichville, en face d'IVOSEP).
            </p>
        </div>

        <div class="step-item">
            <div class="step-number">3</div>
            <p class="step-text">
                <strong>Compléter les informations du plan :</strong> Renseigner les modules prévus, les effectifs concernés et les objectifs opérationnels visés.
            </p>
        </div>

        <div class="step-item">
            <div class="step-number">4</div>
            <p class="step-text">
                <strong>Sélectionner un cabinet habilité :</strong> Choisir INTER-GROUPE (Agrément N° 92-529 &bull; Habilitation N° 0039) pour dispenser les formations sélectionnées.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 mt-3 border-top">
            <a href="{{asset('documents/Lettre dhabilitation 2021-2022.pdf')}}" class="btn btn-outline-primary mb-2 mb-sm-0" target="_blank" rel="noopener noreferrer">
                <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i> Télécharger la lettre d'habilitation (PDF)
            </a>
            <a href="{{route('formation')}}" class="btn btn-accent shadow-sm">
                <i class="fas fa-book-open mr-2" aria-hidden="true"></i> Choisir vos modules dans le catalogue
            </a>
        </div>
    </div>

</div>
@endsection
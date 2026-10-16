@extends('Layouts/baseHTML',['title'=>'Développement & Solutions Logicielles'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DE PAGE -->
    <div class="mb-4">
        <h1 class="hero-title" style="font-size: 1.85rem;">
            Solutions Logicielles &amp; Ingénierie
        </h1>
        <p class="hero-lead mb-0">
            Des outils spécialisés et des progiciels de gestion éprouvés pour optimiser la trésorerie et le pilotage financier de votre entreprise.
        </p>
    </div>

    <!-- SOLUTION 1 : CONSULT 6 -->
    <div class="software-card">
        <div class="software-header">
            <div class="software-badge">
                APPS
            </div>
            <div>
                <h2 class="software-title">
                    CONSULT 6 &bull; Télécommunication &amp; Rapprochement Bancaire
                </h2>
                <p class="software-subtitle">
                    Interface automatisée entre les serveurs bancaires et votre logiciel de trésorerie.
                </p>
            </div>
        </div>

        <div class="mb-3">
            <h3 class="h6 font-weight-bold text-secondary mb-2">Principe de fonctionnement :</h3>
            <p class="text-muted" style="line-height: 1.65;">
                Le progiciel <strong>CONSULT 6</strong> permet d’intégrer automatiquement les extraits et relevés bancaires mis à disposition par les serveurs des différentes banques partenaires directement dans le logiciel de gestion de trésorerie utilisé par l'entreprise.
            </p>
            <p class="text-muted" style="line-height: 1.65;">
                CONSULT assure également l’archivage chronologique des écritures traitées au jour le jour pour les exploiter dans votre module de rapprochement bancaire. Il constitue une passerelle puissante, qu'une entreprise dispose d'un outil de trésorerie seul, d'un outil de rapprochement seul, ou des deux combinés.
            </p>
        </div>

        <div class="p-3 bg-light rounded border mb-4">
            <h4 class="h6 font-weight-bold text-secondary mb-2">
                <i class="fas fa-check-circle text-success mr-2" aria-hidden="true"></i> Compatibilité certifiée avec les standards du marché :
            </h4>
            <p class="small text-muted mb-0">
                CONSULT 6 est fonctionnel et déployé chez de nombreuses entreprises partenaires avec les solutions de référence : <strong>Xrt-Universe, Concept-Agresso, TresoWin, Sage Ligne 100 / 500 / 1000 et SAP</strong>. Des développements et connecteurs spécifiques peuvent également être réalisés sur mesure.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center pt-2 border-top">
            <a href="{{asset('documents/SupportConsult6.pdf')}}" class="btn btn-outline-primary mb-2 mb-sm-0" target="_blank" rel="noopener noreferrer">
                <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i> Télécharger le Support CONSULT 6 (PDF)
            </a>
            <a href="{{route('dmdPrestation')}}" class="btn btn-accent shadow-sm">
                <i class="fas fa-laptop-code mr-2" aria-hidden="true"></i> Demander une démonstration
            </a>
        </div>
    </div>

    <!-- SOLUTION 2 : SAGE 1000 FRP -->
    <div class="software-card">
        <div class="software-header">
            <div class="software-badge" style="background-color: var(--ig-primary, #0A6E3F);">
                FRP
            </div>
            <div>
                <h2 class="software-title">
                    SAGE 1000 FRP &bull; Finance &amp; Gestion d'Entreprise
                </h2>
                <p class="software-subtitle">
                    Solution intégrée et modulaire dédiée aux moyennes et grandes entreprises.
                </p>
            </div>
        </div>

        <div class="mb-3">
            <h3 class="h6 font-weight-bold text-secondary mb-2">Vision financière globale et rationalisation des processus :</h3>
            <p class="text-muted" style="line-height: 1.65;">
                <strong>Sage 1000 FRP</strong> offre une vision synthétique et unifiée de l'ensemble de la fonction financière. Il facilite le partage sécurisé des données et la rationalisation des circuits de validation internes.
            </p>
            <p class="text-muted" style="line-height: 1.65;">
                De conception modulaire, Sage 1000 FRP permet un déploiement progressif et maîtrisé, en phase avec les priorités opérationnelles et les contraintes budgétaires de votre organisation.
            </p>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-2">
                <div class="d-flex align-items-center p-2 bg-light rounded border">
                    <i class="fas fa-coins text-success mr-2 ml-1" aria-hidden="true"></i>
                    <span class="small font-weight-bold text-secondary">Trésorerie &amp; Comptabilité Générale</span>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="d-flex align-items-center p-2 bg-light rounded border">
                    <i class="fas fa-chart-line text-success mr-2 ml-1" aria-hidden="true"></i>
                    <span class="small font-weight-bold text-secondary">Gestion Commerciale &amp; Achats</span>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="d-flex align-items-center p-2 bg-light rounded border">
                    <i class="fas fa-sitemap text-success mr-2 ml-1" aria-hidden="true"></i>
                    <span class="small font-weight-bold text-secondary">Multi-sociétés &amp; Multi-sites</span>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="d-flex align-items-center p-2 bg-light rounded border">
                    <i class="fas fa-user-lock text-success mr-2 ml-1" aria-hidden="true"></i>
                    <span class="small font-weight-bold text-secondary">Accès collaboratif hautement sécurisé</span>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center pt-2 border-top">
            <a href="{{asset('documents/SAGE 1000 FRP FONCTIONNEMENT GENERAL.pdf')}}" class="btn btn-outline-primary mb-2 mb-sm-0" target="_blank" rel="noopener noreferrer">
                <i class="fas fa-file-pdf mr-2" aria-hidden="true"></i> Télécharger la documentation Sage 1000 FRP (PDF)
            </a>
            <a href="{{route('dmdPrestation')}}" class="btn btn-accent shadow-sm">
                <i class="fas fa-laptop-code mr-2" aria-hidden="true"></i> Demander une prestation
            </a>
        </div>
    </div>

    <!-- BANDEAU D'ACCOMPAGNEMENT PRESTATIONS -->
    <div class="card border-0 shadow-sm bg-light">
        <div class="card-body p-4 text-center">
            <h3 class="h5 font-weight-bold text-secondary mb-2">
                Vous avez un projet d'ingénierie informatique ou d'intégration ?
            </h3>
            <p class="text-muted small max-w-lg mx-auto mb-3">
                INTER-GROUPE analyse vos besoins techniques et organisationnels pour vous proposer la solution logicielle la plus adaptée à vos flux métiers.
            </p>
            <a href="{{route('dmdPrestation')}}" class="btn btn-primary">
                <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i> Soumettre une demande de prestation
            </a>
        </div>
    </div>

</div>
@endsection
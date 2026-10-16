<!-- Blocs latéraux / Informations complémentaires -->
<aside class="col-lg-4 col-md-4 col-12 infos-droit-sidebar pl-lg-4 mt-4 mt-md-0" role="complementary" aria-label="Informations complémentaires et catalogue">
    
    <!-- 1. Téléchargement Catalogue -->
    <div class="card mb-4 border-0 shadow-sm catalogue-card">
        <div class="card-body p-0">
            <!-- Vignette du catalogue -->
            <div class="catalogue-thumb-wrapper">
                <img src="{{asset('img/catalogue.png')}}" alt="Couverture du catalogue de formations INTER-GROUPE" class="catalogue-thumb-img">
                <div class="catalogue-thumb-overlay">
                    <span class="catalogue-badge">
                        <i class="fas fa-book-open mr-1" aria-hidden="true"></i> Catalogue Formations
                    </span>
                </div>
            </div>
            <!-- Texte et bouton -->
            <div class="p-3">
                <h4 class="catalogue-title">Découvrez nos formations</h4>
                <p class="catalogue-desc">
                    Plus de 500 modules couvrant l'informatique, la gestion, les langues, les finances et bien plus — accessibles via le FDFP.
                </p>
                <a href="{{asset('documents/Extrait Catalogue de Formation.pdf')}}" target="_blank" rel="noopener noreferrer"
                   class="btn btn-primary btn-block catalogue-cta" download>
                    <i class="fas fa-file-download mr-2" aria-hidden="true"></i> Télécharger le catalogue
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Habilitation FDFP -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-2">
            <h4 class="h6 mb-0 text-uppercase" style="color: var(--ig-secondary, #1A3A6B); font-family: var(--ig-font-heading); font-weight: 700;">
                <i class="ion-ios-checkmark mr-1" style="color: var(--ig-primary);" aria-hidden="true"></i> Habilitation FDFP
            </h4>
        </div>
        <div class="card-body p-3">
            <ul class="list-unstyled mb-0" style="font-size: 0.875rem; line-height: 1.8;">
                <li class="border-bottom py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Commerce &amp; Marketing</li>
                <li class="border-bottom py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Droit &amp; Fiscalité</li>
                <li class="border-bottom py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Langues vivantes</li>
                <li class="border-bottom py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Finances &amp; Banques</li>
                <li class="border-bottom py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Hôtellerie &amp; Restauration</li>
                <li class="py-1 text-muted"><i class="ion-ios-arrow-forward mr-2" style="color: var(--ig-accent);" aria-hidden="true"></i> Management &amp; RH</li>
            </ul>
        </div>
    </div> 

    <!-- 3. Ils nous font confiance (Carrousel clients 1 à 1) -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-2">
            <h4 class="h6 mb-0 text-uppercase text-center" style="color: var(--ig-secondary, #1A3A6B); font-family: var(--ig-font-heading); font-weight: 700;">
                Ils nous font confiance
            </h4>
        </div>
        <div class="card-body p-3 text-center">
            <div id="carouselClientsSidebar" class="carousel slide" data-ride="carousel" data-interval="3500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/bollore.png')}}" alt="Bolloré Transport & Logistics">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/cargil.png')}}" alt="Cargill Côte d'Ivoire">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/clipaa.png')}}" alt="Clipaa">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/sifca.png')}}" alt="Groupe SIFCA">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/petroivoire.png')}}" alt="Pétro Ivoire">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="client-logo-wrapper">
                            <img class="client-single-logo img-fluid" src="{{asset('img/clients/clicophesudco.png')}}" alt="Clicophe Sudco">
                        </div>
                    </div>
                </div>
            </div>
            <!--<p class="text-center mt-2 mb-0" style="font-size: 0.72rem; color: var(--ig-text-muted, #64748B);">
                Entreprises formées via le dispositif FDFP
            </p>-->
        </div>
    </div>

    <!-- 4. Accès rapides (FDFP / Webmail) -->
    <div class="row no-gutters mb-3">
        <div class="col-6 pr-1">
            @if(isset($idEnt))
                <a class="btn btn-outline-primary btn-block btn-sm" href="{{route('quitter','idEnt='.$idEnt.'&page=fdfp')}}">
                    <i class="ion-ios-filing mr-1" aria-hidden="true"></i> Espace FDFP
                </a>
            @else
                <a class="btn btn-outline-primary btn-block btn-sm" href="{{route('fdfp')}}">
                    <i class="ion-ios-filing mr-1" aria-hidden="true"></i> Espace FDFP
                </a>
            @endif
        </div>
        <div class="col-6 pl-1">
            <a class="btn btn-outline-secondary btn-block btn-sm" href="http://webmail1.hostinger.fr" target="_blank" rel="noopener noreferrer">
                <i class="ion-ios-mail mr-1" aria-hidden="true"></i> Webmail
            </a>
        </div>
    </div> 

</aside>

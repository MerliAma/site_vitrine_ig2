@extends('Layouts/baseHTML',['title'=>'Domaines de Formation & Modules Agréés FDFP'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DE PAGE -->
    <div class="mb-4">
        <h1 class="hero-title" style="font-size: 1.85rem;">
            Domaines de Formation &amp; Modules
        </h1>
        <p class="hero-lead mb-0">
            Consultez notre offre de formation professionnelle continue agréée par le FDFP, dispensée par des praticiens et experts métiers à Abidjan.
        </p>
    </div>

    <!-- MESSAGES D'INFORMATION ET CONFIRMATION -->
    @if(isset($info2))
        <div class="alert alert-warning alert-dismissible fade show border-left-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle fa-2x mr-3 text-warning" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Information</h2>
                    <p class="mb-0 small">{{ $info2 }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(request()->has('info'))
        <div class="alert alert-success alert-dismissible fade show border-left-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3 text-success" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Succès</h2>
                    <p class="mb-0 small">{{ request()->get('info') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(!isset($info2))
        <!-- BARRE DE PRÉSENTATION & ACTIONS RAPIDES -->
        <div class="card mb-4 border-0 shadow-sm bg-light">
            <div class="card-body p-3 d-flex flex-wrap justify-content-between align-items-center">
                <div class="mb-2 mb-md-0">
                    <span class="badge badge-success px-3 py-2 mr-2">
                        <i class="fas fa-check-double mr-1" aria-hidden="true"></i> Habilitation FDFP N° 0039
                    </span>
                    <span class="small text-muted font-weight-bold">
                        {{ $nblisteDomForm ?? (isset($listeDomForm) ? count($listeDomForm) : 0) }} Domaines d'expertise &bull; {{ $nbModule ?? (isset($listeModule) ? count($listeModule) : 0) }} Modules
                    </span>
                </div>
                <div>
                    <a href="{{asset('documents/Extrait Catalogue de Formation.pdf')}}" class="btn btn-sm btn-outline-primary mr-2" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-file-pdf mr-1" aria-hidden="true"></i> Extrait Catalogue (PDF)
                    </a>
                    <a href="{{route('dmdFormation')}}" class="btn btn-sm btn-accent shadow-sm">
                        <i class="fas fa-paper-plane mr-1" aria-hidden="true"></i> Demander une formation
                    </a>
                </div>
            </div>
        </div>

        <!-- ACCORDÉON DES DOMAINES ET MODULES (BOOTSTRAP 4 ACCESSIBLE) -->
        <div class="accordion accordion-formation mb-4" id="accordionDomainesFormation">
            @if(isset($listeDomForm) && count($listeDomForm) > 0)
                @foreach($listeDomForm as $index => $domaine)
                    @php
                        // Filtrer les modules associés au domaine
                        $modulesDomaine = [];
                        if (isset($listeModule)) {
                            foreach ($listeModule as $mod) {
                                if ($mod->domForm_id == $domaine->id) {
                                    $modulesDomaine[] = $mod;
                                }
                            }
                        }
                        $collapseId = 'collapseDomaine' . $domaine->id;
                        $isFirst = ($index === 0);
                    @endphp

                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-header bg-white p-0" id="heading{{ $domaine->id }}">
                            <button class="btn btn-header {{ $isFirst ? '' : 'collapsed' }}" type="button" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="{{ $isFirst ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                <span class="d-flex align-items-center">
                                    <span class="feature-icon-wrapper mr-3 mb-0" style="width: 36px; height: 36px; font-size: 1rem;">
                                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                    </span>
                                    <span class="font-weight-bold text-secondary" style="font-size: 1.05rem;">
                                        {{ $domaine->libForm }}
                                    </span>
                                </span>
                                <span class="d-flex align-items-center">
                                    <span class="badge badge-secondary mr-3 font-weight-normal" style="font-size: 0.8rem;">
                                        {{ count($modulesDomaine) }} module(s)
                                    </span>
                                    <i class="fas fa-chevron-down chevron-icon" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>

                        <div id="{{ $collapseId }}" class="collapse {{ $isFirst ? 'show' : '' }}" aria-labelledby="heading{{ $domaine->id }}" data-parent="#accordionDomainesFormation">
                            <div class="card-body p-3 bg-light">
                                @if(count($modulesDomaine) > 0)
                                    <ul class="list-unstyled mb-0">
                                        @foreach($modulesDomaine as $module)
                                            <li class="module-item bg-white px-3 py-2 rounded mb-2 border shadow-xs d-flex align-items-center">
                                                <i class="fas fa-check-circle module-icon text-success mr-2" aria-hidden="true"></i>
                                                <span class="text-dark font-weight-500" style="font-size: 0.9375rem;">
                                                    {{ $module->libMod }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="small text-muted mb-0 py-2 text-center">
                                        <i class="fas fa-info-circle mr-1" aria-hidden="true"></i>
                                        Des modules sur mesure sont disponibles sur demande pour ce domaine.
                                    </p>
                                @endif

                                <div class="text-right pt-2 mt-2 border-top">
                                    <a href="{{route('dmdFormation')}}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-envelope mr-1" aria-hidden="true"></i> Inscrire des collaborateurs à ce domaine
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info border-left-4 p-4 text-center">
                    <p class="mb-0">Aucun domaine de formation n'est actuellement répertorié.</p>
                </div>
            @endif
        </div>

        <!-- BANDEAU D'APPEL À L'ACTION -->
        <div class="card border-0 shadow-sm" style="background-color: var(--ig-surface-muted, #F1F5F9);">
            <div class="card-body p-4 text-center">
                <h2 class="h5 font-weight-bold text-secondary mb-2">
                    À la recherche d'un cabinet pour la formation continue de vos équipes ?
                </h2>
                <p class="small text-muted max-w-lg mx-auto mb-3">
                    Bénéficiez de l'accompagnement d'INTER-GROUPE pour monter votre plan de formation agréé FDFP et faire monter en compétence vos collaborateurs.
                </p>
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="{{route('dmdFormation')}}" class="btn btn-accent btn-lg shadow-sm mr-2 mb-2">
                        <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i> Soumettre une demande de formation
                    </a>
                    <a href="{{route('contact')}}" class="btn btn-outline-secondary btn-lg mb-2">
                        <i class="fas fa-phone-alt mr-2" aria-hidden="true"></i> Nous contacter
                    </a>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
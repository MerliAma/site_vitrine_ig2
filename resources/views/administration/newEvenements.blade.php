@extends('Layouts/admin/baseAdmin', ['title' => 'Gestion d\'Événement'])

@section('contenu')
<?php
    use App\evenement;
    $mode = $_GET['mode'] ?? 'Ajouter';
    if ($mode === 'Modifier' && isset($_GET['idEvent'])) {
        $idEvent = $_GET['idEvent'];
        $event = evenement::find($idEvent);
        $titrePage = "Modifier l'Événement";
        $sousTitre = "Mise à jour des informations de la session";
    } else {
        $idEvent = null;
        $event = null;
        $titrePage = "Nouvel Événement";
        $sousTitre = "Publication d'un séminaire ou atelier réalisé";
    }
?>
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">{{ $titrePage }}</h2>
                    <p class="text-muted mb-0">{{ $sousTitre }}</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('evenements') }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour aux événements
                    </a>
                </div>
            </div>

            <!-- Messages d'erreur éventuels renvoyés par le contrôleur -->
            @if(isset($info1) && $info1 != "")
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> {{ $info1 }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(isset($info2) && $info2 != "")
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> {{ $info2 }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Formulaire -->
            <div class="row">
                <div class="col-lg-7 col-md-9">
                    <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 font-weight-bold text-dark">
                                <i class="lnr lnr-calendar-full mr-2 text-primary"></i> Paramètres de la Session
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('newEvenements2', 'mode='.$mode.'&idEvent='.$idEvent) }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="themEvent" class="font-weight-bold text-dark">
                                        Thème de la formation <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="themEvent" name="themEvent" 
                                           value="{{ $event->themEvent ?? old('themEvent') }}" 
                                           placeholder="Ex : Négociation commerciale grands comptes et vente B2B" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="entEvent" class="font-weight-bold text-dark">
                                        Entreprise ou Organisation bénéficiaire <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="entEvent" name="entEvent" 
                                           value="{{ $event->entEvent ?? old('entEvent') }}" 
                                           placeholder="Ex : Grands Moulins d'Abidjan (GMA)" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="datedebEvent" class="font-weight-bold text-dark">
                                            Date de début <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control" id="datedebEvent" name="datedebEvent" 
                                               value="{{ $event->datedebEvent ?? old('datedebEvent') }}" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="datefinEvent" class="font-weight-bold text-dark">
                                            Date de fin <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control" id="datefinEvent" name="datefinEvent" 
                                               value="{{ $event->datefinEvent ?? old('datefinEvent') }}" required>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-end pt-3 border-top">
                                    <a href="{{ route('evenements') }}" class="btn btn-light mr-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-success px-4" name="validEvent">
                                        <i class="lnr lnr-check mr-1"></i> Enregistrer l'événement
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
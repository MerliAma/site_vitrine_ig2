@extends('Layouts/baseHTML', ['title' => 'Demande de Prestation Informatique'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DU FORMULAIRE -->
    <div class="form-hero-header">
        <span class="badge badge-primary px-3 py-2 mb-2" style="font-size: 0.8125rem;">
            <i class="fas fa-laptop-code mr-1" aria-hidden="true"></i> Ingénierie &bull; Solutions Logicielles &bull; Conseil
        </span>
        <h1 class="h2 font-weight-bold">Demande de Prestation Informatique</h1>
        <p>
            Vous avez un projet de développement logiciel, d'intégration de progiciels de gestion (Sage, Consult 6) 
            ou d'assistance technique ? Exprimez votre besoin ci-dessous pour recevoir une proposition adaptée.
        </p>
    </div>

    <!-- MESSAGES D'ALERTE -->
    @if(request()->has('info'))
        <div class="alert alert-success alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3 text-success" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Confirmation d'envoi</h2>
                    <p class="mb-0 small">{{ request()->get('info') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->has('tel'))
        <div class="alert alert-danger alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle fa-2x mr-3 text-danger" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Numéro de téléphone invalide</h2>
                    <p class="mb-0 small">Le numéro de téléphone doit comporter exactement 10 chiffres (standard ivoirien).</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any() && !$errors->has('tel'))
        <div class="alert alert-danger alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle fa-2x mr-3 text-danger" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Erreurs de validation</h2>
                    <p class="mb-0 small">Veuillez vérifier les champs renseignés ci-dessous.</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- FORMULAIRE DE PRESTATION -->
    <div class="form-card">
        <form method="post" action="{{ route('newdmdPrest') }}">
            @csrf

            <!-- SECTION 1 : VOS COORDONNÉES -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-id-card" aria-hidden="true"></i>
                    <span>1. Vos Coordonnées</span>
                </h2>

                <div class="form-group mb-3">
                    <label for="inputNom" class="font-weight-bold text-secondary">
                        Nom et Prénom(s) ou Raison Sociale <span class="required-star text-danger" aria-hidden="true">*</span>
                        <span class="sr-only">(obligatoire)</span>
                    </label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="inputNom" placeholder="Ex. Koffi Jean-Marc / ENTREPRISE SA" name="nom" required="required" value="{{ old('nom') }}" aria-required="true">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputEmail" class="font-weight-bold text-secondary">
                            Adresse Email <span class="required-star text-danger" aria-hidden="true">*</span>
                            <span class="sr-only">(obligatoire)</span>
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="nom@entreprise.ci" name="email" required="required" value="{{ old('email') }}" aria-required="true">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputTel" class="font-weight-bold text-secondary">
                            Numéro de Téléphone <span class="required-star text-danger" aria-hidden="true">*</span>
                            <span class="sr-only">(obligatoire)</span>
                        </label>
                        <input type="tel" class="form-control @error('tel') is-invalid @enderror" id="inputTel" placeholder="0701020304" name="tel" required="required" value="{{ old('tel') }}" aria-required="true" aria-describedby="telHelp" pattern="[0-9]{10}" maxlength="10">
                        <small id="telHelp" class="form-text text-muted">Format 10 chiffres (ex: 0701020304)</small>
                        @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- SECTION 2 : TYPES DE PRESTATIONS -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-tasks" aria-hidden="true"></i>
                    <span>2. Types de Prestations Souhaitées</span>
                </h2>
                <p class="small text-muted mb-3">
                    <i class="fas fa-info-circle mr-1 text-primary" aria-hidden="true"></i>
                    Cochez une ou plusieurs prestations correspondant à vos objectifs d'ingénierie logicielle.
                </p>

                <div class="prestation-select-grid">
                    @for($i = 0; $i < $nblisteTypePr; $i++)
                        @if($listeTypePr[$i]->boolTPrest == 1)
                            <div class="custom-control custom-checkbox prestation-choice-card">
                                <input class="custom-control-input" type="checkbox" id="Checkbox{{ $i }}" value="{{ $listeTypePr[$i]->id }}" name="{{ $i }}" {{ old((string)$i) ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold text-secondary" for="Checkbox{{ $i }}">
                                    {{ $listeTypePr[$i]->libPr }}
                                </label>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- SECTION 3 : INDICATIONS PARTICULIÈRES -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-file-alt" aria-hidden="true"></i>
                    <span>3. Descriptif et Spécifications du Projet</span>
                </h2>
                <div class="form-group mb-0">
                    <label for="Textarea1" class="font-weight-bold text-secondary">
                        Décrivez brièvement vos attentes, vos délais ou l'environnement technique existant
                    </label>
                    <textarea class="form-control" id="Textarea1" rows="5" placeholder="Ex. Développement d'un portail interne de suivi, interfaçage avec Sage 1000, nombre de postes utilisateurs concernés, échéance de déploiement..." name="indicationPrest">{{ old('indicationPrest') }}</textarea>
                    <small class="form-text text-muted">Ces précisions permettront à notre équipe technique de préparer une évaluation chiffrée précise.</small>
                </div>
            </div>

            <!-- BARRE D'ACTIONS -->
            <div class="form-actions-bar">
                <a href="{{ route('contact') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times mr-1" aria-hidden="true"></i> Annuler
                </a>
                <button type="submit" class="btn btn-primary btn-lg shadow-sm" name="validDmdPrest">
                    <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i>
                    <span>Envoyer ma demande de prestation</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
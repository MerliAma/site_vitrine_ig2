@extends('Layouts/baseHTML', ['title' => 'Demande de Formation — Étape 1 : Entreprise et Modules'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DU FORMULAIRE -->
    <div class="form-hero-header">
        <span class="badge badge-primary px-3 py-2 mb-2" style="font-size: 0.8125rem;">
            <i class="fas fa-graduation-cap mr-1" aria-hidden="true"></i> Formation Professionnelle Continue &bull; FDFP
        </span>
        <h1 class="h2 font-weight-bold">Formulaire de Demande de Formation</h1>
        <p>
            Renseignez les coordonnées de votre entreprise et sélectionnez les modules visés. 
            À l'étape suivante, vous pourrez renseigner la liste des salariés bénéficiaires pour la constitution de votre dossier de prise en charge.
        </p>
    </div>

    <!-- INDICATEUR D'ÉTAPES -->
    <div class="form-step-indicator" role="navigation" aria-label="Progression du formulaire">
        <div class="step-item active" aria-current="step">
            <span class="step-number" aria-hidden="true">1</span>
            <div class="step-text">
                <span class="d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Étape 1</span>
                <span>Entreprise &amp; Modules</span>
            </div>
        </div>
        <div class="step-divider" aria-hidden="true"></div>
        <div class="step-item">
            <span class="step-number" aria-hidden="true">2</span>
            <div class="step-text">
                <span class="d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Étape 2</span>
                <span>Bénéficiaires &amp; Validation</span>
            </div>
        </div>
    </div>

    <!-- MESSAGES D'ALERTE -->
    @if(request()->has('info'))
        <div class="alert alert-success alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3 text-success" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Confirmation</h2>
                    <p class="mb-0 small">{{ request()->get('info') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(request()->has('info2'))
        <div class="alert alert-danger alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle fa-2x mr-3 text-danger" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Attention</h2>
                    <p class="mb-0 small">{{ request()->get('info2') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-left-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle fa-2x mr-3 text-danger" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Erreurs de saisie</h2>
                    <p class="mb-0 small">Veuillez corriger les informations signalées dans le formulaire ci-dessous.</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- FORMULAIRE -->
    <div class="form-card">
        <form method="post" action="{{ route('newdmdForm') }}">
            @csrf

            <!-- SECTION 1 : COORDONNÉES ENTREPRISE -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-building" aria-hidden="true"></i>
                    <span>1. Informations de l'Entreprise</span>
                </h2>

                <div class="form-group mb-3">
                    <label for="inputRaisonSocial" class="font-weight-bold text-secondary">
                        Raison Sociale de l'Entreprise <span class="required-star text-danger" aria-hidden="true">*</span>
                        <span class="sr-only">(obligatoire)</span>
                    </label>
                    <input type="text" class="form-control @error('raisonSocial') is-invalid @enderror" id="inputRaisonSocial" placeholder="Ex. SOCIÉTÉ NOUVELLE D'INGÉNIERIE SARL" name="raisonSocial" required="required" value="{{ old('raisonSocial') }}" aria-required="true">
                    @error('raisonSocial')
                        <span class="invalid-feedback" role="alert">
                            <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputNcc" class="font-weight-bold text-secondary">
                            N° Compte Contribuable (NCC) <span class="required-star text-danger" aria-hidden="true">*</span>
                            <span class="sr-only">(obligatoire)</span>
                        </label>
                        <input type="text" class="form-control @error('ncc') is-invalid @enderror" id="inputNcc" placeholder="Ex. 0000000-L" maxlength="9" name="ncc" required="required" value="{{ old('ncc') }}" aria-required="true" aria-describedby="nccHelp">
                        <small id="nccHelp" class="form-text text-muted">Identifiant fiscal en Côte d'Ivoire (max 9 caractères)</small>
                        @error('ncc')
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputMSalarialePA" class="font-weight-bold text-secondary">
                            Masse Salariale Prévisionnelle Annuelle <span class="required-star text-danger" aria-hidden="true">*</span>
                            <span class="sr-only">(obligatoire)</span>
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('MSalarialePA') is-invalid @enderror" id="inputMSalarialePA" placeholder="Ex. 45000000" name="MSalarialePA" required="required" value="{{ old('MSalarialePA') }}" aria-required="true" aria-describedby="msHelp">
                            <div class="input-group-append">
                                <span class="input-group-text font-weight-bold text-muted">FCFA</span>
                            </div>
                        </div>
                        <small id="msHelp" class="form-text text-muted">Requis pour l'instruction du dossier FDFP</small>
                        @error('MSalarialePA')
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle mr-1" aria-hidden="true"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputEmail" class="font-weight-bold text-secondary">
                            Adresse Email Professionnelle <span class="required-star text-danger" aria-hidden="true">*</span>
                            <span class="sr-only">(obligatoire)</span>
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="contact@entreprise.ci" name="email" required="required" value="{{ old('email') }}" aria-required="true">
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

            <!-- SECTION 2 : SÉLECTION DES MODULES -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-cubes" aria-hidden="true"></i>
                    <span>2. Choix des Domaines et Modules de Formation</span>
                </h2>
                <p class="small text-muted mb-3">
                    <i class="fas fa-info-circle mr-1 text-primary" aria-hidden="true"></i>
                    Veuillez cocher au moins un module souhaité. Vous pouvez sélectionner plusieurs modules répartis sur différents domaines.
                </p>

                @for($i = 0; $i < $nblisteDomForm; $i++)
                    @php
                        $dom = $listeDomForm[$i];
                        $modulesDuDomaine = $listeModule->where('domForm_id', $dom->id);
                    @endphp
                    @if($modulesDuDomaine->count() > 0)
                        <div class="domain-group-card">
                            <div class="domain-group-header">
                                <span>
                                    <i class="fas fa-folder-open text-primary mr-2" aria-hidden="true"></i>
                                    {{ $dom->libForm }}
                                </span>
                                <span class="badge badge-light border text-muted">
                                    {{ $modulesDuDomaine->count() }} module{{ $modulesDuDomaine->count() > 1 ? 's' : '' }}
                                </span>
                            </div>
                            <div class="domain-group-body">
                                <div class="row">
                                    @foreach($modulesDuDomaine as $mod)
                                        <div class="col-md-6 mb-2">
                                            <div class="custom-control custom-checkbox module-checkbox-item">
                                                <input type="checkbox" class="custom-control-input" id="mod_{{ $mod->id }}" name="mod{{ $mod->id }}" value="{{ $mod->id }}" {{ old('mod'.$mod->id) ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-500" for="mod_{{ $mod->id }}">
                                                    {{ $mod->libMod }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

            <!-- SECTION 3 : ATTENTES PARTICULIÈRES -->
            <div class="form-section">
                <h2 class="form-section-title">
                    <i class="fas fa-comment-dots" aria-hidden="true"></i>
                    <span>3. Attentes et Besoins Complémentaires</span>
                </h2>
                <div class="form-group mb-0">
                    <label for="textareaAttentes" class="font-weight-bold text-secondary">
                        Précisions sur vos attentes, contraintes de planning ou modules sur-mesure
                    </label>
                    <textarea class="form-control" id="textareaAttentes" rows="4" placeholder="Ex. Période souhaitée, niveau actuel des collaborateurs, objectifs opérationnels particuliers..." name="attentes">{{ old('attentes') }}</textarea>
                    <small class="form-text text-muted">Optionnel &bull; Ces indications aideront nos conseillers pédagogiques à adapter le programme.</small>
                </div>
            </div>

            <!-- BARRE D'ACTIONS -->
            <div class="form-actions-bar">
                <a href="{{ route('formation') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Retour au catalogue
                </a>
                <button type="submit" class="btn btn-primary btn-lg shadow-sm" name="validDmdF">
                    <span>Poursuivre vers l'étape 2 (Bénéficiaires)</span>
                    <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
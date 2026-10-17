@extends('Layouts/admin/baseAdmin', ['title' => 'Gestion de Module'])

@section('contenu')
<?php
    use App\Module;
    use App\DomaineFormation;
    $idDomForm = $_GET['idDomForm'] ?? null;
    $domaine = $idDomForm ? DomaineFormation::find($idDomForm) : null;
    if (isset($_GET['idModule'])) {
        $Mod = Module::find($_GET['idModule']);
        $idModule = $_GET['idModule'];
        $actionNewMod = "Modifier le Module";
        $subTitle = "Mise à jour de l'intitulé du module";
    } else {
        $idModule = null;
        $actionNewMod = "Nouveau Module de Formation";
        $subTitle = "Ajout d'un module au programme de formation";
    }
?>
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">{{ $actionNewMod }}</h2>
                    <p class="text-muted mb-0">
                        {{ $subTitle }} 
                        @if($domaine)
                            &bull; Domaine : <span class="badge badge-light border text-primary font-weight-bold">{{ $domaine->libDomForm }}</span>
                        @endif
                    </p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('listeModules', 'idDomForm='.$idDomForm) }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour aux modules
                    </a>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 font-weight-bold text-dark">
                                <i class="lnr lnr-pencil mr-2 text-primary"></i> Paramètres du Module
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('newModule2', 'idModule='.$idModule.'&idDomForm='.$idDomForm) }}" method="post">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="libMod" class="font-weight-bold text-dark">
                                        Intitulé du module <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="libMod" name="libMod" 
                                           value="{{ $Mod->libMod ?? old('libMod') }}" 
                                           placeholder="Ex : Administration Windows Server 2022" required>
                                    <small class="form-text text-muted">
                                        Ce libellé sera visible par les entreprises et stagiaires lors des inscriptions.
                                    </small>
                                </div>

                                <div class="d-flex align-items-center justify-content-end pt-3 border-top">
                                    <a href="{{ route('listeModules', 'idDomForm='.$idDomForm) }}" class="btn btn-light mr-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-success px-4" name="validForm">
                                        <i class="lnr lnr-check mr-1"></i> Enregistrer le module
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
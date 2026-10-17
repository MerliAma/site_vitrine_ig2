@extends('Layouts/admin/baseAdmin', ['title' => 'Nouvelle Prestation'])

@section('contenu')
<?php
    use App\TypePrestation;
    $mode = $_GET['mode'] ?? 'Ajouter';
    if ($mode === 'Modifier' && isset($_GET['idTypeP'])) {
        $typeP = TypePrestation::find($_GET['idTypeP']);
        $idTypeP = $_GET['idTypeP'];
        $titrePage = "Modifier le Type de Prestation";
        $sousTitre = "Mise à jour du libellé de prestation informatique";
    } else {
        $idTypeP = null;
        $titrePage = "Nouveau Type de Prestation";
        $sousTitre = "Création d'un service d'ingénierie informatique";
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
                    <a href="{{ route('typePr') }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour aux prestations
                    </a>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 font-weight-bold text-dark">
                                <i class="lnr lnr-code mr-2 text-primary"></i> Libellé de la Prestation
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('newPr2', 'mode='.$mode.'&idTypeP='.$idTypeP) }}" method="post">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="libPr" class="font-weight-bold text-dark">
                                        Intitulé du service <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="libPr" name="libPr" 
                                           value="{{ $typeP->libPr ?? old('libPr') }}" 
                                           placeholder="Ex : Audit de sécurité & Tests d'intrusion" required>
                                    <small class="form-text text-muted">
                                        Ce type de prestation apparaîtra dans la liste déroulante des demandes de devis et sur la page de présentation.
                                    </small>
                                </div>

                                <div class="d-flex align-items-center justify-content-end pt-3 border-top">
                                    <a href="{{ route('typePr') }}" class="btn btn-light mr-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-success px-4" name="validPr">
                                        <i class="lnr lnr-check mr-1"></i> Enregistrer
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
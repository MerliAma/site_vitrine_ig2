@extends('Layouts/baseHTML', ['title' => 'Demande de Formation — Étape 2 : Liste des Bénéficiaires'])

@php
    use App\Module;
    $idEnt = request('idEnt');
    $attentes = request('attentes', '');
    $tabIdMod = request('tabIdMod');
    if(is_array($tabIdMod)) {
        $tabIdModArray = $tabIdMod;
        $tabIdMod2 = implode('/', $tabIdMod);
    } else {
        $tabIdModArray = explode('/', (string)$tabIdMod);
        $tabIdMod2 = $tabIdMod;
    }
@endphp

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'Ac']) }}">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'present']) }}">Présentation</a>
    </li>
    <li class="nav-item active enCours">
        <a class="nav-link" href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'domF']) }}">Domaines de Formations</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'dev']) }}">Développement</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'cont']) }}">Contact</a>
    </li>
@endsection

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DU FORMULAIRE -->
    <div class="form-hero-header">
        <span class="badge badge-primary px-3 py-2 mb-2" style="font-size: 0.8125rem;">
            <i class="fas fa-users mr-1" aria-hidden="true"></i> Dossier de Prise en Charge FDFP
        </span>
        <h1 class="h2 font-weight-bold">Bénéficiaires des Modules de Formation</h1>
        <p>
            Étape 2 sur 2 : Pour chaque module sélectionné, indiquez l'effectif prévisionnel de vos salariés participants 
            puis complétez leurs informations professionnelles (Matricule CNPS, Fonction, Catégorie, Ancienneté).
        </p>
    </div>

    <!-- INDICATEUR D'ÉTAPES -->
    <div class="form-step-indicator" role="navigation" aria-label="Progression du formulaire">
        <div class="step-item completed">
            <span class="step-number" aria-hidden="true"><i class="fas fa-check" style="font-size: 0.8125rem;"></i></span>
            <div class="step-text">
                <span class="d-block text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Étape 1</span>
                <span>Entreprise &amp; Modules</span>
            </div>
        </div>
        <div class="step-divider" aria-hidden="true"></div>
        <div class="step-item active" aria-current="step">
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
                    <h2 class="h6 font-weight-bold mb-1">Succès</h2>
                    <p class="mb-0 small">{{ request()->get('info') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="form-card">
        <form method="post" action="{{ route('newdmdForm2', ['idEnt' => $idEnt, 'tabIdMod' => $tabIdMod2, 'attentes' => $attentes]) }}">
            @csrf

            @if(empty($tabIdModArray) || count($tabIdModArray) === 0 || (count($tabIdModArray) === 1 && empty($tabIdModArray[0])))
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle mr-2" aria-hidden="true"></i>
                    Aucun module n'a été transmis. Veuillez reprendre votre demande depuis le catalogue.
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('dmdFormation') }}" class="btn btn-primary">
                        <i class="fas fa-redo mr-1" aria-hidden="true"></i> Recommencer la demande
                    </a>
                </div>
            @else
                @for($i = 0; $i < count($tabIdModArray); $i++)
                    @php
                        $cpt = $i + 1;
                        $modObj = Module::find($tabIdModArray[$i]);
                        $libMod = $modObj ? $modObj->libMod : 'Module #' . $tabIdModArray[$i];
                    @endphp

                    <div class="module-benef-box">
                        <div class="module-benef-header">
                            <div>
                                <span class="badge badge-secondary px-2 py-1 mb-1" style="font-size: 0.75rem;">
                                    Module {{ $cpt }} sur {{ count($tabIdModArray) }}
                                </span>
                                <h2 class="module-benef-title">
                                    <i class="fas fa-book-reader text-primary mr-2" aria-hidden="true"></i>
                                    {{ $libMod }}
                                </h2>
                            </div>
                            <div class="effectif-input-wrapper">
                                <label for="nbBen{{ $cpt }}" class="small font-weight-bold text-secondary mb-0 mr-2">
                                    Effectif de salariés :
                                </label>
                                <input type="number" class="form-control form-control-sm nbBen" name="nbBen{{ $cpt }}" id="nbBen{{ $cpt }}" value="1" min="1" max="100" required="required" onchange="nbLigne({{ $cpt }})" aria-label="Nombre de bénéficiaires pour {{ $libMod }}">
                                <button type="button" id="VBen{{ $cpt }}" class="btn btn-sm btn-outline-primary" onclick="nbLigne({{ $cpt }})" title="Mettre à jour le nombre de lignes">
                                    <i class="fas fa-sync-alt mr-1" aria-hidden="true"></i> OK
                                </button>
                            </div>
                        </div>

                        <div id="Err{{ $cpt }}" class="small text-danger font-weight-bold mb-2"></div>

                        <div class="table-responsive">
                            <table class="table-beneficiaires table table-sm table-bordered table-hover mb-0" id="table{{ $cpt }}">
                                <thead>
                                    <!-- Entête généré par JS -->
                                </thead>
                                <tbody id="ligne{{ $cpt }}">
                                    <!-- Lignes générées par JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor

                <!-- ACTIONS DU FORMULAIRE -->
                <div class="form-actions-bar">
                    <a href="{{ route('quitter', ['idEnt' => $idEnt, 'page' => 'domF']) }}" class="btn btn-outline-danger" onclick="return confirm('Attention : l\'abandon de la saisie annulera cette demande. Confirmer l\'annulation ?');">
                        <i class="fas fa-times mr-1" aria-hidden="true"></i> Abandonner la demande
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm" name="validDmdF">
                        <i class="fas fa-check-circle mr-2" aria-hidden="true"></i>
                        <span>Finaliser et transmettre la demande</span>
                    </button>
                </div>
            @endif
        </form>
    </div>

</div>

<script>
    function nbLigne(nbM) {
        var inputElem = document.getElementById('nbBen' + nbM);
        if (!inputElem) return;

        var nbBen = parseInt(inputElem.value, 10);
        var table = document.getElementById('table' + nbM);
        var thead = table.children[0];
        var tbody = document.getElementById('ligne' + nbM);
        var errElem = document.getElementById('Err' + nbM);

        thead.innerHTML = '<tr><th style="width: 50px;">N°</th><th>Nom &amp; Prénom(s)</th><th style="min-width: 140px;">Matricule CNPS</th><th>Fonction</th><th style="min-width: 160px;">Catégorie</th><th style="width: 110px;">Année Emb.</th><th style="min-width: 130px;">Nationalité</th></tr>';

        if (isNaN(nbBen) || nbBen <= 0) {
            nbBen = 1;
            inputElem.value = 1;
            if (errElem) {
                errElem.innerHTML = '<i class="fas fa-exclamation-circle mr-1"></i> Attention : au moins un (1) bénéficiaire est requis par module.';
            }
        } else {
            if (errElem) {
                errElem.innerHTML = '';
            }
        }

        var nbTrVrai = tbody.children.length;

        if (nbBen > nbTrVrai) {
            while (nbBen > nbTrVrai) {
                var newTr = document.createElement("tr");
                tbody.appendChild(newTr);
                var rowIdx = nbTrVrai;
                var nOrdre = rowIdx + 1;

                newTr.innerHTML = 
                    '<td class="font-weight-bold text-center align-middle">' + nOrdre + '</td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Ex. KOUAME Yao" required name="nom' + nbM + rowIdx + '" /></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="12 caractères" minlength="12" maxlength="12" required name="mat' + nbM + rowIdx + '" /></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Ex. Chef de projet" required name="fonc' + nbM + rowIdx + '" /></td>' +
                    '<td>' +
                        '<select class="form-control form-control-sm" required name="cat' + nbM + rowIdx + '">' +
                            '<option value="Agent de Maîtrise">Agent de Maîtrise</option>' +
                            '<option value="Cadre">Cadre</option>' +
                            '<option value="Employé/Ouvrier">Employé/Ouvrier</option>' +
                        '</select>' +
                    '</td>' +
                    '<td><input type="number" class="form-control form-control-sm" placeholder="Ex. 2018" min="1950" max="' + (new Date().getFullYear()) + '" maxlength="4" required name="AnEm' + nbM + rowIdx + '" /></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Ex. Ivoirienne" value="Ivoirienne" required name="nat' + nbM + rowIdx + '" /></td>';

                nbTrVrai = tbody.children.length;
            }
        } else if (nbBen < nbTrVrai) {
            while (nbBen < nbTrVrai) {
                tbody.removeChild(tbody.lastChild);
                nbTrVrai = tbody.children.length;
            }
        }
    }

    // Initialisation automatique au chargement de chaque table de module
    document.addEventListener('DOMContentLoaded', function() {
        var inputs = document.getElementsByClassName('nbBen');
        for (var i = 1; i <= inputs.length; i++) {
            nbLigne(i);
        }
    });
</script>
@endsection
@extends('Layouts/admin/baseAdmin', ['title' => 'Événements & Formations Récentes'])

@section('contenu')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="admin-page-header">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Événements & Séminaires Récents</h2>
                    <p class="text-muted mb-0">Gestion des sessions de formation entreprises affichées sur la page d'accueil</p>
                </div>
                <div>
                    <a href="{{ route('newEvenements', ['mode' => 'Ajouter']) }}" class="btn btn-primary font-weight-bold" style="border-radius: var(--ig-radius-md, 8px); padding: 9px 18px; box-shadow: var(--ig-shadow-xs);">
                        <i class="lnr lnr-plus-circle mr-1"></i> Nouvel événement
                    </a>
                </div>
            </div>

            <!-- Messages d'alerte -->
            @if(isset($_GET['info']) && $_GET['info'] != "")
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-checkmark-circle mr-2"></i> {{ $_GET['info'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(isset($_GET['info2']) && $_GET['info2'] != "")
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> {{ $_GET['info2'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Carte principale -->
            <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                <div class="card-header bg-white border-bottom py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                    <h5 class="mb-2 mb-sm-0 font-weight-bold text-dark">
                        <i class="lnr lnr-calendar-full mr-2 text-primary"></i> Liste des sessions programmées & passées
                    </h5>
                    <span class="badge badge-light border px-3 py-2 text-muted">
                        Total : <strong class="text-dark">{{ $nblistEvent }}</strong> événement(s)
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($nblistEvent > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-uppercase font-weight-bold" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    <tr>
                                        <th class="border-0 px-4 py-3" style="width: 70px;">#</th>
                                        <th class="border-0 py-3">Thème de la Formation</th>
                                        <th class="border-0 py-3">Entreprise Bénéficiaire</th>
                                        <th class="border-0 py-3">Période</th>
                                        <th class="border-0 py-3 text-center" style="width: 140px;">Visibilité</th>
                                        <th class="border-0 py-3 text-center" style="width: 130px;">Modification</th>
                                        <th class="border-0 py-3 text-right pr-4" style="width: 130px;">Suppression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < $nblistEvent; $i++)
                                        @php
                                            $datedeb = substr($listeEvent[$i]->datedebEvent,8,2)."/".substr($listeEvent[$i]->datedebEvent,5,2)."/".substr($listeEvent[$i]->datedebEvent,0,4);
                                            $datefin = substr($listeEvent[$i]->datefinEvent,8,2)."/".substr($listeEvent[$i]->datefinEvent,5,2)."/".substr($listeEvent[$i]->datefinEvent,0,4);
                                        @endphp
                                        <tr>
                                            <td class="px-4 py-3 text-muted font-weight-bold">{{ $i + 1 }}</td>
                                            <td class="py-3">
                                                <div class="font-weight-bold text-dark">{{ $listeEvent[$i]->themEvent }}</div>
                                            </td>
                                            <td class="py-3">
                                                <span class="badge badge-light border text-dark font-weight-bold px-2 py-1">
                                                    <i class="lnr lnr-apartment mr-1 text-primary"></i> {{ $listeEvent[$i]->entEvent }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                <div class="small text-muted font-weight-bold">
                                                    <i class="lnr lnr-calendar-full mr-1"></i> {{ $datedeb }} <i class="lnr lnr-arrow-right mx-1"></i> {{ $datefin }}
                                                </div>
                                            </td>
                                            <td class="py-3 text-center">
                                                @if($listeEvent[$i]->boolEvent == 1)
                                                    <form id="ret-form-{{ $listeEvent[$i]->id }}" action="{{ route('Ret', ['mode' => 'Retirer', 'idEvent' => $listeEvent[$i]->id]) }}" method="post" style="display:none;">
                                                        @csrf
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeEvent[$i]->id }}, 'Retirer', 'ret')" class="btn btn-sm btn-outline-warning" title="Masquer du site public">
                                                        <i class="lnr lnr-eye mr-1"></i> Retirer
                                                    </button>
                                                @else
                                                    <form id="int-form-{{ $listeEvent[$i]->id }}" action="{{ route('Ret', ['mode' => 'Integrer', 'idEvent' => $listeEvent[$i]->id]) }}" method="post" style="display:none;">
                                                        @csrf
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeEvent[$i]->id }}, 'Mettre en ligne', 'int')" class="btn btn-sm btn-outline-success" title="Publier sur la page d'accueil">
                                                        <i class="lnr lnr-redo mr-1"></i> Afficher
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="py-3 text-center">
                                                <a href="{{ route('newEvenements', ['mode' => 'Modifier', 'idEvent' => $listeEvent[$i]->id]) }}" class="btn btn-sm btn-light border text-primary" title="Modifier l'événement">
                                                    <i class="lnr lnr-pencil mr-1"></i> Modifier
                                                </a>
                                            </td>
                                            <td class="py-3 text-right pr-4">
                                                <form id="delete-form-{{ $listeEvent[$i]->id }}" action="{{ route('Sup', ['mode' => 'Supprimer', 'idEvent' => $listeEvent[$i]->id]) }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" onclick="deleteT({{ $listeEvent[$i]->id }}, 'Supprimer', 'delete')" class="btn btn-sm btn-outline-danger" title="Supprimer cet événement">
                                                    <i class="lnr lnr-trash mr-1"></i> Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="p-3 bg-light border-top d-flex align-items-center text-muted small">
                            <i class="lnr lnr-bullhorn mr-2 text-primary font-weight-bold"></i>
                            <span><strong>Règle d'affichage :</strong> Seuls les <strong>quatre (4) événements</strong> publiés les plus récents sont mis en avant dans la section correspondante de la page d'accueil.</span>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="lnr lnr-calendar-full text-muted mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-muted">Aucun événement enregistré</h5>
                            <p class="text-muted mb-3">Ajoutez un premier séminaire ou atelier pour valoriser les réalisations d'INTER-GROUPE.</p>
                            <a href="{{ route('newEvenements', ['mode' => 'Ajouter']) }}" class="btn btn-primary">
                                <i class="lnr lnr-plus-circle mr-1"></i> Nouvel événement
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('Layouts/admin/baseAdmin', ['title' => 'Types de Prestations'])

@section('contenu')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="admin-page-header">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Types de Prestations Informatiques</h2>
                    <p class="text-muted mb-0">Gestion du catalogue de services et d'ingénierie proposé par INTER-GROUPE</p>
                </div>
                <div>
                    <a href="{{ route('newPr', 'mode=Ajouter') }}" class="btn btn-primary font-weight-bold" style="border-radius: var(--ig-radius-md, 8px); padding: 9px 18px; box-shadow: var(--ig-shadow-xs);">
                        <i class="lnr lnr-plus-circle mr-1"></i> Nouveau type de prestation
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
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold text-dark">
                        <i class="lnr lnr-code mr-2 text-primary"></i> Prestations actives & archivées
                    </h5>
                    <span class="badge badge-light border px-3 py-2 text-muted">
                        Total : <strong class="text-dark">{{ $nblisteTypePr }}</strong> prestation(s)
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($nblisteTypePr > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-uppercase font-weight-bold" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    <tr>
                                        <th class="border-0 px-4 py-3" style="width: 70px;">#</th>
                                        <th class="border-0 py-3">Libellé du Service</th>
                                        <th class="border-0 py-3 text-center" style="width: 140px;">Visibilité</th>
                                        <th class="border-0 py-3 text-center" style="width: 140px;">Modification</th>
                                        <th class="border-0 py-3 text-right pr-4" style="width: 140px;">Suppression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < $nblisteTypePr; $i++)
                                        <tr>
                                            <td class="px-4 py-3 text-muted font-weight-bold">{{ $i + 1 }}</td>
                                            <td class="py-3">
                                                <div class="font-weight-bold text-dark">{{ $listeTypePr[$i]->libPr }}</div>
                                            </td>
                                            <td class="py-3 text-center">
                                                @if($listeTypePr[$i]->boolTPrest == 1)
                                                    <form id="ret-form-{{ $listeTypePr[$i]->id }}" action="{{ route('RetP', 'mode=Retirer&idTypeP='.$listeTypePr[$i]->id) }}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('GET')
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeTypePr[$i]->id }}, 'Retirer', 'ret')" class="btn btn-sm btn-outline-warning" title="Masquer du site public">
                                                        <i class="lnr lnr-eye mr-1"></i> Retirer
                                                    </button>
                                                @else
                                                    <form id="int-form-{{ $listeTypePr[$i]->id }}" action="{{ route('RetP', 'mode=Integrer&idTypeP='.$listeTypePr[$i]->id) }}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('GET')
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeTypePr[$i]->id }}, 'Integrer', 'int')" class="btn btn-sm btn-outline-success" title="Publier sur le site public">
                                                        <i class="lnr lnr-redo mr-1"></i> Publier
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="py-3 text-center">
                                                <a href="{{ route('newPr', 'mode=Modifier&idTypeP='.$listeTypePr[$i]->id) }}" class="btn btn-sm btn-light border text-primary" title="Modifier le libellé">
                                                    <i class="lnr lnr-pencil mr-1"></i> Modifier
                                                </a>
                                            </td>
                                            <td class="py-3 text-right pr-4">
                                                <form id="delete-form-{{ $listeTypePr[$i]->id }}" action="{{ route('SupTypeP', 'mode=Supprimer&idTypeP='.$listeTypePr[$i]->id) }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" onclick="deleteT({{ $listeTypePr[$i]->id }}, 'Supprimer', 'delete')" class="btn btn-sm btn-outline-danger" title="Supprimer ce type">
                                                    <i class="lnr lnr-trash mr-1"></i> Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="lnr lnr-inbox text-muted mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-muted">Aucun type de prestation enregistré</h5>
                            <p class="text-muted mb-3">Créez votre premier type de prestation informatique pour l'afficher sur le catalogue.</p>
                            <a href="{{ route('newPr', 'mode=Ajouter') }}" class="btn btn-primary">
                                <i class="lnr lnr-plus-circle mr-1"></i> Ajouter une prestation
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
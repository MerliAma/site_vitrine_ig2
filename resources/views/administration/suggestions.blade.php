@extends('Layouts/admin/baseAdmin', ['title' => 'Suggestions & Messages'])

@section('contenu')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Suggestions & Messages Reçus</h2>
                    <p class="text-muted mb-0">Retours d'expérience, avis et suggestions envoyés par les visiteurs du site</p>
                </div>
            </div>

            <!-- Carte principale -->
            <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                <div class="card-header bg-white border-bottom py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                    <h5 class="mb-2 mb-sm-0 font-weight-bold text-dark">
                        <i class="lnr lnr-envelope mr-2 text-primary"></i> Boîte de réception
                    </h5>
                    <span class="badge badge-light border px-3 py-2 text-muted">
                        Total : <strong class="text-dark">{{ $nbSug }}</strong> message(s)
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($nbSug > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-uppercase font-weight-bold" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    <tr>
                                        <th class="border-0 px-4 py-3" style="width: 70px;">#</th>
                                        <th class="border-0 py-3" style="width: 220px;">Expéditeur</th>
                                        <th class="border-0 py-3" style="width: 200px;">Contact</th>
                                        <th class="border-0 py-3">Message</th>
                                        <th class="border-0 py-3 text-center" style="width: 140px;">Statut</th>
                                        <th class="border-0 py-3 text-right pr-4" style="width: 130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < $nbSug; $i++)
                                        <tr class="{{ $listeSug[$i]->boolSug == 0 ? 'bg-white font-weight-bold' : '' }}">
                                            <td class="px-4 py-3 text-muted font-weight-bold">{{ $i + 1 }}</td>
                                            <td class="py-3">
                                                <div class="font-weight-bold text-dark">
                                                    <i class="lnr lnr-user mr-1 text-primary"></i> {{ $listeSug[$i]->nomSug }}
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="small">
                                                    @if($listeSug[$i]->mailSug)
                                                        <a href="mailto:{{ $listeSug[$i]->mailSug }}" class="text-primary text-decoration-none d-block">
                                                            <i class="lnr lnr-envelope mr-1"></i> {{ $listeSug[$i]->mailSug }}
                                                        </a>
                                                    @endif
                                                    @if($listeSug[$i]->telSug)
                                                        <a href="tel:{{ $listeSug[$i]->telSug }}" class="text-muted text-decoration-none d-block mt-1">
                                                            <i class="lnr lnr-phone-handset mr-1"></i> {{ $listeSug[$i]->telSug }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="text-secondary" style="max-width: 480px; line-height: 1.5; font-size: 0.9rem;">
                                                    {{ $listeSug[$i]->msgSug }}
                                                </div>
                                            </td>
                                            <td class="py-3 text-center">
                                                @if($listeSug[$i]->boolSug == 0)
                                                    <form id="marq-form-{{ $listeSug[$i]->id }}" action="{{ route('MarqSug', 'mode=Marquer&idSug='.$listeSug[$i]->id) }}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('GET')
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeSug[$i]->id }}, 'Marquer', 'marq')" class="btn btn-sm btn-outline-primary" title="Marquer comme lu">
                                                        <i class="lnr lnr-eye mr-1"></i> Marquer lu
                                                    </button>
                                                @else
                                                    <span class="badge badge-light border text-muted px-2 py-1 font-weight-normal">
                                                        <i class="lnr lnr-checkmark-circle mr-1 text-success"></i> Traité / Lu
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-right pr-4">
                                                <form id="delete-form-{{ $listeSug[$i]->id }}" action="{{ route('SupSug', 'mode=Supprimer&idSug='.$listeSug[$i]->id) }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" onclick="deleteT({{ $listeSug[$i]->id }}, 'Supprimer', 'delete')" class="btn btn-sm btn-outline-danger" title="Supprimer ce message">
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
                            <i class="lnr lnr-envelope text-muted mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-muted">Aucune suggestion pour le moment</h5>
                            <p class="text-muted mb-0">Les suggestions envoyées depuis le formulaire public de contact apparaîtront ici.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
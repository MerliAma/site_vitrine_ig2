@extends('Layouts/admin/baseAdmin', ['title' => 'Gestion des Utilisateurs'])

@section('contenu')
<?php 
    use App\role; 
    $permission = role::where('libelle', 'Autre')->get();
?>
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Comptes Utilisateurs & Privilèges</h2>
                    <p class="text-muted mb-0">Administration des accès au backoffice d'INTER-GROUPE</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('newUser', 'mode=Ajouter') }}" class="btn btn-primary shadow-sm font-weight-bold">
                        <i class="lnr lnr-user mr-1"></i> Nouvel utilisateur
                    </a>
                </div>
            </div>

            <!-- Messages d'alerte -->
            @if(isset($info) && $info != "")
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-checkmark-circle mr-2"></i> {{ $info }}
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

            <!-- Carte principale -->
            <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                <div class="card-header bg-white border-bottom py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                    <h5 class="mb-2 mb-sm-0 font-weight-bold text-dark">
                        <i class="lnr lnr-users mr-2 text-primary"></i> Comptes enregistrés
                    </h5>
                    <span class="badge badge-light border px-3 py-2 text-muted">
                        Total : <strong class="text-dark">{{ $nblisteUser }}</strong> compte(s)
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($nblisteUser > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light text-uppercase font-weight-bold" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    <tr>
                                        <th class="border-0 px-4 py-3" style="width: 70px;">#</th>
                                        <th class="border-0 py-3">Utilisateur</th>
                                        <th class="border-0 py-3">Téléphone</th>
                                        <th class="border-0 py-3">Email & Identifiant</th>
                                        <th class="border-0 py-3 text-center" style="width: 170px;">Rôle & Privilèges</th>
                                        <th class="border-0 py-3 text-right pr-4" style="width: 130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < $nblisteUser; $i++)
                                        @php
                                            $isCurrentUser = ($listeUser[$i]->id == auth()->user()->id);
                                            $isOtherRole = (isset($permission[0]) && $listeUser[$i]->role_id == $permission[0]->id);
                                        @endphp
                                        <tr class="{{ $isCurrentUser ? 'bg-light' : '' }}">
                                            <td class="px-4 py-3 text-muted font-weight-bold">{{ $i + 1 }}</td>
                                            <td class="py-3">
                                                <div class="font-weight-bold text-dark d-flex align-items-center">
                                                    <div class="avatar-circle mr-2 d-inline-flex align-items-center justify-content-center bg-primary text-white font-weight-bold" style="width: 32px; height: 32px; border-radius: 50%; font-size: 0.8rem;">
                                                        {{ strtoupper(substr($listeUser[$i]->name, 0, 1)) }}
                                                    </div>
                                                    <span>{{ $listeUser[$i]->name }}</span>
                                                    @if($isCurrentUser)
                                                        <span class="badge badge-success ml-2 font-weight-normal" style="font-size: 0.7rem;">Moi</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                @if($listeUser[$i]->telUser)
                                                    <a href="tel:{{ $listeUser[$i]->telUser }}" class="text-secondary text-decoration-none">
                                                        <i class="lnr lnr-phone-handset mr-1"></i> {{ $listeUser[$i]->telUser }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="py-3">
                                                <div class="small">
                                                    <a href="mailto:{{ $listeUser[$i]->email }}" class="text-primary text-decoration-none d-block">
                                                        <i class="lnr lnr-envelope mr-1"></i> {{ $listeUser[$i]->email }}
                                                    </a>
                                                    <span class="text-muted d-block mt-1">
                                                        Login : <code>{{ $listeUser[$i]->username }}</code>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 text-center">
                                                <form id="perm-form-{{ $listeUser[$i]->id }}" action="{{ route('RenPermUser', 'mode=Perm&idUser='.$listeUser[$i]->id) }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('GET')
                                                </form>

                                                @if(!$isCurrentUser)
                                                    @if($isOtherRole)
                                                        <button type="button" onclick="deleteT({{ $listeUser[$i]->id }}, 'Modifier le niveau d\'accès', 'perm')" class="btn btn-sm btn-outline-info" title="Accorder les privilèges Administrateur">
                                                            <i class="fa fa-arrow-up mr-1"></i> Rôle : Autre
                                                        </button>
                                                    @else
                                                        <button type="button" onclick="deleteT({{ $listeUser[$i]->id }}, 'Modifier le niveau d\'accès', 'perm')" class="btn btn-sm btn-outline-primary" title="Rétrograder au rôle Autre">
                                                            <i class="fa fa-shield mr-1"></i> Administrateur
                                                        </button>
                                                    @endif
                                                @else
                                                    <span class="badge badge-primary px-3 py-2 font-weight-bold">
                                                        <i class="fa fa-shield mr-1"></i> Super Admin
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-right pr-4">
                                                @if(!$isCurrentUser)
                                                    <form id="delete-form-{{ $listeUser[$i]->id }}" action="{{ route('SupUser', 'mode=Supprimer&idUser='.$listeUser[$i]->id) }}" method="post" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" onclick="deleteT({{ $listeUser[$i]->id }}, 'Supprimer', 'delete')" class="btn btn-sm btn-outline-danger" title="Supprimer ce compte">
                                                        <i class="lnr lnr-trash mr-1"></i> Supprimer
                                                    </button>
                                                @else
                                                    <span class="text-muted small font-italic">Protégé</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="lnr lnr-users text-muted mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-muted">Aucun utilisateur enregistré</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
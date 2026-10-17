@extends('Layouts/admin/baseAdmin', ['title' => 'Mon Profil'])

@section('contenu')
@php
    use App\role;
    $idUser = Auth::user()->id;
    $role = role::find(Auth::user()->role_id);
@endphp
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Mon Compte Administrateur</h2>
                    <p class="text-muted mb-0">Consultez et gérez vos identifiants d'accès au système</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('modifPro', 'mode=Modifier&idUser='.$idUser) }}" class="btn btn-primary shadow-sm font-weight-bold">
                        <i class="lnr lnr-pencil mr-1"></i> Modifier mes informations
                    </a>
                </div>
            </div>

            <!-- Message d'information -->
            @if(isset($_GET['info']) && $_GET['info'] != "")
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                    <i class="lnr lnr-checkmark-circle mr-2"></i> {{ $_GET['info'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <!-- Colonne latérale : Carte d'identité -->
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm text-center p-4" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="avatar-lg mx-auto mb-3 d-flex align-items-center justify-content-center bg-primary text-white font-weight-bold shadow-sm" 
                             style="width: 80px; height: 80px; border-radius: 50%; font-size: 2rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h4 class="font-weight-bold text-dark mb-1">{{ Auth::user()->name }}</h4>
                        <p class="text-muted mb-2"><code>{{ '@' . Auth::user()->username }}</code></p>
                        <div>
                            <span class="badge badge-primary px-3 py-2 font-weight-bold">
                                <i class="fa fa-shield mr-1"></i> {{ $role->libelle ?? 'Administrateur' }}
                            </span>
                        </div>
                        <hr class="my-4">
                        <div class="text-left small text-muted">
                            <p class="mb-2">
                                <i class="lnr lnr-calendar-full mr-2 text-primary"></i> <strong>Membre depuis :</strong> 
                                {{ Auth::user()->created_at ? Auth::user()->created_at->format('d/m/Y') : 'Historique système' }}
                            </p>
                            <p class="mb-0">
                                <i class="lnr lnr-lock mr-2 text-primary"></i> <strong>Rôle :</strong> 
                                Géré par l'administration centrale.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Colonne principale : Détails du profil -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 font-weight-bold text-dark">
                                <i class="lnr lnr-user mr-2 text-primary"></i> Coordonnées & Accès
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold">Nom et Prénoms :</div>
                                <div class="col-sm-8 text-dark font-weight-bold">{{ Auth::user()->name }}</div>
                            </div>
                            <hr class="my-2">
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold">Identifiant (Login) :</div>
                                <div class="col-sm-8 text-dark font-mono"><code>{{ Auth::user()->username }}</code></div>
                            </div>
                            <hr class="my-2">
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold">Adresse Email :</div>
                                <div class="col-sm-8">
                                    <a href="mailto:{{ Auth::user()->email }}" class="text-primary font-weight-bold">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold">Téléphone de contact :</div>
                                <div class="col-sm-8 text-dark font-weight-bold">
                                    {{ Auth::user()->telUser ?: 'Non renseigné' }}
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold">Privilèges système :</div>
                                <div class="col-sm-8">
                                    <span class="badge badge-light border text-dark font-weight-bold px-2 py-1">
                                        {{ $role->libelle ?? 'Admin' }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end pt-4 border-top mt-4">
                                <a href="{{ route('modifPro', 'mode=Modifier&idUser='.$idUser) }}" class="btn btn-primary px-4">
                                    <i class="lnr lnr-pencil mr-1"></i> Modifier le profil & mot de passe
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
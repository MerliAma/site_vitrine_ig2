@extends('Layouts/admin/baseAdmin', ['title' => 'Nouvel Utilisateur'])

@section('contenu')
<?php
    use App\role;
    $role = role::all();
    $mode = $_GET['mode'] ?? 'Ajouter';
    $idUser = null;
?>
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header de page -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1">Création d'un Compte Utilisateur</h2>
                    <p class="text-muted mb-0">Définissez les identifiants et le niveau d'habilitation au backoffice</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('user') }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour aux utilisateurs
                    </a>
                </div>
            </div>

            <!-- Messages d'erreur de validation Blade -->
            @if($errors->has('password'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> Les mots de passe ne sont pas identiques ou la taille minimale (6 caractères) n'est pas respectée.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('telUser'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> Le format du numéro de téléphone est invalide.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('email'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="lnr lnr-warning mr-2"></i> Cette adresse email est invalide ou déjà utilisée par un autre compte.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Formulaire -->
            <div class="row">
                <div class="col-lg-8 col-md-10">
                    <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                        <div class="card-header bg-white border-bottom py-3">
                            <h5 class="mb-0 font-weight-bold text-dark">
                                <i class="lnr lnr-user mr-2 text-primary"></i> Informations du Profil
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('newUser2', 'mode='.$mode.'&idUser='.$idUser) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="name" class="font-weight-bold text-dark">
                                            Nom et Prénoms <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="{{ old('name') }}" placeholder="Ex : KOUAME Jean-Luc" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="telUser" class="font-weight-bold text-dark">
                                            Téléphone <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="telUser" name="telUser" 
                                               value="{{ old('telUser') }}" placeholder="Ex : 0708091011" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="email" class="font-weight-bold text-dark">
                                            Adresse Email <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email') }}" placeholder="Ex : jeanluc@inter-groupe.ci" required>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="username" class="font-weight-bold text-dark">
                                            Identifiant de Connexion (Login) <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="username" name="username" 
                                               value="{{ old('username') }}" placeholder="Ex : jkouame" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="password" class="font-weight-bold text-dark">
                                            Mot de passe <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="password" name="password" 
                                               placeholder="Au moins 6 caractères" required minlength="6">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="password_confirmation" class="font-weight-bold text-dark">
                                            Confirmation du mot de passe <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                                               placeholder="Répétez le mot de passe" required minlength="6">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="role_id" class="font-weight-bold text-dark">
                                        Rôle & Niveau d'accès <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control custom-select" id="role_id" name="role_id" required>
                                        @foreach($role as $r)
                                            <option value="{{ $r->id }}">{{ $r->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">
                                        Les administrateurs ont accès à la gestion complète des utilisateurs et des configurations.
                                    </small>
                                </div>

                                <div class="d-flex align-items-center justify-content-end pt-3 border-top">
                                    <a href="{{ route('user') }}" class="btn btn-light mr-2">
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="lnr lnr-check mr-1"></i> Créer l'utilisateur
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
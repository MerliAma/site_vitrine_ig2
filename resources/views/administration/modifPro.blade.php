@extends('Layouts/admin/baseAdmin2', ['title' => 'Modifier mon Profil'])

@section('contenu')
<?php
    use App\User;
    use App\role;
    $role = role::all();

    if (User::count() == 0) {
        $actionNewU = "Bienvenue, veuillez vous enregistrer pour continuer";
        $subTitle = "Initialisation du compte administrateur principal";
        $idUser = null;
        $user = null;
        $tel = null;
    } else if (isset($_GET['mode']) && $_GET['mode'] == "Modifier") {
        $actionNewU = "Modification de mon Profil";
        $subTitle = "Mettez à jour vos informations de contact et votre mot de passe";
        $idUser = $_GET['idUser'];
        $user = User::find($idUser);
        $tel = $user ? substr($user->telUser,0,2).substr($user->telUser,3,2).substr($user->telUser,6,2).substr($user->telUser,9,2) : '';
    } else {
        $actionNewU = "Modification de profil";
        $subTitle = "Mise à jour des informations";
        $idUser = null;
        $user = null;
        $tel = null;
    }
?>
<div class="py-5" style="background-color: var(--ig-bg-light, #F8FAFC); min-height: 80vh;">
    <div class="container">
        <!-- Header de page -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
            <div>
                <h2 class="h3 font-weight-bold text-dark mb-1">{{ $actionNewU }}</h2>
                <p class="text-muted mb-0">{{ $subTitle }}</p>
            </div>
            <div class="mt-3 mt-md-0">
                @if(isset($_GET['mode']) && $_GET['mode'] == "Modifier")
                    <a href="{{ route('profil') }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour à mon profil
                    </a>
                @else
                    <a href="{{ route('accueil') }}" class="btn btn-outline-secondary">
                        <i class="lnr lnr-arrow-left mr-1"></i> Retour au site
                    </a>
                @endif
            </div>
        </div>

        <!-- Alertes de validation -->
        @if($errors->has('password'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="lnr lnr-warning mr-2"></i> Les mots de passe ne sont pas identiques ou la taille minimum (6 caractères) n'est pas respectée.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if($errors->has('telUser'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="lnr lnr-warning mr-2"></i> Format du numéro de téléphone invalide !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if($errors->has('email'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="lnr lnr-warning mr-2"></i> Erreur sur l'adresse email saisie !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Formulaire -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            <i class="lnr lnr-pencil mr-2 text-primary"></i> Paramètres du Compte
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('newUser2', 'mode='.($_GET['mode'] ?? 'Modifier').'&idUser='.$idUser) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name" class="font-weight-bold text-dark">
                                        Nom et Prénoms <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="{{ $user->name ?? old('name') }}" placeholder="Nom et Prénoms" required>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="telUser" class="font-weight-bold text-dark">
                                        Téléphone <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="telUser" name="telUser" 
                                           value="{{ $tel ?? old('telUser') }}" placeholder="Ex : 0102030405" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="email" class="font-weight-bold text-dark">
                                        Adresse Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ $user->email ?? old('email') }}" placeholder="name@exemple.com" required>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="username" class="font-weight-bold text-dark">
                                        Identifiant (Login) <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           value="{{ $user->username ?? old('username') }}" required>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded mb-4 border">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    <i class="lnr lnr-lock mr-1 text-primary"></i> Sécurité & Mot de passe
                                </h6>
                                <small class="text-muted d-block mb-3">
                                    Laissez vide si vous ne souhaitez pas modifier votre mot de passe actuel.
                                </small>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-0">
                                        <label for="password" class="small font-weight-bold text-dark">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Min. 6 caractères">
                                    </div>
                                    <div class="col-md-6 form-group mb-0">
                                        <label for="password_confirmation" class="small font-weight-bold text-dark">Confirmer le mot de passe</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Répéter le mot de passe">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end pt-3 border-top">
                                @if(isset($_GET['mode']) && $_GET['mode'] == "Modifier")
                                    <a href="{{ route('profil') }}" class="btn btn-light mr-2">Annuler</a>
                                @else
                                    <a href="{{ route('accueil') }}" class="btn btn-light mr-2">Annuler</a>
                                @endif
                                <button type="submit" class="btn btn-success px-4 font-weight-bold">
                                    <i class="lnr lnr-check mr-1"></i> Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
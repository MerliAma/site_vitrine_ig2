@extends(Auth::check() ? 'Layouts/admin/baseAdmin' : 'Layouts/admin/baseAdmin2', ['title' => 'Modifier mon Profil'])

@section('contenu')
<?php
    use App\User;
    use App\role;
    $role = role::all();
    $mode = request()->input('mode', $_GET['mode'] ?? 'Modifier');
    $idUser = request()->input('idUser', $_GET['idUser'] ?? (Auth::check() ? Auth::id() : null));

    if (User::count() == 0) {
        $actionNewU = "Bienvenue, veuillez vous enregistrer pour continuer";
        $subTitle = "Initialisation du compte administrateur principal";
        $idUser = null;
        $user = null;
        $tel = null;
        $isSelf = false;
    } else if ($idUser) {
        $user = User::find($idUser);
        $isSelf = Auth::check() && Auth::id() == $idUser;
        $actionNewU = $isSelf ? "Modification de mon Profil" : "Modifier l'Utilisateur : " . ($user ? $user->name : '');
        $subTitle = $isSelf ? "Mettez à jour vos coordonnées et votre mot de passe" : "Mettez à jour les coordonnées et accès de cet utilisateur";
        $tel = $user ? preg_replace('/\D/', '', $user->telUser) : '';
    } else {
        $actionNewU = "Modification de profil";
        $subTitle = "Mise à jour des informations";
        $user = Auth::user();
        $idUser = $user ? $user->id : null;
        $tel = $user ? preg_replace('/\D/', '', $user->telUser) : '';
        $isSelf = true;
    }
?>

@if(Auth::check())
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
@else
<div class="container" style="padding-top: 1.5rem; padding-bottom: 3rem;">
@endif

    <!-- Header de page -->
    <div class="admin-page-header">
        <div>
            <h2 class="h3 font-weight-bold text-dark mb-1" style="margin: 0; font-size: 1.5rem; color: var(--ig-secondary, #1A3A6B);">
                <i class="lnr lnr-user text-primary" style="margin-right: 6px;"></i> {{ $actionNewU }}
            </h2>
            <p class="text-muted mb-0" style="margin: 4px 0 0; font-size: 0.9375rem; color: var(--ig-text-muted, #64748B);">
                {{ $subTitle }}
            </p>
        </div>
        <div>
            @if(Auth::check() && $idUser && $idUser != Auth::id())
                <a href="{{ route('user') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 16px; font-weight: 600; box-shadow: var(--ig-shadow-xs);">
                    <i class="lnr lnr-arrow-left" style="margin-right: 6px;"></i> Retour aux utilisateurs
                </a>
            @elseif(Auth::check())
                <a href="{{ route('profil') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 16px; font-weight: 600; box-shadow: var(--ig-shadow-xs);">
                    <i class="lnr lnr-arrow-left" style="margin-right: 6px;"></i> Retour à mon profil
                </a>
            @else
                <a href="{{ route('accueil') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 16px; font-weight: 600; box-shadow: var(--ig-shadow-xs);">
                    <i class="lnr lnr-arrow-left" style="margin-right: 6px;"></i> Retour au site
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
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
            <div class="panel" style="border-radius: var(--ig-radius-lg, 12px); border: 1px solid var(--ig-border, #E2E8F0); box-shadow: var(--ig-shadow-xs); background: #fff; margin-bottom: 2rem;">
                <div class="panel-heading" style="background: #fff; border-bottom: 1px solid var(--ig-border, #E2E8F0); padding: 1.25rem 1.5rem; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h3 class="panel-title" style="margin: 0; font-size: 1.125rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">
                        <i class="lnr lnr-pencil text-primary" style="margin-right: 6px;"></i> Paramètres & Sécurité du Compte
                    </h3>
                </div>
                <div class="panel-body" style="padding: 1.75rem 1.5rem;">
                    <form action="{{ route('newUser2', ['mode' => 'Modifier', 'idUser' => $idUser]) }}" method="post">
                        @csrf
                        <input type="hidden" name="mode" value="Modifier">
                        <input type="hidden" name="idUser" value="{{ $idUser }}">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 6px;">
                                    Nom et Prénoms <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name', $user->name ?? '') }}" placeholder="Nom et Prénoms" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="telUser" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 6px;">
                                    Téléphone (10 chiffres) <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="telUser" name="telUser" 
                                       value="{{ old('telUser', $tel) }}" placeholder="Ex : 0777585264" maxlength="14" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 6px;">
                                    Adresse Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $user->email ?? '') }}" placeholder="name@exemple.com" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="username" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 6px;">
                                    Identifiant (Login) <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="{{ old('username', $user->username ?? '') }}" required>
                            </div>
                        </div>

                        @if(Auth::check() && $idUser && $idUser != Auth::id())
                            <div class="form-group" style="margin-top: 0.5rem; margin-bottom: 1.25rem;">
                                <label for="role_id" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 6px;">
                                    Rôle & Privilèges <span class="text-danger">*</span>
                                </label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach($role as $r)
                                        <option value="{{ $r->id }}" {{ ($user && $user->role_id == $r->id) ? 'selected' : '' }}>
                                            {{ $r->libelle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div style="margin-top: 1.5rem; margin-bottom: 1.5rem; padding: 1.25rem; background: var(--ig-surface-muted, #F8FAFC); border: 1px solid var(--ig-border, #E2E8F0); border-radius: var(--ig-radius-md, 8px);">
                            <h5 style="margin: 0 0 4px; font-weight: 700; color: var(--ig-secondary, #1A3A6B); font-size: 0.9375rem;">
                                <i class="lnr lnr-lock text-primary" style="margin-right: 4px;"></i> Sécurité & Mot de passe
                            </h5>
                            <small class="text-muted" style="display: block; margin-bottom: 1rem; font-size: 0.8125rem;">
                                Laissez vide si vous ne souhaitez pas modifier le mot de passe actuel.
                            </small>
                            <div class="row">
                                <div class="col-md-6 form-group" style="margin-bottom: 0;">
                                    <label for="password" style="font-size: 0.8125rem; font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 4px;">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Min. 6 caractères">
                                </div>
                                <div class="col-md-6 form-group" style="margin-bottom: 0;">
                                    <label for="password_confirmation" style="font-size: 0.8125rem; font-weight: 600; color: var(--ig-secondary, #1A3A6B); margin-bottom: 4px;">Confirmer le mot de passe</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Répéter le mot de passe">
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; justify-content: flex-end; gap: 10px; padding-top: 1.25rem; border-top: 1px solid var(--ig-border, #E2E8F0);">
                            @if(Auth::check() && $idUser && $idUser != Auth::id())
                                <a href="{{ route('user') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 18px; font-weight: 600;">Annuler</a>
                            @elseif(Auth::check())
                                <a href="{{ route('profil') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 18px; font-weight: 600;">Annuler</a>
                            @else
                                <a href="{{ route('accueil') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 18px; font-weight: 600;">Annuler</a>
                            @endif
                            <button type="submit" class="btn btn-success" style="border-radius: var(--ig-radius-md, 8px); padding: 8px 22px; font-weight: 600; box-shadow: var(--ig-shadow-xs);">
                                <i class="lnr lnr-check" style="margin-right: 6px;"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@if(Auth::check())
        </div>
    </div>
</div>
@else
</div>
@endif

@endsection
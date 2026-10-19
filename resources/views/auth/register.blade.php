@extends('Layouts/app', [
    'titre' => 'Création de Compte Administrateur',
    'sousTitre' => 'Enregistrement d\'un compte d\'accès au back-office INTER-GROUPE'
])

@section('content')

@if($errors->any())
    <div class="auth-alert auth-alert-danger" role="alert">
        <i class="fa fa-exclamation-circle auth-alert-icon" aria-hidden="true"></i>
        <div>Veuillez corriger les erreurs de saisie ci-dessous.</div>
    </div>
@endif

<form class="auth-form" action="{{ route('register') }}" method="POST">
    @csrf

    <input type="hidden" name="role_id" value="1">

    <div class="form-group auth-form-group">
        <label for="name" class="auth-label">
            Nom et Prénom(s) <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-id-card auth-input-icon" aria-hidden="true"></i>
            <input id="name" 
                   type="text" 
                   placeholder="Ex. Koffi Jean-Marc" 
                   class="form-control auth-input @error('name') is-invalid @enderror" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autocomplete="name" 
                   autofocus 
                   aria-required="true">
        </div>
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group auth-form-group">
        <label for="telUser" class="auth-label">
            Numéro de Téléphone <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-phone auth-input-icon" aria-hidden="true"></i>
            <input id="telUser" 
                   type="tel" 
                   placeholder="0701020304" 
                   class="form-control auth-input @error('telUser') is-invalid @enderror" 
                   name="telUser" 
                   value="{{ old('telUser') }}" 
                   required 
                   pattern="[0-9]{10}" 
                   maxlength="10" 
                   aria-required="true">
        </div>
        <small class="form-text text-muted mt-1">Format à 10 chiffres (standard ivoirien)</small>
        @error('telUser')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group auth-form-group">
        <label for="email" class="auth-label">
            Adresse E-mail <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-envelope auth-input-icon" aria-hidden="true"></i>
            <input id="email" 
                   type="email" 
                   placeholder="admin@intergroupe-ci.com" 
                   class="form-control auth-input @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="email" 
                   aria-required="true">
        </div>
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group auth-form-group">
        <label for="username" class="auth-label">
            Identifiant de Connexion (Login) <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-user auth-input-icon" aria-hidden="true"></i>
            <input id="username" 
                   type="text" 
                   placeholder="Ex. jkoffi" 
                   maxlength="20" 
                   class="form-control auth-input @error('username') is-invalid @enderror" 
                   name="username" 
                   value="{{ old('username') }}" 
                   required 
                   autocomplete="username" 
                   aria-required="true">
        </div>
        @error('username')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group auth-form-group">
        <label for="password" class="auth-label">
            Mot de Passe <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-lock auth-input-icon" aria-hidden="true"></i>
            <input id="password" 
                   type="password" 
                   placeholder="Minimum 6 caractères" 
                   class="form-control auth-input @error('password') is-invalid @enderror" 
                   name="password" 
                   required 
                   autocomplete="new-password" 
                   aria-required="true">
        </div>
        @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group auth-form-group">
        <label for="password-confirm" class="auth-label">
            Confirmation du Mot de Passe <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-check-circle auth-input-icon" aria-hidden="true"></i>
            <input id="password-confirm" 
                   type="password" 
                   placeholder="Confirmer mot de passe" 
                   class="form-control auth-input" 
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password" 
                   aria-required="true">
        </div>
    </div>

    <button type="submit" class="btn btn-auth-submit mt-4">
        <i class="fa fa-user-plus" aria-hidden="true"></i>
        <span>Enregistrer le compte</span>
    </button>

    <div class="auth-footer-links">
        <span class="text-muted">Vous possédez déjà un compte ?</span>
        <a href="{{ route('login') }}" class="auth-back-link ml-1">
            Se connecter
        </a>
    </div>
</form>
@endsection

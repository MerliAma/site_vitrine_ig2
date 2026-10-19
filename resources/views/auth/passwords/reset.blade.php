@extends('Layouts/app', [
    'titre' => 'Nouveau Mot de Passe',
    'sousTitre' => 'Définissez votre nouveau mot de passe d\'accès administrateur'
])

@section('content')

@if($errors->any())
    <div class="auth-alert auth-alert-danger" role="alert">
        <i class="fa fa-exclamation-circle auth-alert-icon" aria-hidden="true"></i>
        <div>
            @if($errors->has('email'))
                {{ $errors->first('email') }}
            @elseif($errors->has('password'))
                {{ $errors->first('password') }}
            @else
                Veuillez corriger les informations saisies.
            @endif
        </div>
    </div>
@endif

<form class="auth-form" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group auth-form-group">
        <label for="email" class="auth-label">
            Adresse E-mail <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-envelope auth-input-icon" aria-hidden="true"></i>
            <input id="email" 
                   type="email" 
                   placeholder="nom@intergroupe-ci.com" 
                   class="form-control auth-input @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ $email ?? old('email') }}" 
                   required 
                   autocomplete="email" 
                   autofocus 
                   aria-required="true">
        </div>
    </div>

    <div class="form-group auth-form-group">
        <label for="password" class="auth-label">
            Nouveau Mot de Passe <span class="required-star" aria-hidden="true">*</span>
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
        <small class="form-text text-muted mt-1">Au moins 6 caractères avec chiffres et lettres.</small>
    </div>

    <div class="form-group auth-form-group">
        <label for="password-confirm" class="auth-label">
            Confirmer le Nouveau Mot de Passe <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-check-circle auth-input-icon" aria-hidden="true"></i>
            <input id="password-confirm" 
                   type="password" 
                   placeholder="Retapez le mot de passe" 
                   class="form-control auth-input" 
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password" 
                   aria-required="true">
        </div>
    </div>

    <button type="submit" class="btn btn-auth-submit mt-4">
        <i class="fa fa-key" aria-hidden="true"></i>
        <span>Enregistrer le nouveau mot de passe</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="auth-back-link">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

@extends('Layouts/app', [
    'titre' => 'Réinitialisation du Mot de Passe',
    'sousTitre' => 'Indiquez votre adresse e-mail professionnelle pour recevoir un lien sécurisé'
])

@section('content')

@if (session('status'))
    <div class="auth-alert auth-alert-success" role="alert">
        <i class="fa fa-check-circle auth-alert-icon" aria-hidden="true"></i>
        <div>{{ session('status') }}</div>
    </div>
@endif

@error('email')
    <div class="auth-alert auth-alert-danger" role="alert">
        <i class="fa fa-exclamation-circle auth-alert-icon" aria-hidden="true"></i>
        <div>{{ $message }}</div>
    </div>
@enderror

<form class="auth-form" method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group auth-form-group">
        <label for="email" class="auth-label">
            Adresse E-mail Associée <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-envelope auth-input-icon" aria-hidden="true"></i>
            <input id="email" 
                   type="email" 
                   placeholder="Ex: nom@intergroupe-ci.com" 
                   class="form-control auth-input @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="email" 
                   autofocus 
                   aria-required="true">
        </div>
        <small class="form-text text-muted mt-2">
            Un courrier électronique contenant le lien de réinitialisation vous sera adressé si l'adresse est enregistrée.
        </small>
    </div>

    <button type="submit" class="btn btn-auth-submit mt-4">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        <span>Envoyer le lien de réinitialisation</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="auth-back-link">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

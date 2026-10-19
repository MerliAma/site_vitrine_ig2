@extends('Layouts/app', [
    'titre' => 'Zone Protégée',
    'sousTitre' => 'Veuillez confirmer votre mot de passe avant de continuer'
])

@section('content')

@error('password')
    <div class="auth-alert auth-alert-danger" role="alert">
        <i class="fa fa-exclamation-circle auth-alert-icon" aria-hidden="true"></i>
        <div>{{ $message }}</div>
    </div>
@enderror

<form class="auth-form" method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="form-group auth-form-group">
        <label for="password" class="auth-label">
            Mot de Passe Actuel <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-lock auth-input-icon" aria-hidden="true"></i>
            <input id="password" 
                   type="password" 
                   placeholder="Votre mot de passe actuel" 
                   class="form-control auth-input @error('password') is-invalid @enderror" 
                   name="password" 
                   required 
                   autocomplete="current-password" 
                   autofocus 
                   aria-required="true">
        </div>
    </div>

    <div class="auth-options-row">
        <span></span>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-forgot-link">
                Mot de passe oublié ?
            </a>
        @endif
    </div>

    <button type="submit" class="btn btn-auth-submit">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        <span>Confirmer l'accès</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="auth-back-link">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

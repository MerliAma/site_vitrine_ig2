@extends('Layouts/app', [
    'titre' => 'Nouveau Mot de Passe',
    'sousTitre' => 'Définissez votre nouveau mot de passe d\'accès administrateur'
])

@section('content')

@if($errors->any())
    <div class="alert alert-danger py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-circle mr-2 text-danger" aria-hidden="true"></i>
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

<form class="form-auth-small" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group mb-3">
        <label for="email" class="control-label font-weight-bold">
            Adresse E-mail <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-envelope text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input id="email" type="email" placeholder="nom@intergroupe-ci.com" class="form-control border-left-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus aria-required="true">
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="password" class="control-label font-weight-bold">
            Nouveau Mot de Passe <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-lock text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input id="password" type="password" placeholder="Minimum 6 caractères" class="form-control border-left-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-required="true">
        </div>
        <small class="form-text text-muted mt-1">Au moins 6 caractères recommandés avec chiffres et lettres.</small>
    </div>

    <div class="form-group mb-4">
        <label for="password-confirm" class="control-label font-weight-bold">
            Confirmer le Nouveau Mot de Passe <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-check-circle text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input id="password-confirm" type="password" placeholder="Retapez le mot de passe" class="form-control border-left-0" name="password_confirmation" required autocomplete="new-password" aria-required="true">
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
        <i class="fa fa-key mr-2" aria-hidden="true"></i>
        <span>Enregistrer le nouveau mot de passe</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="text-primary font-weight-bold">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

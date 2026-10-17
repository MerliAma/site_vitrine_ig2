@extends('Layouts/app', [
    'titre' => 'Zone Protégée',
    'sousTitre' => 'Veuillez confirmer votre mot de passe avant de continuer'
])

@section('content')

@error('password')
    <div class="alert alert-danger py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-circle mr-2 text-danger" aria-hidden="true"></i>
        <div>
            {{ $message }}
        </div>
    </div>
@enderror

<form class="form-auth-small" method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="password" class="control-label font-weight-bold">
            Mot de Passe Actuel <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-lock text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input id="password" type="password" placeholder="Mot de passe" class="form-control border-left-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus aria-required="true">
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="small font-weight-bold text-primary">
                Mot de passe oublié ?
            </a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
        <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>
        <span>Confirmer l'accès</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="text-muted">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

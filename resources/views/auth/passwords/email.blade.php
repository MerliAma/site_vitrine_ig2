@extends('Layouts/app', [
    'titre' => 'Réinitialisation du Mot de Passe',
    'sousTitre' => 'Indiquez votre adresse e-mail professionnelle pour recevoir un lien sécurisé'
])

@section('content')

@if (session('status'))
    <div class="alert alert-success py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-check-circle mr-2 text-success" aria-hidden="true"></i>
        <div>
            {{ session('status') }}
        </div>
    </div>
@endif

@error('email')
    <div class="alert alert-danger py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-circle mr-2 text-danger" aria-hidden="true"></i>
        <div>
            {{ $message }}
        </div>
    </div>
@enderror

<form class="form-auth-small" method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="email" class="control-label font-weight-bold">
            Adresse E-mail Associée <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-envelope text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input id="email" type="email" placeholder="nom@intergroupe-ci.com" class="form-control border-left-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-required="true">
        </div>
        <small class="form-text text-muted mt-1">
            Un courrier électronique contenant le lien de réinitialisation vous sera adressé si l'adresse est enregistrée.
        </small>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm mt-4">
        <i class="fa fa-paper-plane mr-2" aria-hidden="true"></i>
        <span>Envoyer le lien de réinitialisation</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="text-primary font-weight-bold">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@endsection

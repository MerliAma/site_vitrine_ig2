@extends('Layouts/app', [
    'titre' => 'Création de Compte Administrateur',
    'sousTitre' => 'Enregistrement d\'un compte d\'accès au back-office INTER-GROUPE'
])

@section('content')

@if($errors->any())
    <div class="alert alert-danger py-2 px-3 mb-3 small" role="alert">
        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
        Veuillez corriger les erreurs de saisie ci-dessous.
    </div>
@endif

<form class="form-auth-small" action="{{ route('register') }}" method="POST">
    @csrf

    <input type="hidden" name="role_id" value="1">

    <div class="form-group mb-2">
        <label for="name" class="control-label font-weight-bold">
            Nom et Prénom(s) <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <input id="name" type="text" placeholder="Ex. Koffi Jean-Marc" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus aria-required="true">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="telUser" class="control-label font-weight-bold">
            Numéro de Téléphone <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <input id="telUser" type="tel" placeholder="0701020304" class="form-control @error('telUser') is-invalid @enderror" name="telUser" value="{{ old('telUser') }}" required pattern="[0-9]{10}" maxlength="10" aria-required="true">
        <small class="form-text text-muted">Format à 10 chiffres (standard ivoirien)</small>
        @error('telUser')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="email" class="control-label font-weight-bold">
            Adresse E-mail <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <input id="email" type="email" placeholder="admin@intergroupe-ci.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" aria-required="true">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="username" class="control-label font-weight-bold">
            Identifiant de Connexion (Login) <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <input id="username" type="text" placeholder="Ex. jkoffi" maxlength="20" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" aria-required="true">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-row mb-3">
        <div class="col-md-6 mb-2">
            <label for="password" class="control-label font-weight-bold">
                Mot de Passe <span class="required-star text-danger" aria-hidden="true">*</span>
            </label>
            <input id="password" type="password" placeholder="Minimum 6 caractères" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-required="true">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <label for="password-confirm" class="control-label font-weight-bold">
                Confirmation <span class="required-star text-danger" aria-hidden="true">*</span>
            </label>
            <input id="password-confirm" type="password" placeholder="Confirmer mot de passe" class="form-control" name="password_confirmation" required autocomplete="new-password" aria-required="true">
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
        <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
        <span>Enregistrer le compte</span>
    </button>

    <div class="auth-footer-links">
        <span class="text-muted">Vous possédez déjà un compte ?</span>
        <a href="{{ route('login') }}" class="font-weight-bold text-primary ml-1">
            Se connecter
        </a>
    </div>
</form>
@endsection

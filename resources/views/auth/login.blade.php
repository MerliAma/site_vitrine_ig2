@extends('Layouts/app', [
    'titre' => 'Connexion à l\'Espace Gestion',
    'sousTitre' => 'Veuillez saisir vos identifiants pour accéder au back-office'
])

@section('content')

@if($errors->has('email') || $errors->has('password'))
    <div class="alert alert-danger py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-circle mr-2 fa-lg text-danger" aria-hidden="true"></i>
        <div>
            Identifiant ou mot de passe incorrect.
        </div>
    </div>
@endif

@error('logout')
    <div class="alert alert-warning py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-lock mr-2 text-warning" aria-hidden="true"></i>
        <div>
            {{ $message }}
        </div>
    </div>
@enderror

@if(session('status'))
    <div class="alert alert-success py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-check-circle mr-2 text-success" aria-hidden="true"></i>
        <div>
            {{ session('status') }}
        </div>
    </div>
@endif

<form class="form-auth-small" action="{{ route('login') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="email" class="control-label font-weight-bold">
            Identifiant ou Adresse E-mail <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0">
                    <i class="fa fa-user text-muted" aria-hidden="true"></i>
                </span>
            </div>
            <input type="text" id="email" placeholder="Login ou nom@intergroupe-ci.com" class="form-control border-left-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-required="true">
        </div>
    </div>

    <div class="form-group mb-2">
        <label for="password" class="control-label font-weight-bold">
            Mot de Passe <span class="required-star text-danger" aria-hidden="true">*</span>
        </label>
        <div class="password-toggle-wrapper">
            <input id="password" type="password" placeholder="Votre mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-required="true">
            <button type="button" class="password-toggle-btn" id="togglePasswordBtn" aria-label="Afficher ou masquer le mot de passe" onclick="togglePasswordVisibility()">
                <i class="fa fa-eye" id="togglePasswordIcon" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4 mt-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label small text-muted font-weight-500" for="remember">
                Se souvenir de moi
            </label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="small font-weight-bold text-primary">
                Mot de passe oublié ?
            </a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
        <i class="fa fa-sign-in mr-2" aria-hidden="true"></i>
        <span>Se connecter</span>
    </button>

    @php
        use App\User;
    @endphp
    @if(User::count() == 0)
        <div class="alert alert-info mt-3 p-2 text-center small border-0" style="background-color: var(--ig-info-bg, #EFF6FF); color: var(--ig-info-text, #1E3A8A);">
            <i class="fa fa-info-circle mr-1" aria-hidden="true"></i>
            Premier démarrage : 
            <a href="{{ route('modifPro', 'mode=new') }}" class="font-weight-bold text-primary ml-1">
                Créer le compte administrateur initial &rarr;
            </a>
        </div>
    @endif

    <div class="auth-footer-links">
        <a href="{{ route('accueil') }}" class="text-muted">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour au site public INTER-GROUPE
        </a>
    </div>
</form>

<script>
    function togglePasswordVisibility() {
        var pwdField = document.getElementById('password');
        var icon = document.getElementById('togglePasswordIcon');
        if (pwdField.type === 'password') {
            pwdField.type = 'text';
            icon.className = 'fa fa-eye-slash';
        } else {
            pwdField.type = 'password';
            icon.className = 'fa fa-eye';
        }
    }
</script>
@endsection

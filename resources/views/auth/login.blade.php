@extends('Layouts/app', [
    'titre' => 'Connexion à l\'Espace Gestion',
    'sousTitre' => 'Veuillez saisir vos identifiants pour accéder au back-office'
])

@section('content')

@if($errors->has('email') || $errors->has('password'))
    <div class="auth-alert auth-alert-danger" role="alert">
        <i class="fa fa-exclamation-circle auth-alert-icon" aria-hidden="true"></i>
        <div>Identifiant ou mot de passe incorrect.</div>
    </div>
@endif

@error('logout')
    <div class="auth-alert auth-alert-warning" role="alert">
        <i class="fa fa-lock auth-alert-icon" aria-hidden="true"></i>
        <div>{{ $message }}</div>
    </div>
@enderror

@if(session('status'))
    <div class="auth-alert auth-alert-success" role="alert">
        <i class="fa fa-check-circle auth-alert-icon" aria-hidden="true"></i>
        <div>{{ session('status') }}</div>
    </div>
@endif

<form class="auth-form" action="{{ route('login') }}" method="POST">
    @csrf

    <!-- Champ 1 : Identifiant ou Email (UNIFORME) -->
    <div class="form-group auth-form-group">
        <label for="email" class="auth-label">
            Identifiant ou Adresse E-mail <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group">
            <i class="fa fa-user auth-input-icon" aria-hidden="true"></i>
            <input type="text" 
                   id="email" 
                   placeholder="Login ou nom@intergroupe-ci.com" 
                   class="form-control auth-input @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="email" 
                   autofocus 
                   aria-required="true">
        </div>
    </div>

    <!-- Champ 2 : Mot de Passe (UNIFORME) -->
    <div class="form-group auth-form-group">
        <label for="password" class="auth-label">
            Mot de Passe <span class="required-star" aria-hidden="true">*</span>
        </label>
        <div class="auth-input-group has-toggle">
            <i class="fa fa-lock auth-input-icon" aria-hidden="true"></i>
            <input type="password" 
                   id="password" 
                   placeholder="Votre mot de passe" 
                   class="form-control auth-input @error('password') is-invalid @enderror" 
                   name="password" 
                   required 
                   autocomplete="current-password" 
                   aria-required="true">
            <button type="button" 
                    class="auth-password-toggle" 
                    id="togglePasswordBtn" 
                    aria-label="Afficher ou masquer le mot de passe" 
                    onclick="togglePasswordVisibility()">
                <i class="fa fa-eye" id="togglePasswordIcon" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <!-- Options : Se souvenir de moi & Mot de passe oublié -->
    <div class="auth-options-row">
        <label class="auth-checkbox" for="remember">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>Se souvenir de moi</span>
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-forgot-link">
                Mot de passe oublié ?
            </a>
        @endif
    </div>

    <!-- Bouton de connexion principal -->
    <button type="submit" class="btn btn-auth-submit">
        <i class="fa fa-sign-in" aria-hidden="true"></i>
        <span>Se connecter</span>
    </button>

    @php
        use App\User;
    @endphp
    @if(User::count() == 0)
        <div class="auth-init-box">
            <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
            <div>
                <strong>Premier démarrage :</strong><br>
                <a href="{{ route('modifPro', 'mode=new') }}" class="auth-init-link">
                    Créer le compte administrateur initial &rarr;
                </a>
            </div>
        </div>
    @endif

    <!-- Lien retour site public -->
    <div class="auth-footer-links">
        <a href="{{ route('accueil') }}" class="auth-back-link">
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

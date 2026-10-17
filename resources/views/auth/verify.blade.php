@extends('Layouts/app', [
    'titre' => 'Vérification de votre E-mail',
    'sousTitre' => 'Sécurisation de votre compte administrateur INTER-GROUPE'
])

@section('content')

@if (session('resent'))
    <div class="alert alert-success py-2 px-3 mb-3 small d-flex align-items-center" role="alert">
        <i class="fa fa-check-circle mr-2 text-success" aria-hidden="true"></i>
        <div>
            Un nouveau lien de vérification a été transmis à votre adresse électronique.
        </div>
    </div>
@endif

<div class="text-left mb-4">
    <p class="text-muted" style="font-size: 0.9375rem; line-height: 1.6;">
        Avant de pouvoir accéder au tableau de bord, veuillez vérifier vos courriers électroniques et cliquer sur le lien de confirmation que nous venons de vous expédier.
    </p>
    <p class="small text-muted mb-0">
        Si vous n'avez pas reçu ce message sous quelques minutes, vous pouvez solliciter l'envoi d'un nouveau lien ci-dessous.
    </p>
</div>

@if (Route::has('verification.resend'))
<form class="form-auth-small" method="POST" action="{{ route('verification.resend') }}">
    @csrf

    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
        <i class="fa fa-paper-plane mr-2" aria-hidden="true"></i>
        <span>Renvoyer l'e-mail de confirmation</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="text-muted">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@else
<div class="auth-footer-links">
    <a href="{{ route('login') }}" class="btn btn-primary btn-block text-white">
        <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la page de connexion
    </a>
</div>
@endif

@endsection

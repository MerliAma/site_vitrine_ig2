@extends('Layouts/app', [
    'titre' => 'Vérification de votre E-mail',
    'sousTitre' => 'Sécurisation de votre compte administrateur INTER-GROUPE'
])

@section('content')

@if (session('resent'))
    <div class="auth-alert auth-alert-success" role="alert">
        <i class="fa fa-check-circle auth-alert-icon" aria-hidden="true"></i>
        <div>Un nouveau lien de vérification a été transmis à votre adresse électronique.</div>
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
<form class="auth-form" method="POST" action="{{ route('verification.resend') }}">
    @csrf

    <button type="submit" class="btn btn-auth-submit">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        <span>Renvoyer l'e-mail de confirmation</span>
    </button>

    <div class="auth-footer-links">
        <a href="{{ route('login') }}" class="auth-back-link">
            <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la connexion
        </a>
    </div>
</form>
@else
<div class="auth-footer-links">
    <a href="{{ route('login') }}" class="btn btn-auth-submit text-white">
        <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Retour à la page de connexion
    </a>
</div>
@endif

@endsection

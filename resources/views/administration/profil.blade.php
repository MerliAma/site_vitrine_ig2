@extends('Layouts/admin/baseAdmin', ['title' => 'Mon Profil'])

@section('contenu')
@php
    use App\role;
    $idUser = Auth::user()->id;
    $role = role::find(Auth::user()->role_id);
@endphp

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            
            <!-- EN-TÊTE PROFESSIONNEL DU PROFIL -->
            <div class="profile-header-panel">
                <div>
                    <h2 class="h3 font-weight-bold text-dark mb-1"> Mon Compte & Profil</h2>
                    <p style="font-size: 0.9375rem; color: var(--ig-text-muted, #64748B); margin: 0;">
                        Consultez et gérez vos identifiants d'accès au backoffice du Cabinet INTER-GROUPE.
                    </p>
                </div>
                <div>
                    <a href="{{ route('modifPro', ['mode' => 'Modifier', 'idUser' => $idUser]) }}" class="btn btn-primary" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600; padding: 9px 18px; box-shadow: var(--ig-shadow-xs);">
                        <i class="lnr lnr-pencil" style="margin-right: 6px;"></i> Modifier mes informations
                    </a>
                </div>
            </div>

            <!-- MESSAGE D'INFORMATION SUCCESS -->
            @if(isset($_GET['info']) && $_GET['info'] != "")
                <div class="alert alert-success alert-dismissible" role="alert" style="border-radius: var(--ig-radius-md, 8px); border: 1px solid var(--ig-success-border, #A7F3D0); background-color: var(--ig-success-bg, #ECFDF5); color: var(--ig-success-text, #065F46); margin-bottom: 1.75rem; padding: 14px 20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer" style="color: inherit; opacity: 0.8;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check-circle" style="margin-right: 8px;"></i> {{ $_GET['info'] }}
                </div>
            @endif

            <!-- GRILLE DE PROFIL -->
            <div class="row">
                
                <!-- COLONNE GAUCHE : CARTE D'IDENTITÉ ADMINISTRATEUR -->
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="profile-identity-card">
                        
                        <!-- Avatar avec initiale bien centrée -->
                        <div class="profile-avatar-large">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <!-- Nom & Identifiant -->
                        <h3 class="profile-user-title">{{ Auth::user()->name }}</h3>
                        <div>
                            <span class="profile-username-tag">{{ '@' . Auth::user()->username }}</span>
                        </div>

                        <!-- Badge de rôle -->
                        <div style="margin-bottom: 1.25rem;">
                            <span class="badge-status badge-status-success" style="font-size: 0.8125rem; padding: 6px 14px;">
                                <i class="fa fa-shield" style="margin-right: 4px;"></i> {{ $role->libelle ?? 'Administrateur' }}
                            </span>
                        </div>

                        <!-- Métadonnées & Accès -->
                        <div class="profile-meta-list">
                            <div class="profile-meta-item">
                                <i class="lnr lnr-calendar-full"></i>
                                <div>
                                    <span style="font-size: 0.8125rem; color: var(--ig-text-muted);">Membre depuis :</span><br>
                                    <strong>{{ Auth::user()->created_at ? Auth::user()->created_at->format('d/m/Y') : 'Historique système' }}</strong>
                                </div>
                            </div>
                            <div class="profile-meta-item">
                                <i class="lnr lnr-checkmark-circle text-success"></i>
                                <div>
                                    <span style="font-size: 0.8125rem; color: var(--ig-text-muted);">Statut du compte :</span><br>
                                    <strong class="text-success">Actif &bull; Autorisé</strong>
                                </div>
                            </div>
                            <div class="profile-meta-item">
                                <i class="lnr lnr-apartment"></i>
                                <div>
                                    <span style="font-size: 0.8125rem; color: var(--ig-text-muted);">Établissement :</span><br>
                                    <strong>Cabinet INTER-GROUPE</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton secondaire de sécurité -->
                        <div style="margin-top: 1.5rem;">
                            <a href="{{ route('modifPro', ['mode' => 'Modifier', 'idUser' => $idUser]) }}" class="btn btn-default btn-block" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
                                <i class="fa fa-key text-warning" style="margin-right: 6px;"></i> Changer de mot de passe
                            </a>
                        </div>

                    </div>
                </div>

                <!-- COLONNE DROITE : COORDONNÉES & DÉTAILS D'ACCÈS -->
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="profile-details-panel">
                        
                        <div class="profile-details-heading">
                            <h4>
                                <i class="lnr lnr-user text-primary"></i> Coordonnées & Droits d'Accès
                            </h4>
                            <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: var(--ig-text-muted); font-weight: 700;">
                                Session active
                            </span>
                        </div>

                        <!-- Liste structurée avec espacements réguliers -->
                        <div>
                            
                            <!-- 1. Nom & Prénoms -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-user"></i> Nom et Prénoms :
                                </div>
                                <div class="profile-info-value">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>

                            <!-- 2. Login -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-id-badge"></i> Identifiant (Login) :
                                </div>
                                <div class="profile-info-value">
                                    <code style="font-size: 0.875rem; padding: 3px 8px; background: var(--ig-surface-muted); border-radius: var(--ig-radius-sm, 4px);">{{ Auth::user()->username }}</code>
                                </div>
                            </div>

                            <!-- 3. Email -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-envelope"></i> Adresse Email :
                                </div>
                                <div class="profile-info-value">
                                    <a href="mailto:{{ Auth::user()->email }}" style="color: var(--ig-primary); text-decoration: none;">
                                        {{ Auth::user()->email }} <i class="fa fa-external-link" style="font-size: 0.75rem; margin-left: 4px;"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- 4. Téléphone -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-phone"></i> Téléphone :
                                </div>
                                <div class="profile-info-value">
                                    @if(Auth::user()->telUser)
                                        <span>{{ Auth::user()->telUser }}</span>
                                    @else
                                        <span style="color: var(--ig-text-muted); font-style: italic; font-weight: normal;">Non renseigné</span>
                                    @endif
                                </div>
                            </div>

                            <!-- 5. Privilèges -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-shield"></i> Privilèges système :
                                </div>
                                <div class="profile-info-value">
                                    <span class="badge-status badge-status-info" style="font-size: 0.8125rem; padding: 4px 10px;">
                                        {{ $role->libelle ?? 'Admin' }}
                                    </span>
                                </div>
                            </div>

                            <!-- 6. Sécurité -->
                            <div class="profile-info-row">
                                <div class="profile-info-label">
                                    <i class="fa fa-lock"></i> Sécurité du compte :
                                </div>
                                <div class="profile-info-value" style="font-weight: normal; font-size: 0.875rem; color: var(--ig-text-muted);">
                                    <span class="text-success font-weight-bold"><i class="fa fa-check"></i> Mot de passe sécurisé</span> (chiffrement standard BCrypt)
                                </div>
                            </div>

                        </div>

                        <!-- Pied de panneau avec bouton d'action aligné -->
                        <div class="profile-actions-footer">
                            <span style="font-size: 0.8125rem; color: var(--ig-text-muted);">
                                <i class="fa fa-info-circle text-primary"></i> Pour modifier votre mot de passe ou téléphone, utilisez le bouton ci-contre.
                            </span>
                            <a href="{{ route('modifPro', ['mode' => 'Modifier', 'idUser' => $idUser]) }}" class="btn btn-primary" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600; padding: 8px 18px;">
                                <i class="lnr lnr-pencil" style="margin-right: 6px;"></i> Modifier le profil & mot de passe
                            </a>
                        </div>

                    </div>

                    <!-- PANNEAU D'INFORMATION SÉCURITÉ CONVIVIAL -->
                    <div class="panel" style="border-radius: var(--ig-radius-lg, 12px); border-left: 4px solid var(--ig-info, #1A3A6B);">
                        <div class="panel-body" style="padding: 1.25rem 1.5rem;">
                            <h4 style="font-size: 0.9375rem; font-weight: 700; color: var(--ig-secondary); margin-top: 0; margin-bottom: 0.35rem; display: flex; align-items: center; gap: 8px;">
                                <span>🔒</span> Recommandation de sécurité pour l'administration
                            </h4>
                            <p style="font-size: 0.8125rem; color: var(--ig-text-muted); margin: 0; line-height: 1.5;">
                                En tant qu'administrateur du cabinet INTER-GROUPE, veillez à ne pas partager vos accès. Pensez à renouveler régulièrement votre mot de passe et à toujours vous déconnecter lorsque vous quittez votre poste.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection
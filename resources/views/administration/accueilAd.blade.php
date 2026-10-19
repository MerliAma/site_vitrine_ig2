@extends('Layouts/admin/baseAdmin',['title'=>'Dashboard'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<!-- EN-TÊTE CONVIVIAL DU TABLEAU DE BORD -->
			<div class="panel panel-headline" style="border-left: 4px solid var(--ig-primary, #0A6E3F);">
				<div class="panel-heading" style="padding-bottom: 0.75rem;">
					<div class="row" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
						<div class="col-sm-8 col-xs-12">
							<h3 class="panel-title" style="font-size: 1.45rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin: 0 0 6px 0;">
								Bonjour, {{ Auth::user()->name ?? Auth::user()->username ?? 'Administrateur' }} 👋
							</h3>
							<p class="panel-subtitle" style="font-size: 0.9375rem; color: var(--ig-text-muted, #64748B); margin: 0;">
								<i class="fa fa-calendar-check-o text-success"></i> Aujourd'hui, {{ date('d/m/Y') }} &mdash; Cabinet INTER-GROUPE (Treichville, Abidjan)
							</p>
						</div>
						<div class="col-sm-4 col-xs-12 text-right" style="margin-top: 8px;">
							<span class="badge-status badge-status-success" style="font-size: 0.8125rem; padding: 6px 14px; display: inline-flex; align-items: center; gap: 6px;">
								<span>🛡️</span> Session active &bull; {{ Auth::user()->role->libelle ?? 'Administration' }}
							</span>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding-top: 0.85rem;">
					<p style="margin: 0; color: var(--ig-text, #1E293B); font-size: 0.9375rem; line-height: 1.55;">
						Bienvenue sur l'espace d'administration et de pilotage du cabinet. Retrouvez ci-dessous la synthèse en temps réel des demandes reçues, les sessions programmées et vos raccourcis de gestion prioritaires.
					</p>
				</div>
			</div>

			<!-- CARTES D'INDICATEURS CLÉS HAUTE VISIBILITÉ (Avec Émoticônes & Données réelles) -->
			<div class="row">
				<!-- 1. Formation Continue -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('dmdForm') }}" class="kpi-card kpi-card-formation" title="Gérer les demandes de formation continue">
						<div class="kpi-card-header">
							<div class="kpi-emoji-box">🎓</div>
							<span class="kpi-tag">Formation</span>
						</div>
						<div class="kpi-card-body">
							<div class="kpi-number">{{ $nbdmdform }}</div>
							<h4 class="kpi-title">Demandes Formation</h4>
							<span class="kpi-subtitle">Salariés & Entreprises</span>
						</div>
						<div class="kpi-card-footer">
							<span>Traiter les demandes</span>
							<i class="fa fa-arrow-right"></i>
						</div>
					</a>
				</div>

				<!-- 2. Prestations d'Ingénierie -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('dmdPrest') }}" class="kpi-card kpi-card-prestation" title="Gérer les demandes de prestations d'ingénierie">
						<div class="kpi-card-header">
							<div class="kpi-emoji-box">💻</div>
							<span class="kpi-tag">Ingénierie</span>
						</div>
						<div class="kpi-card-body">
							<div class="kpi-number">{{ $nbdmdprest }}</div>
							<h4 class="kpi-title">Demandes Prestation</h4>
							<span class="kpi-subtitle">Logiciels, Sage & Audit</span>
						</div>
						<div class="kpi-card-footer">
							<span>Consulter les dossiers</span>
							<i class="fa fa-arrow-right"></i>
						</div>
					</a>
				</div>

				<!-- 3. Sessions & Événements programmés -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('evenements') }}" class="kpi-card kpi-card-event" title="Consulter le calendrier des formations et séminaires">
						<div class="kpi-card-header">
							<div class="kpi-emoji-box">📅</div>
							<span class="kpi-tag">Calendrier</span>
						</div>
						<div class="kpi-card-body">
							<div class="kpi-number">{{ $nbEvent }}</div>
							<h4 class="kpi-title">Sessions & Séminaires</h4>
							<span class="kpi-subtitle">Formations actives en ligne</span>
						</div>
						<div class="kpi-card-footer">
							<span>Gérer le calendrier</span>
							<i class="fa fa-arrow-right"></i>
						</div>
					</a>
				</div>

				<!-- 4. Boîte de réception & Suggestions -->
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('suggestions') }}" class="kpi-card kpi-card-suggestion" title="Consulter les suggestions et messages du public">
						<div class="kpi-card-header">
							<div class="kpi-emoji-box">📬</div>
							<span class="kpi-tag">Messages</span>
						</div>
						<div class="kpi-card-body">
							<div class="kpi-number">{{ $nbSugNonLu ?? 0 }}</div>
							<h4 class="kpi-title">Boîte de réception</h4>
							<span class="kpi-subtitle">Messages non lus reçus</span>
						</div>
						<div class="kpi-card-footer">
							<span>Ouvrir les messages</span>
							<i class="fa fa-arrow-right"></i>
						</div>
					</a>
				</div>
			</div>

			<!-- CONTENU PRINCIPAL DU TABLEAU DE BORD -->
			<div class="row">
				<!-- Colonne de gauche : Tâches & Raccourcis -->
				<div class="col-md-8 col-sm-12">
					
					<!-- GUIDE OPÉRATIONNEL DU GESTIONNAIRE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title" style="display: flex; align-items: center; gap: 8px;">
								<span>📋</span> Missions opérationnelles & Processus de gestion
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div class="admin-mission-card">
										<div>
											<h4><span>🎓</span> Demandes de formation continue</h4>
											<p>
												Traitement des requêtes formulées par les entreprises partenaires. Examiner les modules choisis et la liste des salariés bénéficiaires.
											</p>
										</div>
										<div>
											<a href="{{ route('dmdForm') }}" class="btn btn-xs btn-primary" style="border-radius: var(--ig-radius-sm, 4px); font-weight: 600;">
												Examiner les demandes &nbsp;<i class="fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div class="admin-mission-card">
										<div>
											<h4><span>💻</span> Prestations d'ingénierie</h4>
											<p>
												Suivi des besoins en développement logiciel, intégration d'ERP Sage, assistance réseau et maintenance informatique spécifique.
											</p>
										</div>
										<div>
											<a href="{{ route('dmdPrest') }}" class="btn btn-xs btn-info" style="border-radius: var(--ig-radius-sm, 4px); font-weight: 600;">
												Consulter les prestations &nbsp;<i class="fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div class="admin-mission-card">
										<div>
											<h4><span>📅</span> Calendrier & Séminaires</h4>
											<p>
												Planifier les dates, les thèmes et les lieux des prochaines sessions de formation publiées sur le portail public du cabinet.
											</p>
										</div>
										<div>
											<a href="{{ route('evenements') }}" class="btn btn-xs btn-default" style="border-radius: var(--ig-radius-sm, 4px); font-weight: 600;">
												Gérer le calendrier &nbsp;<i class="fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div class="admin-mission-card">
										<div>
											<h4><span>📬</span> Boîte de réception & Avis</h4>
											<p>
												Consulter et marquer comme traités les messages et avis envoyés par les visiteurs via le formulaire de contact du site.
											</p>
										</div>
										<div>
											<a href="{{ route('suggestions') }}" class="btn btn-xs btn-warning" style="border-radius: var(--ig-radius-sm, 4px); font-weight: 600;">
												Voir les messages &nbsp;<i class="fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ACTIONS RAPIDES DE CRÉATION -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title" style="display: flex; align-items: center; gap: 8px;">
								<span>⚡</span> Raccourcis d'action rapide
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6">
									<a href="{{ route('newEvenements', 'mode=Ajouter') }}" class="admin-quick-action" title="Publier un nouvel événement">
										<div class="action-icon">
											<span>✨</span>
										</div>
										<div class="action-text">
											<strong>Nouvel Événement</strong>
											<span>Publier une session ou un séminaire</span>
										</div>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('newForm', 'mode=Ajouter') }}" class="admin-quick-action" title="Ajouter un domaine de formation">
										<div class="action-icon">
											<span>📚</span>
										</div>
										<div class="action-text">
											<strong>Nouveau Domaine</strong>
											<span>Créer un domaine et ses modules</span>
										</div>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('newPr', 'mode=Ajouter') }}" class="admin-quick-action" title="Enregistrer une prestation">
										<div class="action-icon">
											<span>⚙️</span>
										</div>
										<div class="action-text">
											<strong>Nouvelle Prestation</strong>
											<span>Enregistrer une offre de service</span>
										</div>
									</a>
								</div>
								@php
									$adminRole = \App\role::where('libelle', 'Admin')->first();
									$isRealAdmin = ($adminRole && Auth::check() && Auth::user()->role_id == $adminRole->id);
								@endphp
								@if($isRealAdmin)
								<div class="col-sm-6">
									<a href="{{ route('newUser', 'mode=Ajouter') }}" class="admin-quick-action" title="Créer un compte administrateur">
										<div class="action-icon">
											<span>👤</span>
										</div>
										<div class="action-text">
											<strong>Nouvel Utilisateur</strong>
											<span>Créer un accès sécurisé backoffice</span>
										</div>
									</a>
								</div>
								@endif
							</div>
						</div>
					</div>

				</div>

				<!-- Colonne de droite : Carte Cabinet & Profil -->
				<div class="col-md-4 col-sm-12">
					
					<!-- CARTE CABINET INTER-GROUPE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title" style="display: flex; align-items: center; gap: 8px;">
								<span>🏢</span> Cabinet INTER-GROUPE
							</h3>
						</div>
						<div class="panel-body text-center" style="padding-top: 1.5rem; padding-bottom: 1.5rem;">
							<img src="{{ asset('template/img/2.png') }}" alt="Logo INTER-GROUPE" style="width: 72px; height: auto; margin-bottom: 1rem;">
							<h4 style="font-family: var(--ig-font-heading); font-size: 1.1rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-top: 0; margin-bottom: 0.25rem;">
								Cabinet de Formation & Ingénierie
							</h4>
							<p style="font-size: 0.8125rem; color: var(--ig-text-muted, #64748B); margin-bottom: 1rem;">
								Habilité FDFP &bull; Fondé en 1992
							</p>
							<div style="background-color: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); padding: 0.875rem; text-align: left; font-size: 0.8125rem; margin-bottom: 1.25rem; line-height: 1.6;">
								<p style="margin-bottom: 0.35rem;"><strong>👔 Directeur :</strong> M. Anet Clément Brou</p>
								<p style="margin-bottom: 0.35rem;"><strong>📍 Siège :</strong> Treichville, Abidjan (CI)</p>
								<p style="margin-bottom: 0;"><strong>📜 Agrément :</strong> Fonds de Dév. de la Formation Pro.</p>
							</div>
							<a href="{{ route('accueil') }}" target="_blank" class="btn btn-default btn-block" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
								<i class="fa fa-external-link"></i> Visualiser le site public
							</a>
						</div>
					</div>

					<!-- CARTE MON COMPTE & SÉCURITÉ -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title" style="display: flex; align-items: center; gap: 8px;">
								<span>👤</span> Session Utilisateur
							</h3>
						</div>
						<div class="panel-body">
							<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
								<div style="width: 46px; height: 46px; border-radius: 50%; background: linear-gradient(135deg, var(--ig-primary) 0%, var(--ig-secondary) 100%); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; box-shadow: 0 2px 6px rgba(10, 110, 63, 0.25);">
									{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
								</div>
								<div style="min-width: 0; flex: 1;">
									<strong style="display: block; font-size: 0.9375rem; color: var(--ig-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Auth::user()->name ?? 'Administrateur' }}</strong>
									<span style="font-size: 0.8125rem; color: var(--ig-text-muted); display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Auth::user()->email ?? '' }}</span>
								</div>
							</div>
							<p style="font-size: 0.8125rem; color: var(--ig-text-muted); margin-bottom: 1rem;">
								Identifiant de connexion : <code>{{ Auth::user()->username ?? 'admin' }}</code>
							</p>
							<a href="{{ route('profil') }}" class="btn btn-primary btn-block" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
								<i class="fa fa-id-card-o"></i> Accéder à mon profil
							</a>
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

@extends('Layouts/admin/baseAdmin',['title'=>'Dashboard'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<!-- EN-TÊTE DU TABLEAU DE BORD -->
			<div class="panel panel-headline" style="border-left: 4px solid var(--ig-primary, #0A6E3F);">
				<div class="panel-heading" style="padding-bottom: 0.75rem;">
					<div class="row">
						<div class="col-sm-8">
							<h3 class="panel-title" style="font-size: 1.35rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">
								Bonjour, {{ Auth::user()->name ?? Auth::user()->username ?? 'Administrateur' }}
							</h3>
							<p class="panel-subtitle" style="font-size: 0.9375rem; color: var(--ig-text-muted, #64748B); margin-top: 4px;">
								<i class="fa fa-calendar-check-o text-success"></i> Aujourd'hui, {{ date('d/m/Y') }} &mdash; Cabinet INTER-GROUPE (Treichville, Abidjan)
							</p>
						</div>
						<div class="col-sm-4 text-right hidden-xs">
							<span class="badge-status badge-status-success" style="font-size: 0.8125rem; padding: 6px 14px;">
								<i class="fa fa-shield"></i> Session active &bull; {{ Auth::user()->role->libelle ?? 'Administration' }}
							</span>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding-top: 1rem;">
					<p style="margin: 0; color: var(--ig-text, #1E293B); font-size: 0.9375rem; line-height: 1.5;">
						Bienvenue sur l'espace d'administration et de pilotage du cabinet. Retrouvez ci-dessous la synthèse des demandes reçues, les sessions en cours et vos raccourcis de gestion.
					</p>
				</div>
			</div>

			<!-- CARTES D'INDICATEURS CLÉS (Données réelles) -->
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('dmdForm') }}" class="metric metric-primary" title="Accéder aux demandes de formation continue">
						<span class="icon"><i class="lnr lnr-laptop"></i></span>
						<p>
							<span class="number">{{ $nbdmdform }}</span>
							<span class="title">Demandes Formation</span>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('dmdPrest') }}" class="metric metric-secondary" title="Accéder aux demandes de prestations">
						<span class="icon"><i class="lnr lnr-code"></i></span>
						<p>
							<span class="number">{{ $nbdmdprest }}</span>
							<span class="title">Demandes Prestation</span>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('evenements') }}" class="metric metric-accent" title="Consulter les événements et formations programmées">
						<span class="icon"><i class="lnr lnr-calendar-full"></i></span>
						<p>
							<span class="number">{{ $nbEvent }}</span>
							<span class="title">Événements en ligne</span>
						</p>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<a href="{{ route('suggestions') }}" class="metric metric-warning" title="Consulter les suggestions et messages reçus">
						<span class="icon"><i class="lnr lnr-alarm"></i></span>
						<p>
							<span class="number">{{ $nbSugNonLu ?? 0 }}</span>
							<span class="title">Messages non lus</span>
						</p>
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
							<h3 class="panel-title">
								<i class="lnr lnr-list text-primary" style="margin-right: 6px;"></i> Missions opérationnelles & Processus de gestion
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div style="padding: 1rem; background: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); height: 100%;">
										<h4 style="font-size: 0.9375rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-top: 0; margin-bottom: 0.5rem;">
											<i class="fa fa-graduation-cap text-success"></i> Demandes de formation continue
										</h4>
										<p style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); line-height: 1.5; margin-bottom: 0.75rem;">
											Traitement des requêtes des entreprises partenaires. Examiner les modules choisis, la liste des salariés bénéficiaires et le dossier FDFP.
										</p>
										<a href="{{ route('dmdForm') }}" class="btn btn-xs btn-primary" style="border-radius: var(--ig-radius-sm, 4px);">
											Examiner les demandes <i class="fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div style="padding: 1rem; background: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); height: 100%;">
										<h4 style="font-size: 0.9375rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-top: 0; margin-bottom: 0.5rem;">
											<i class="fa fa-cogs text-info"></i> Prestations d'ingénierie
										</h4>
										<p style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); line-height: 1.5; margin-bottom: 0.75rem;">
											Suivi des besoins en développement logiciel, intégration Sage / ERP et assistance informatique spécifique.
										</p>
										<a href="{{ route('dmdPrest') }}" class="btn btn-xs btn-info" style="border-radius: var(--ig-radius-sm, 4px);">
											Consulter les prestations <i class="fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div style="padding: 1rem; background: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); height: 100%;">
										<h4 style="font-size: 0.9375rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-top: 0; margin-bottom: 0.5rem;">
											<i class="fa fa-calendar text-primary"></i> Calendrier & Événements
										</h4>
										<p style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); line-height: 1.5; margin-bottom: 0.75rem;">
											Vérifier les dates des séminaires et sessions à venir affichées publiquement sur la page d'accueil.
										</p>
										<a href="{{ route('evenements') }}" class="btn btn-xs btn-default" style="border-radius: var(--ig-radius-sm, 4px);">
											Gérer le calendrier <i class="fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
								<div class="col-sm-6" style="margin-bottom: 1.25rem;">
									<div style="padding: 1rem; background: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); height: 100%;">
										<h4 style="font-size: 0.9375rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-top: 0; margin-bottom: 0.5rem;">
											<i class="fa fa-envelope text-warning"></i> Messages & Suggestions
										</h4>
										<p style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); line-height: 1.5; margin-bottom: 0.75rem;">
											Consulter et marquer comme traités les messages et avis envoyés via le formulaire de contact du site.
										</p>
										<a href="{{ route('suggestions') }}" class="btn btn-xs btn-warning" style="border-radius: var(--ig-radius-sm, 4px);">
											Voir les messages <i class="fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ACTIONS RAPIDES DE CRÉATION -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="lnr lnr-magic-wand text-success" style="margin-right: 6px;"></i> Raccourcis d'action rapide
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6">
									<a href="{{ route('newEvenements', 'mode=Ajouter') }}" class="admin-quick-action">
										<div class="action-icon">
											<i class="fa fa-plus-circle"></i>
										</div>
										<div class="action-text">
											<strong>Nouvel Événement</strong>
											<span>Publier une session ou un séminaire</span>
										</div>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('newForm', 'mode=Ajouter') }}" class="admin-quick-action">
										<div class="action-icon">
											<i class="fa fa-book"></i>
										</div>
										<div class="action-text">
											<strong>Nouveau Domaine</strong>
											<span>Ajouter un domaine de formation et modules</span>
										</div>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('newPr', 'mode=Ajouter') }}" class="admin-quick-action">
										<div class="action-icon">
											<i class="fa fa-wrench"></i>
										</div>
										<div class="action-text">
											<strong>Nouvelle Prestation</strong>
											<span>Enregistrer un type de service</span>
										</div>
									</a>
								</div>
								@php
									$adminRole = \App\role::where('libelle', 'Admin')->first();
									$isRealAdmin = ($adminRole && Auth::check() && Auth::user()->role_id == $adminRole->id);
								@endphp
								@if($isRealAdmin)
								<div class="col-sm-6">
									<a href="{{ route('newUser', 'mode=Ajouter') }}" class="admin-quick-action">
										<div class="action-icon">
											<i class="fa fa-user-plus"></i>
										</div>
										<div class="action-text">
											<strong>Nouvel Utilisateur</strong>
											<span>Créer un accès personnel au backoffice</span>
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
							<h3 class="panel-title">
								<i class="lnr lnr-apartment text-primary" style="margin-right: 6px;"></i> Cabinet INTER-GROUPE
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
							<div style="background-color: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); padding: 0.875rem; text-align: left; font-size: 0.8125rem; margin-bottom: 1.25rem;">
								<p style="margin-bottom: 0.35rem;"><strong>Directeur :</strong> M. Anet Clément Brou</p>
								<p style="margin-bottom: 0.35rem;"><strong>Siège :</strong> Treichville, Abidjan (CI)</p>
								<p style="margin-bottom: 0;"><strong>Agrément :</strong> Fonds de Dév. de la Formation Pro.</p>
							</div>
							<a href="{{ route('accueil') }}" target="_blank" class="btn btn-default btn-block" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
								<i class="fa fa-external-link"></i> Visualiser le site public
							</a>
						</div>
					</div>

					<!-- CARTE MON COMPTE & SÉCURITÉ -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="lnr lnr-user text-success" style="margin-right: 6px;"></i> Session Administrateur
							</h3>
						</div>
						<div class="panel-body">
							<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
								<div style="width: 44px; height: 44px; border-radius: 50%; background-color: var(--ig-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.1rem;">
									{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
								</div>
								<div>
									<strong style="display: block; font-size: 0.9375rem; color: var(--ig-text);">{{ Auth::user()->name ?? 'Administrateur' }}</strong>
									<span style="font-size: 0.8125rem; color: var(--ig-text-muted);">{{ Auth::user()->email ?? '' }}</span>
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
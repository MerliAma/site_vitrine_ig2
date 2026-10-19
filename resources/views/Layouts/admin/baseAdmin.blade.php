<!DOCTYPE html>
<html lang="fr">

<head>
	<title>IG-Espace Administrateur | {{$title}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project 
	<link rel="stylesheet" href="{{asset('template/css/demo.css')}}">-->
	<!-- GOOGLE FONTS : DM Sans & Inter (DEC-007) -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">

	<!-- SYSTÈME DE DESIGN INTER-GROUPE -->
	<link rel="stylesheet" href="{{asset('css/design-system.css')}}">

	<!--SWEET ALERT
	<script src="{{asset('sweetAlert/sweetalert.min.js')}}"> </script>-->

</head>

<body>
	<!-- Lien d'évitement accessible (WCAG 2.4.1) -->
	<a href="#admin-main" class="skip-link">Aller au contenu principal</a>

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<div class="brand">
				<a href="{{route('accueilAd')}}" class="ig-brand" title="INTER-GROUPE Administration">
					<span>INTER-</span>GROUPE
				</a>
			</div>
			<div class="container-fluid barre">
				<div style="display: flex; align-items: center; gap: 12px;">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth" aria-label="Basculer le menu latéral"><i class="lnr lnr-arrow-left-circle"></i></button>
					</div>
					<div class="hidden-xs hidden-sm">
						<span class="navbar-left-pill">
							<i class="fa fa-shield text-success"></i> Espace sécurisé
						</span>
					</div>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden-xs">
							<a href="{{ route('accueil') }}" target="_blank" title="Ouvrir le site public" style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.8125rem; font-weight: 600; color: var(--ig-text-muted);">
								<i class="fa fa-external-link text-primary"></i> <span class="hidden-sm">Site public</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown" aria-label="Notifications suggestions" title="Suggestions et messages reçus">
								<i class="lnr lnr-alarm"></i>
								@if(($nbSugNonLu ?? 0) > 0)
									<span class="badge bg-danger">{{ $nbSugNonLu }}</span>
								@endif
							</a>
							<ul class="dropdown-menu dropdown-menu-right notifications">
								<li style="padding: 12px 16px; border-bottom: 1px solid var(--ig-border, #E2E8F0); font-weight: 600; color: var(--ig-secondary, #1A3A6B);">
									<i class="lnr lnr-envelope"></i> <span>Suggestions & Messages</span>
								</li>
								<li style="padding: 10px 16px;">
									<span style="font-size: 0.8125rem; color: var(--ig-text-muted);">
										@if(($nbSugNonLu ?? 0) > 0)
											<strong>{{ $nbSugNonLu }}</strong> message{{ $nbSugNonLu > 1 ? 's' : '' }} non lu{{ $nbSugNonLu > 1 ? 's' : '' }}
										@else
											Aucun message en attente
										@endif
									</span>
								</li>
								<li style="border-top: 1px solid var(--ig-border, #E2E8F0);">
									<a href="{{route('suggestions')}}" class="more" style="color: var(--ig-primary, #0A6E3F); font-weight: 600; padding: 10px 16px;">
										<i class="fa fa-arrow-circle-right"></i> Voir la boîte de réception
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle navbar-user-btn" data-toggle="dropdown" title="{{ Auth::user()->name ?? Auth::user()->username ?? 'Utilisateur' }}">
								<img src="{{asset('template/img/2.png')}}" class="navbar-user-avatar" alt="Avatar"> 
								<span class="navbar-user-name">{{ Auth::user()->name ?? Auth::user()->username ?? 'Utilisateur' }}</span> 
								<i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li style="padding: 10px 16px; border-bottom: 1px solid var(--ig-border, #E2E8F0);">
									<span style="display: block; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: var(--ig-text-muted); font-weight: 700;">Connecté en tant que</span>
									<strong style="font-size: 0.875rem; color: var(--ig-secondary);">{{ Auth::user()->name ?? Auth::user()->username ?? 'Utilisateur' }}</strong>
								</li>
								<li><a href="{{route('profil')}}"><i class="lnr lnr-user"></i> <span>Mon Compte</span></a></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="lnr lnr-exit text-danger"></i> <span class="text-danger">{{ __('Déconnexion') }}</span>
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					@hasSection('navactive')
						@yield('navactive')
					@else
						@php
							$currentRoute = Route::currentRouteName();
							$isDemandes = in_array($currentRoute, ['dmdForm', 'dmdPrest', 'listeBenef']);
							$isAdminUser = false;
							if(Auth::check()) {
								$adminRole = \App\role::where('libelle', 'Admin')->first();
								$isAdminUser = ($adminRole && Auth::user()->role_id == $adminRole->id);
							}
						@endphp
						<ul class="nav">
							<li>
								<a href="{{ route('accueilAd') }}" class="{{ $currentRoute == 'accueilAd' ? 'active' : '' }} align-items-center">
									<i class="lnr lnr-home"></i> <span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="{{ $isDemandes ? 'active' : 'collapsed' }}">
									<i class="lnr lnr-file-empty"></i> <div class="d-flex align-items-center justify-content-between"><span>Demandes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></div>
								</a>
								<div id="subPages" class="collapse {{ $isDemandes ? 'in' : '' }}">
									<ul class="nav">
										<li><a href="{{ route('dmdForm') }}" class="{{ in_array($currentRoute, ['dmdForm', 'listeBenef']) ? 'active' : '' }}">Formations</a></li>
										<li><a href="{{ route('dmdPrest') }}" class="{{ $currentRoute == 'dmdPrest' ? 'active' : '' }}">Prestations</a></li>
									</ul>
								</div>
							</li>
							<li>
								<a href="{{ route('domForm') }}" class="{{ in_array($currentRoute, ['domForm', 'newForm', 'listeModules', 'newModule']) ? 'active' : '' }}">
									<i class="lnr lnr-laptop"></i> <span>Domaines Formations</span>
								</a>
							</li>
							<li>
								<a href="{{ route('typePr') }}" class="{{ in_array($currentRoute, ['typePr', 'newPr']) ? 'active' : '' }}">
									<i class="lnr lnr-code"></i> <span>Types Prestations</span>
								</a>
							</li>
							<li>
								<a href="{{ route('suggestions') }}" class="{{ $currentRoute == 'suggestions' ? 'active' : '' }}">
									<i class="lnr lnr-alarm"></i> <span>Suggestions</span>
									@if(isset($nbSugNonLu) && $nbSugNonLu > 0)
										<span class="badge badge-status-danger" style="margin-left: auto;">{{ $nbSugNonLu }}</span>
									@endif
								</a>
							</li>
							<li>
								<a href="{{ route('evenements') }}" class="{{ in_array($currentRoute, ['evenements', 'newEvenements']) ? 'active' : '' }}">
									<i class="lnr lnr-calendar-full"></i> <span>Evènements</span>
								</a>
							</li>
							@if($isAdminUser)
								<li>
									<a href="{{ route('user') }}" class="{{ in_array($currentRoute, ['user', 'newUser']) ? 'active' : '' }}">
										<i class="lnr lnr-users"></i> <span>Utilisateurs</span>
									</a>
								</li>
							@endif
							<li>
								<a href="{{ route('profil') }}" class="{{ in_array($currentRoute, ['profil', 'modifPro']) ? 'active' : '' }}">
									<i class="lnr lnr-user"></i> <span>Mon Compte</span>
								</a>
							</li>
						</ul>
					@endif
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
        
        <!--MAIN-->
        <main id="admin-main">
            @yield('contenu')
        </main>
        <!--END MAIN-->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright mb-0">&copy; {{ date('Y') }} <strong>INTER-GROUPE</strong> — Espace Administration. Tous droits réservés.</p>
				<div class="footer-extra">
					<i class="fa fa-graduation-cap text-success"></i>
					<span>Cabinet d'Ingénierie & Formation Professionnelle &bull; Treichville, Abidjan</span>
				</div>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('template/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('template/scripts/klorofil-common.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.all.js">//sweetalert</script>
	<script type="text/javascript">
		 function deleteT(id,mode,type)
		{
			const swalWithBootstrapButtons=Swal.mixin({
				customClass:{
					confirmButton:'btn btn-success',
					cancelButton:'btn btn-danger'
				},
				buttonsStyling:false
			})
			swalWithBootstrapButtons.fire({
				title:'Etes vous sûr de vouloir '+mode+' ?',
				text:'Cette action est peut-être irréversible',
				icon:'warning',
				showCancelButton:true,
				cancelButtonText:'Non',
				confirmButtonText:'Oui',
				reverseButtons:false
			}).then((result)=>{
				if(result.value){
					event.preventDefault();
					document.getElementById(type+'-form-'+id).submit();
				}
				/*read more about handling dismissals below*/
				else if(result.dismiss===Swal.DismissReason.cancel)
				{
					swalWithBootstrapButtons.fire(
						'Annulé',
						'Vos données sont conservées intactes.',
						'info'
					)
				}
			})
		}
	</script>
	<style>.swal2-confirm{margin:5%;}</style>
</body>

</html>

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
	<div id="wrapper">		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<div class="brand">
				<a href="{{route('accueilAd')}}" class="ig-brand" title="INTER-GROUPE Administration">
					<span>INTER-</span>GROUPE
				</a>
			</div>
			<div class="container-fluid barre">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth" aria-label="Basculer le menu latéral"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-left hidden-xs" style="padding: 18px 10px;">
					<span style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); font-weight: 500;">
						<i class="fa fa-shield text-success"></i> Espace d'administration sécurisé
					</span>
				</div>
				<div class="navbar-btn navbar-btn-right hidden-xs">
					<a href="{{ route('accueil') }}" target="_blank" class="btn btn-sm btn-default" style="margin-top: 2px; margin-right: 15px; border-radius: var(--ig-radius-md, 8px);" title="Ouvrir le site public dans un nouvel onglet">
						<i class="fa fa-external-link"></i> <span class="hidden-sm">Site public</span>
					</a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown" aria-label="Notifications suggestions">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">{{ $nbSugNonLu ?? 0 }}</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li style="padding: 12px 16px; border-bottom: 1px solid var(--ig-border, #E2E8F0); font-weight: 600; color: var(--ig-secondary, #1A3A6B);">
									<span>Suggestions & Messages</span>
								</li>
								<li>
									<a href="{{route('suggestions')}}" class="more" style="color: var(--ig-primary, #0A6E3F);">
										<i class="lnr lnr-envelope"></i> Voir toutes les suggestions ({{ $nbSugNonLu ?? 0 }} non lue{{ ($nbSugNonLu ?? 0) > 1 ? 's' : '' }})
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{asset('template/img/2.png')}}" class="img-circle" alt="Avatar Administrateur" style="width: 26px; height: 26px; object-fit: contain; border: 1px solid var(--ig-border, #E2E8F0); padding: 1px; background: #fff;"> 
								<span style="font-weight: 600;">{{ Auth::user()->name ?? Auth::user()->username ?? 'Utilisateur' }}</span> 
								<i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{route('profil')}}"><i class="lnr lnr-user"></i> <span>Mon Compte</span></a></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="lnr lnr-exit"></i> <span>{{ __('Déconnexion') }}</span>
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
								<a href="{{ route('accueilAd') }}" class="{{ $currentRoute == 'accueilAd' ? 'active' : '' }}">
									<i class="lnr lnr-home"></i> <span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="#subPages" data-toggle="collapse" class="{{ $isDemandes ? 'active' : 'collapsed' }}">
									<i class="lnr lnr-file-empty"></i> <span>Demandes</span> <i class="icon-submenu lnr lnr-chevron-left"></i>
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
			<div class="container-fluid text-center">
				<p class="copyright mb-0" style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">&copy; {{ date('Y') }} <strong>INTER-GROUPE</strong> — Espace Administration. Tous droits réservés.</p>
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

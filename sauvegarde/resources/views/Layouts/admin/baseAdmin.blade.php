<!DOCTYPE html>
<html lang="fr">

<head>
	<title>IG-Espace Administrateur | {{$title}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('template/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project 
	<link rel="stylesheet" href="{{asset('template/css/demo.css')}}">-->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/img/2.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/img/2.png')}}">

	<!--SWEET ALERT
	<script src="{{asset('sweetAlert/sweetalert.min.js')}}"> </script>-->

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<style> /*#img{width:30%; margin-top:-40px; margin-bottom:-40px;} .navbar-form{margin-left:-165px;} .navbar-btn{margin-left:-200px;}*/ 
				.brand{ color:#3cd80d; font-size:30px;} .brand span{ color:#4c504b;}
			</style>
			<div class="brand">
				<span>INTER-</span>GROUPE
			</div>
			<div class="container-fluid barre">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Rechercher...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<!--<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>-->
					<!--<a class="update-pro" href="{{route('accueilAd')}}"><img src="{{asset('template/img/2.png')}}" alt="IG Logo" class="img-responsive logo" id="img"></a>-->
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger"><?php echo $nbSugNonLu; ?></span>
							</a>
							<ul class="dropdown-menu notifications">
								<!--<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>-->
								<li><a href="{{route('suggestions')}}" class="more">Voir les suggestions</a></li>
							</ul>
						</li>
						<!--<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>-->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('template/img/2.png')}}" class="img-circle" alt="Avatar"> <span><?php echo Auth::user()->username; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('profil')}}"><i class="lnr lnr-user"></i> <span>Mon Compte</span></a></li>
								<!--<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="{{ route('login') }}" ><i class="lnr lnr-exit"></i> <span>Déconnexion</span></a></li>-->
								<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="lnr lnr-exit"></i>{{ __('Déconnexion') }}
                                     </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
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
					<!--<ul class="nav">
						<li><a href="{{route('accueilAd')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Demandes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{route('dmdForm')}}" class="">Formations</a></li>
									<li><a href="{{route('dmdPrest')}}" class="">Prestations</a></li>
								</ul>
							</div>
						</li>
						<li><a href="{{route('domForm')}}" class=""><i class="lnr lnr-laptop"></i> <span>Domaines Formations</span></a></li>
						<li><a href="{{route('typePr')}}" class=""><i class="lnr lnr-code"></i> <span>Types Prestations</span></a></li>
                        <li><a href="{{route('suggestions')}}" class=""><i class="lnr lnr-alarm"></i> <span>Suggestions</span></a></li>
                        <li><a href="{{route('user')}}" class=""><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
					</ul>-->
					@yield('navactive')
                </nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
        
        <!--MAIN-->
        @yield('contenu')
        <!--END MAIN-->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('template/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('template/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('template/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('template/scripts/klorofil-common.js')}}"></script>
	<script>
	/*$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});*/
	</script>
	
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
					SwalWithBootstrapButtons.fire(
						'Cancelled',
						'Your data is safe',
						'error'
					)
				}
			})
		}
	</script>
	<style>.swal2-confirm{margin:5%;}</style>
</body>

</html>

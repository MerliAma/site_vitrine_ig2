@extends('Layouts/admin/baseAdmin', ['title'=>'Mon Profil'])

@section('navactive')
<ul class="nav">
	<li><a href="{{route('accueilAd')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
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
	<li><a href="{{route('evenements')}}" class=""><i class="lnr lnr-calendar-full"></i> <span>Evènements</span></a></li>
	<?php
	use App\role;
	$idAdmin=role::where('libelle','Admin')->get();
	if(Auth::user()->role_id==$idAdmin[0]->id)
	{?>
		<li><a href="{{route('user')}}" class=""><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
	<?php
	}
	?>
</ul>
@endsection

@section('contenu')
@php
//use App\role;
$idUser=Auth::user()->id;
$role=role::find(Auth::user()->role_id);
@endphp
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Mon Profil</h3> 
			<div class="row">
			<div class="col-md-4">
				<!-- PANEL NO CONTROLS -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Recommandations</h3>
					</div>
					<div class="panel-body"> <style>.rec,.form-control{font-size:17px; text-align:justify;} .rec{line-height:30px;} </style>
						<p class="rec">Bienvenue <span class="text-info">@php echo auth()->user()->name @endphp</span>,
							<br/><br/>Vous êtes ici sur votre profil. <br/>Vous avez la 
							possibilité de modifier vos informations personnelles. <br/>
							<br/>Cependant, votre Niveau d'accès est pris en charge par l'Administrateur.
							<br/>Veuillez le contacter en cas de soucis.
						</p>
					</div>
				</div>
				<!-- END PANEL NO CONTROLS -->
			</div>
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Informations personnelles</h3>
					</div>
					<div class="panel-body">
						@if(isset($_GET['info']))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{$_GET['info']}}
                            </div>
                        @endif
						<form>
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="name" class="text-info">Nom et Prénoms</label>
								<input type="text" class="form-control" name="name" id="name" readonly value="<?php echo Auth::user()->name ?>">
								</div>
								<div class="form-group col-md-6">
								<label for="username" class="text-info">Nom d'Utilisateur</label>
								<input type="text" class="form-control" name="username" id="username" readonly value="<?php echo Auth::user()->username ?>">
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="email" class="text-info">Email</label>
								<input type="email" class="form-control" name="email" id="email" readonly value="<?php echo Auth::user()->email ?>">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="telUser" class="text-info">Téléphone</label>
								<input type="text" class="form-control" id="telUser" name="telUser" readonly value="<?php echo Auth::user()->telUser ?>">
								</div>
								<div class="form-group col-md-6">
								<label for="role_id" class="text-info">Niveau d'accès</label>
								<input type="text" class="form-control" name="role_id" id="role_id" readonly value="<?php echo $role->libelle ?>">
								</div>
							</div>
							<divclass="form-row"> 
								<div class="form-group col-md-6">
									<a href="{{route('modifPro','mode=Modifier&idUser='.$idUser)}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a>
								</div>
							</div>
						</form>
					</div>
				</div>         		
			</div>
		</div>
		<!-- END MAIN fluid -->
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

@endsection
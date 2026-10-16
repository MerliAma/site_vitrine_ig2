@extends('Layouts/admin/baseAdmin',['title'=>'Demandes->Formations'])

@section('navactive')
<ul class="nav">
	<li><a href="{{route('accueilAd')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-file-empty"></i> <span>Demandes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
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
	{ ?>
	<li><a href="{{route('user')}}" class=""><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
	<?php 
	}
	?>
</ul>
@endsection

@section('contenu')
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Liste des Modules de " {{$libDomForm}} "</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
								<a href="{{route('newModule','idDomForm='.$idDomForm)}}" ><button type="button" class="btn btn-default new"><i class="fa fa-plus-square"></i>&nbsp; Nouveau</button></a> <br/><br/><br/>
									<table class="table table-striped">
									<?php
									
										if(isset($_GET['info']) && $_GET['info']!="")
										{
											echo '<div class="alert alert-success alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											'.$_GET['info'].'
										</div>';
										}
										if(isset($_GET['info2']) && $_GET['info2']!="")
										{
											echo '<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											'.$_GET['info2'].'
										</div>';
										}
									?>
										<thead>
											<tr>
												<th>N°</th>
												<th>Libellé</th>
												<th>Modification</th>
												<th>Suppression</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											 
											for($i=0;$i<$nblisteModules;$i++)
											{
											$num=$i+1;
											echo '<tr><td>'.$num.'</td>
												<td>'.$listeModules[$i]->libMod.'</td>';
											
											?>
											<td><a href="{{route('newModule','idModule='.$listeModules[$i]->id.'&idDomForm='.$idDomForm)}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
											<td>
												<form id="delete-form-{{$listeModules[$i]->id}}" action="{{route('supModule','idModule='.$listeModules[$i]->id.'&idDomForm='.$idDomForm)}}" method="post" style="display:none;">
													@csrf
													@method('DELETE')
												</form>
												<button type="submit" onclick="deleteT({{$listeModules[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button>
											</td>
											</tr>
											<?php
											}
											?>
										</tbody>
									</table>
									<a class="btn btn-primary" href="{{route('domForm')}}"><i class="fa fa-arrow-left"></i>&nbsp; Retour aux Domaines de Formation</a>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
@endsection
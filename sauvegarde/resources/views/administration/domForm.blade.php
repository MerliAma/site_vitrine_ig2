@extends('Layouts/admin/baseAdmin',['title'=>'Domaines Formations'])

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
	<li><a href="{{route('domForm')}}" class="active"><i class="lnr lnr-laptop"></i> <span>Domaines Formations</span></a></li>
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
					<h3 class="page-title">Domaines de Formations</h3> 
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<!--<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>-->
								<div class="panel-body">
								<?php
									if(isset($_GET['info']))
									{
										echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$_GET['info'].'
									</div>';
									}
									if(isset($_GET['infoSup'])&& $_GET['infoSup']==true)
									{
										echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										Votre Domaine de Formation a été supprimé!
									</div>';
									}
									if(isset($_GET['infoSup'])&& $_GET['infoSup']==false)
									{
										echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										Echec de la suppression! Un ou plusieurs modules de ce Domaine font l\'objet d\'une demande
									</div>';
									}
								?>
									<a href="{{route('newForm', 'mode=Ajouter')}}" ><button type="button" class="btn btn-default new"><i class="fa fa-plus-square"></i>&nbsp; Nouveau</button></a> <br/><br/><br/>
									
										@if($nblisteDomForm>0)
										
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Libellé</th>
												<th>Modules</th>
												<th>Action</th>
												<th>Modification</th>
												<th>Suppression</th>
											</tr>
										</thead>
										<tbody>
												@for($i=0;$i<$nblisteDomForm;$i++)
													
													<tr>
													<td>{{$i+1}}</td>
													<td>{{$listeDomForm[$i]->libForm}}</td>
													<td><a href="{{route('listeModules','idDomForm='.$listeDomForm[$i]->id)}}"><i class=" fa fa-eye" title="Voir les Modules associés"></i>&nbsp;Voir les modules</a></td></td>
													@if($listeDomForm[$i]->boolForm==1)
													
														<td>
														<form id="ret-form-{{$listeDomForm[$i]->id}}" action="{{route('RetF','mode=Retirer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('GET')
														</form>
														<button type="submit" onclick="deleteT({{$listeDomForm[$i]->id}},'Retirer','ret')" class="btn btn-primary"><i class="lnr lnr-exit"></i>&nbsp;&nbsp;&nbsp; Retirer</button></a></td>
														
														@else
														
														<td>
														<form id="int-form-{{$listeDomForm[$i]->id}}" action="{{route('RetF','mode=Integrer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('GET')
														</form>
														<button type="submit" onclick="deleteT({{$listeDomForm[$i]->id}},'Integrer','int')" class="btn btn-primary" ><i class="lnr lnr-enter"></i>&nbsp; Afficher</button></a></td>
														
														@endif
													
													<td><a href="{{route('newForm','mode=Modifier&idDomF='.$listeDomForm[$i]->id)}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
													
													<td>
													<form id="delete-form-{{$listeDomForm[$i]->id}}" action="{{route('SupDomF','mode=Supprimer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('DELETE')
													</form>
													<button type="submit" onclick="deleteT({{$listeDomForm[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
												</tr>
											@endfor
										</tbody>
									</table>
										@else
											<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 Aucun Domaine de formation enregistré!
										</div>
										@endif
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
@extends('Layouts/admin/baseAdmin',['title'=>'Types Prestations'])

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
	<li><a href="{{route('typePr')}}" class="active"><i class="lnr lnr-code"></i> <span>Types Prestations</span></a></li>
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
					<h3 class="page-title">Types de Prestations</h3> <!-- Mettre un bouton d'ajout et son formulaire -->
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<!--<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>-->
								<div class="panel-body">
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
									<a href="{{route('newPr', 'mode=Ajouter')}}" ><button type="button" class="btn btn-default new"><i class="fa fa-plus-square"></i>&nbsp; Nouveau</button></a> <br/><br/><br/> 
									
										@if($nblisteTypePr>0)
										
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Libellé</th>
												<th>Action</th>
												<th>Modification</th>
												<th>Suppression</th>
											</tr>
										</thead>
										<tbody>
											<!--<tr>
												<td>1</td>
												<td>Création de Sites</td>
                                                <td><button type="submit" class="btn btn-primary" name=""><i class="lnr lnr-exit"></i>&nbsp;&nbsp;&nbsp; Retirer</button></td>
												<td><a href="{{route('newPr')}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												<td><button type="submit" class="btn btn-danger" name=""><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>-->

												@for($i=0;$i<$nblisteTypePr;$i++)
													
													<tr>
													<td>{{$i+1}}</td>
													<td>{{$listeTypePr[$i]->libPr}}</td>
													
													@if($listeTypePr[$i]->boolTPrest==1)
													
													<td>
													<form id="ret-form-{{$listeTypePr[$i]->id}}" action="{{route('RetP','mode=Retirer&idTypeP='.$listeTypePr[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('GET')
													</form>
													<button type="submit" onclick="deleteT({{$listeTypePr[$i]->id}},'Retirer','ret')" class="btn btn-primary"><i class="lnr lnr-exit"></i>&nbsp;&nbsp;&nbsp; Retirer</button></td>
													
													@else

													<td>
													<form id="int-form-{{$listeTypePr[$i]->id}}" action="{{route('RetP','mode=Integrer&idTypeP='.$listeTypePr[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('GET')
													</form>
													<button type="submit" onclick="deleteT({{$listeTypePr[$i]->id}},'Integrer','int')" class="btn btn-primary" ><i class="lnr lnr-enter"></i>&nbsp; Afficher</button></td>
													
													@endif

												<td><a href="{{route('newPr','mode=Modifier&idTypeP='.$listeTypePr[$i]->id)}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												
												<td>
												<form id="delete-form-{{$listeTypePr[$i]->id}}" action="{{route('SupTypeP','mode=Supprimer&idTypeP='.$listeTypePr[$i]->id)}}" method="post" style="display:none;">
													@csrf
													@method('DELETE')
												</form>
												<button type="submit" onclick="deleteT({{$listeTypePr[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>
											@endfor
										</tbody>
									</table>
									
										@else
											<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 Aucun Type de prestation enregistré!
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
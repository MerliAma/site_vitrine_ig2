@extends('Layouts/admin/baseAdmin',['title'=>'Evènements'])

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
	<li><a href="{{route('evenements')}}" class="active"><i class="lnr lnr-calendar-full"></i> <span>Evènements</span></a></li>
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
					<h3 class="page-title">Evènements</h3> 
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
									<a href="{{route('newEvenements', 'mode=Ajouter')}}" ><button type="button" class="btn btn-default new"><i class="fa fa-plus-square"></i>&nbsp; Nouveau</button></a> <br/><br/><br/>
									
										@if($nblistEvent>0)

									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Theme Formation</th>
												<th>Entreprise Concernée</th>
												<th>Période</th>
												<th>Action</th>
												<th>Modification</th>
												<th>Suppression</th>
											</tr>
										</thead>
										<tbody>
											<!--<tr>
												<td>1</td>
												<td>Mise en Pratique de la négociation-Vente</td>
												<td>GMA</td>
												<td>01/05/2020 - 15/05/2020</td>
                                                <td><button type="submit" class="btn btn-primary" name=""><i class="lnr lnr-exit"></i>&nbsp;&nbsp;&nbsp; Retirer</button></td>
												<td><a href="{{route('newEvenements')}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												<td><button type="submit" class="btn btn-danger" name=""><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>-->
											
												@for($i=0;$i<$nblistEvent;$i++)
													@php
													$datedeb=substr($listeEvent[$i]->datedebEvent,8,2)."/".substr($listeEvent[$i]->datedebEvent,5,2)."/".substr($listeEvent[$i]->datedebEvent,0,4);
													$datefin=substr($listeEvent[$i]->datefinEvent,8,2)."/".substr($listeEvent[$i]->datefinEvent,5,2)."/".substr($listeEvent[$i]->datefinEvent,0,4);
													@endphp
													<tr>
													<td>{{$i+1}}</td>
													<td>{{$listeEvent[$i]->themEvent}}</td>
													<td>{{$listeEvent[$i]->entEvent}}</td>
													<td>{{$datedeb}} - {{$datefin}}</td>
													
													@if($listeEvent[$i]->boolEvent==1)
													
													<td>
													<form id="ret-form-{{$listeEvent[$i]->id}}" action="{{route('Ret','mode=Retirer&idEvent='.$listeEvent[$i]->id)}}"  method="post" style="display:none;">
													@csrf
													@method('GET')
													</form>
													<button type="submit" onclick="deleteT({{$listeEvent[$i]->id}},'Retirer','ret')" class="btn btn-primary"><i class="lnr lnr-exit"></i>&nbsp;&nbsp;&nbsp; Retirer</button></td>
													
													@else
													
													<td>
													<form id="int-form-{{$listeEvent[$i]->id}}" action="{{route('Ret','mode=Integrer&idEvent='.$listeEvent[$i]->id)}}"  method="post" style="display:none;">
													@csrf
													@method('GET')
													</form>
													<button type="submit" onclick="deleteT({{$listeEvent[$i]->id}},'Mettre en ligne','int')" class="btn btn-primary" ><i class="lnr lnr-enter"></i>&nbsp; Afficher</button></td>
													@endif

												<td><a href="{{route('newEvenements','mode=Modifier&idEvent='.$listeEvent[$i]->id)}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												
												<td>
												<form id="delete-form-{{$listeEvent[$i]->id}}" action="{{route('Sup','mode=Supprimer&idEvent='.$listeEvent[$i]->id)}}" method="post" style="display:none;">
													@csrf
													@method('DELETE')
												</form>
												<button type="submit" onclick="deleteT({{$listeEvent[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>
											@endfor
										</tbody>
									</table>
									<p><span style="color:red">NB:</span> Uniquement quatre (4) évènements seront visible sur page d'accueil</p>
									@else
										<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										Aucun Evènement enregistré!
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
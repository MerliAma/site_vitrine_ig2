@extends('Layouts/admin/baseAdmin',['title'=>'Suggestions'])


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
	<li><a href="{{route('suggestions')}}" class="active"><i class="lnr lnr-alarm"></i> <span>Suggestions</span></a></li>
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
					<h3 class="page-title">Suggestions</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
									@if($nbSug>0)	 
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Nom et Prénoms</th>
												<th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Message</th>
												<th>Etat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<!--<tr>
												<td>1</td>
												<td>Steve Jonhson Marc</td>
												<td>Jobs</td>
                                                <td>@steve</td>
                                                <td>Bon téléchargements des catalogue. Très utile! bonne continuation.</td>
												<td><button type="button" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Marquer</button></td>
												<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>-->

												@for($i=0;$i<$nbSug;$i++)
												
													<tr>
													<td>{{$i+1}}</td>
													<td>{{$listeSug[$i]->nomSug}}</td>
													<td>{{$listeSug[$i]->mailSug}}</td>
													<td>{{$listeSug[$i]->telSug}}</td>
													<td>{{$listeSug[$i]->msgSug}}</td>
													@if($listeSug[$i]->boolSug==0)

														<td><form id="marq-form-{{$listeSug[$i]->id}}" action="{{route('MarqSug','mode=Marquer&idSug='.$listeSug[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('GET')
														</form>
														<button type="submit" onclick="deleteT({{$listeSug[$i]->id}},'Marquer','marq')" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Marquer</button></td>
													@else
														<td><center><i class="fa fa-check-circle"></i>&nbsp; Lu</center></td>
													@endif
													<td><form id="delete-form-{{$listeSug[$i]->id}}" action="{{route('SupSug','mode=Supprimer&idSug='.$listeSug[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('DELETE')
														</form>
													<button type="submit" onclick="deleteT({{$listeSug[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
													</tr>
												@endfor
										</tbody> 
									</table>
										@else
											<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 Aucune Suggestion enregistrée!
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
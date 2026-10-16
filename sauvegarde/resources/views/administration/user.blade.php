@extends('Layouts/admin/baseAdmin',['title'=>'Utilisateurs'])

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
    <li><a href="{{route('user')}}" class="active"><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
<?php use App\role; $permission=role::all(); $permission=role::where('libelle','Autre')->get();?>
</ul>
@endsection

@section('contenu')
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Utilisateurs</h3> 
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<!--<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>-->
								<div class="panel-body">
								<?php
									if(isset($info))
									{
										echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$info.'
									</div>';
									}
									if(isset($info2))
									{
										echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$info.'
									</div>';
									}
								?>
									<a href="{{ route('newUser','mode=Ajouter')}}" ><button type="button" class="btn btn-default new"><i class="fa fa-plus-square"></i>&nbsp; Nouveau</button></a> <br/><br/><br/> 
									<!--<a href="{{route('register','mode=Ajouter')}}" >-->
									@if($nblisteUser>0)
										
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Noms et Prénoms</th>
												<th>Téléphone</th>
												<th>Email</th>
												<th>Login</th>
												<th>Privilèges</th>
												<th>Suppression</th>
											</tr>
										</thead>
										<tbody>
											<!--<tr>
												<td>1</td>
												<td>Merli Lili</td>
												<td>55-32-53-14</td>
												<td>merli@gmail.com</td>
												<td>merli</td>
												<td>Admin</td>
												<td><a href="{{route('newUser')}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												<td><button type="submit" class="btn btn-danger" name=""><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>
											<tr>
												<td>2</td>
												<td>TRAORE TIDJANE</td>
												<td>32-36-98-74</td>
												<td>ttdidjane@yahoo.fr</td>
												<td>tidjane</td>
												<td>Autres</td>
												<td><a href="{{route('newUser')}}" ><button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp; Modifier</button></a></td>
												<td><button type="submit" class="btn btn-danger" name=""><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>-->
											
												@for($i=0;$i<$nblisteUser;$i++)
													
													
													<tr><td>{{$i+1}}</td>
													<td>{{$listeUser[$i]->name}}</td>
													<td>{{$listeUser[$i]->telUser}}</td>
													<td>{{$listeUser[$i]->email}}</td>
													<td>{{$listeUser[$i]->username}}</td>
													<form id="perm-form-{{$listeUser[$i]->id}}" action="{{route('RenPermUser','mode=Perm&idUser='.$listeUser[$i]->id)}}" method="post" style="display:none;">
														@csrf
														@method('GET')
													</form>
													@if($listeUser[$i]->id!=auth()->user()->id)
													
													@if($listeUser[$i]->role_id==$permission[0]->id) 
														<!--<td>
														<button type="submit" onclick="deleteT({{$listeUser[$i]->id}},'Modifier le niveau d\'accès','perm')" class="btn btn-primary" ><i class="fa fa-minus"></i>&nbsp; Privilèges</button></td>--><!--un bouton pour octroyer de permission-->
														<td>
														<button type="submit" onclick="deleteT({{$listeUser[$i]->id}},'Modifier le niveau d\'accès','perm')" class="btn btn-primary" ><i class="fa fa-plus"></i>&nbsp; Privilèges</button></td><!--un bouton pour octroyer de permission-->
											
													@else
														<td>
														<button type="submit" onclick="deleteT({{$listeUser[$i]->id}},'Modifier le niveau d\'accès','perm')" class="btn btn-primary" ><i class="fa fa-minus"></i>&nbsp; Privilèges</button></td><!--un bouton pour octroyer de permission-->
														<!--<td>Administrateur</td>-->
													@endif
													@else
														<td>Administrateur</td>
													@endif
												<td>
												<form id="delete-form-{{$listeUser[$i]->id}}" action="{{route('SupUser','mode=Supprimer&idUser='.$listeUser[$i]->id)}}" method="post" style="display:none;">
													@csrf
													@method('DELETE')
												</form>
												@if($listeUser[$i]->id!=auth()->user()->id)
													<button type="submit" onclick="deleteT({{$listeUser[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
												@else
													<center><b><i class="lnr lnr-user"></i> &nbsp; &nbsp; <font color="">Moi</font></b></center>
												@endif
											</tr>
											@endfor
										</tbody>
									</table>
										@else
											<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 Aucun Utilisateur enregistré!
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
@extends('Layouts/admin/baseAdmin',['title'=>'Demandes->Prestations'])

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
					<h3 class="page-title">Demandes de Prestations</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
								<?php
								use App\TypePrestation;
									if(isset($_GET['info']))
									{
										echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$_GET['info'].'
									</div>';
									}
									
									if($nblistedmdP>0)
									{
								?> 
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Nom et Prénoms</th>
												<th>Email</th>
												<th>Téléphone</th>
												<th>Type de Prestations</th>
                                                <th>Autres Indications</th>
												<th>Etat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<!--<tr>
												<td>1</td>
												<td>Steve Jonhson Marc</td>
												<td>Jobs@</td>
												<td>21-25-29-32</td>
												<td>-Création de Site</td>
                                                <td>Besoin urgent</td>
												<td><button type="button" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Marquer</button></td>
												<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp; Supprimer</button></td>
											</tr>$listedmdP[$i]->id-->
											<?php
												for($i=0;$i<$nblistedmdP;$i++)
												{
													$k=$i+1;
													echo '<td>'.$k.'</td>
													<td>'.$listedmdP[$i]->nom.'</td>
													<td>'.$listedmdP[$i]->email.'</td>
													<td>'.$listedmdP[$i]->tel.'</td>';
													echo '<td>';
													for($j=0;$j<$nblistelier2;$j++)
													{
														if($listedmdP[$i]->id==$listelier2[$j]->dmdPrest)
														{
															$libP = TypePrestation::where('id', $listelier2[$j]->typePrest)->get();
															echo '- '.$libP[0]->libPr.'<br/>';
														}
													}
													echo '</td>';
													echo '<td>'.$listedmdP[$i]->indicationPrest.'</td>';
													if($listedmdP[$i]->booldmdP==0)
													{?>
														<td>
														<form id="marq-form-{{$listedmdP[$i]->id}}" action="{{route('MarqP', 'mode=Marquer&idDmdP='.$listedmdP[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('GET')
														</form>
														<button type="submit" onclick="deleteT({{$listedmdP[$i]->id}},'Marquer','marq')" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp; Marquer</button></td>
													<?php
													}
													else
													{
														echo '<td><center><i class="fa fa-check-circle"></i>&nbsp; Lu</center></td>';
													}
											?>
												<td>
												<form id="delete-form-{{$listedmdP[$i]->id}}" action="{{route('SupP', 'mode=Supprimer&idDmdP='.$listedmdP[$i]->id)}}" method="post" style="display:none;">
													@csrf
													@method('DELETE')
												</form>
												<button type="submit" onclick="deleteT({{$listedmdP[$i]->id}},'Supprimer','delete')" class="btn btn-danger"><i class="fa fa-trash-o"></i> &nbsp; Supprimer</button></td>
												</tr>
											<?php
												}
											?>
										</tbody>
									</table>
									<?php
										}
										else{
											echo '<div class="alert alert-warning alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											 Aucune Demande enregistrée!
										</div>';
										}
									?>
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
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
					<h3 class="page-title">Demandes de Formations</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
								<?php
									use App\DomaineFormation;
									use App\Entreprise;
									use App\module;
									use App\EntrepriseBeneficiaireModule;
									if(isset($_GET['info']))
									{
										echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$_GET['info'].'
									</div>';
									}

									if($nblistedmd>0)
									{
								?> 
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Raison Sociale</th>
												<th>N° Compte Contribuable</th>
												<th>Email</th>
												<th>Téléphone</th>
												<th>Modules</th>
												<th>Bénéficiaires</th>
                                                <th>Autres Indications</th>
												<th>Date Demande</th>
												<th>Etat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php
												$tabDatedmd[0]=$listedmd[0]->date_demande;
												//parcourir la table ternaire
												$idDate=0;
												//$i=0;
												if($nblistedmd>1){
												for($i=1;$i<$nblistedmd;$i++)
												{
													if($listedmd[$i]->date_demande!=$tabDatedmd[$idDate])
													{
														$idDate++;
														$tabDatedmd[$idDate]=$listedmd[$i]->date_demande;
													}
												}}
												$nbdmd=0;
												for($j=0;$j<count($tabDatedmd);$j++) //possible de commencer par entreprise mais mieux par date car c du + grd au + petit
												{
													for($i=0;$i<$nblisteEnt;$i++)
													{
														$dmd=EntrepriseBeneficiaireModule::whereEntreprise_idAndDate_demande($listeEnt[$i]->id,$tabDatedmd[$j])->get();
														if(count($dmd)!=0)
														{
															echo '<tr>';
															$idMod=$dmd[0]->module_id;
															//enregistrer la demande 1 $dmd[0]->id
															
															$Ent = Entreprise::where('id',$listeEnt[$i]->id)->get(); 
															$Mod = module::where('id',$idMod)->get();
															$nbdmd++;
															echo '<td>'.$nbdmd.'</td>
															<td>'.$Ent[0]->raisonSocial.'</td>
															<td>'.$Ent[0]->ncc.'</td>
															<td>'.$Ent[0]->email.'</td>
															<td>'.$Ent[0]->tel.'</td>
															<td>'.$Mod[0]->libMod.' &nbsp;&nbsp;'; ?></td> <td><center><a href="{{route('listeBenef','idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}"><i class="fa fa-eye" title="Voir les bénéficiaires"></i></a></center></td>
															<?php echo '<td>'.$dmd[0]->attentes.'</td>
															<td>'.$dmd[0]->date_demande.'</td>';
															if($dmd[0]->booldmdF==0)
															{?>
																<td>
																<form id="marq-form-{{$dmd[0]->id}}" action="{{route('MarqF', 'mode=Marquer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}" method="post" style="display:none;">
																	@csrf
																	@method('GET')
																</form>
																<button type="submit" onclick="deleteT({{$dmd[0]->id}},'Marquer','marq')" class="btn-primary"><i class="fa fa-check-circle"></i>&nbsp; </button></td>
															<?php
															}
															else
															{
																echo '<td><center><i class="fa fa-check-circle"></i>&nbsp; Lu</center></td>';
															}
													?>
														<td>
														<form id="delete-form-{{$dmd[0]->id}}" action="{{route('SupF', 'mode=Supprimer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}" method="post" style="display:none;">
															@csrf
															@method('DELETE')
														</form>
														<button type="submit" onclick="deleteT({{$dmd[0]->id}},'Supprimer','delete')" class="btn-danger"><i class="fa fa-trash-o"></i> &nbsp;</button></td>
														</tr>
													<?php
															if(count($dmd)>1)
															{
																for($k=1;$k<count($dmd);$k++)
																{
																	if($dmd[$k]->module_id!=$idMod)
																	{
																		$idMod=$dmd[$k]->module_id;
																		//enregistrer la demande à nouveau si différent de la première
																		echo '<tr>';
																		//$Ent = Entreprise::find($listeEnt[$i]->id)->get();$dmd[$k]->id
																		$Mod = module::where('id',$idMod)->get();$nbdmd++;
																		echo '<td>'.$nbdmd.'</td>
																		<td>'.$Ent[0]->raisonSocial.'</td>
																		<td>'.$Ent[0]->ncc.'</td>
																		<td>'.$Ent[0]->email.'</td>
																		<td>'.$Ent[0]->tel.'</td>
																		<td>'.$Mod[0]->libMod.' &nbsp;&nbsp;'; ?></td> <td><center><a href="{{route('listeBenef','idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}"><i class="fa fa-eye" title="Voir les bénéficiaires"></i></a></center></td>
																		<?php echo '<td>'.$dmd[$k]->attentes.'</td>
																		<td>'.$dmd[$k]->date_demande.'</td>';
																		if($dmd[$k]->booldmdF==0)
																		{?>
																			<td>
																			<form id="marq-form-{{$dmd[$k]->id}}" action="{{route('MarqF', 'mode=Marquer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}" method="post" style="display:none;">
																				@csrf
																				@method('GET')
																			</form>
																			<button type="submit" onclick="deleteT({{$dmd[$k]->id}},'Marquer','marq')" class="btn-primary"><i class="fa fa-check-circle"></i>&nbsp;</button></td>
																		<?php
																		}
																		else
																		{
																			echo '<td><center><i class="fa fa-check-circle"></i>&nbsp; Lu</center></td>';
																		}
																?>
																	<td>
																	<form id="delete-form-{{$dmd[$k]->id}}" action="{{route('SupF', 'mode=Supprimer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}" method="post" style="display:none;">
																		@csrf
																		@method('DELETE')
																	</form>
																	<button type="submit" onclick="deleteT({{$dmd[$k]->id}},'Supprimer','delete')" class="btn-danger"><i class="fa fa-trash-o"></i> &nbsp;</button></td>
																	</tr>
																<?php
																		//echo $listeEnt[$i]->id.' '.$tabDatedmd[$j].' '.$idMod.'<br/>';
																	}
																}	
															}
														}
														
													}
												}
													//dd(count($tabDatedmd));
												
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
										/*swal({
											title: "Are you sure?",
											text: "Once deleted, you will not be able to recover this imaginary file!",
											icon: "warning",
											buttons: true,
											dangerMode: true,
										  })
										  .then((willDelete) => {
											if (willDelete) {
											  swal("Poof! Your imaginary file has been deleted!", {
												icon: "success",
											  });
											} else {
											  swal("Your imaginary file is safe!");
											}
										  });*/  
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
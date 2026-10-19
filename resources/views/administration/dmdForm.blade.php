@extends('Layouts/admin/baseAdmin',['title'=>'Demandes de Formations'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="admin-page-header">
				<div>
					<h3 style="margin: 0; font-size: 1.625rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">Demandes de Formations</h3>
					<p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">Suivi et traitement des dossiers de formation continue déposés par les entreprises</p>
				</div>
				<div class="hidden-xs">
					<span class="badge-status badge-status-info" style="font-size: 0.8125rem; padding: 6px 12px;">
						<i class="fa fa-graduation-cap"></i> Formation Continue FDFP
					</span>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
							<h3 class="panel-title">
								<i class="lnr lnr-laptop text-primary" style="margin-right: 6px;"></i> Liste des demandes enregistrées
							</h3>
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
								<i class="fa fa-check-circle"></i> '.$_GET['info'].'
							</div>';
							}

							if($nblistedmd>0)
							{
						?> 
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Raison Sociale</th>
											<th>N° CC</th>
											<th>Contact</th>
											<th>Module sollicité</th>
											<th class="text-center">Bénéficiaires</th>
											<th>Attentes & Précisions</th>
											<th>Date Demande</th>
											<th class="text-center">Statut</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$tabDatedmd[0]=$listedmd[0]->date_demande;
											$idDate=0;
											if($nblistedmd>1){
												for($i=1;$i<$nblistedmd;$i++)
												{
													if($listedmd[$i]->date_demande!=$tabDatedmd[$idDate])
													{
														$idDate++;
														$tabDatedmd[$idDate]=$listedmd[$i]->date_demande;
													}
												}
											}
											$nbdmd=0;
											for($j=0;$j<count($tabDatedmd);$j++)
											{
												for($i=0;$i<$nblisteEnt;$i++)
												{
													$dmd=EntrepriseBeneficiaireModule::whereEntreprise_idAndDate_demande($listeEnt[$i]->id,$tabDatedmd[$j])->get();
													if(count($dmd)!=0)
													{
														$idMod=$dmd[0]->module_id;
														$Ent = Entreprise::where('id',$listeEnt[$i]->id)->get(); 
														$Mod = module::where('id',$idMod)->get();
														$nbdmd++;
										?>
														<tr>
															<td><strong>{{ $nbdmd }}</strong></td>
															<td><strong>{{ $Ent[0]->raisonSocial }}</strong></td>
															<td><code>{{ $Ent[0]->ncc }}</code></td>
															<td>
																<span style="display:block; font-size:0.875rem;">{{ $Ent[0]->email }}</span>
																<small class="text-muted"><i class="fa fa-phone"></i> {{ $Ent[0]->tel }}</small>
															</td>
															<td>
																<span class="badge-status badge-status-info">{{ $Mod[0]->libMod }}</span>
															</td>
															<td class="text-center">
																<a href="{{route('listeBenef','idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}" class="btn btn-xs btn-default" style="border-radius: var(--ig-radius-sm, 4px);" title="Consulter la liste des salariés bénéficiaires">
																	<i class="fa fa-users text-primary"></i> Voir les bénéficiaires
																</a>
															</td>
															<td style="max-width: 200px; white-space: normal; font-size: 0.875rem;">
																{{ $dmd[0]->attentes ?: 'Aucune indication particulière.' }}
															</td>
															<td>
																<small class="text-muted"><i class="fa fa-calendar"></i> {{ $dmd[0]->date_demande }}</small>
															</td>
															<td class="text-center">
																@if($dmd[0]->booldmdF==0)
																	<span class="badge-status badge-status-warning"><i class="fa fa-clock-o"></i> En attente</span>
																@else
																	<span class="badge-status badge-status-success"><i class="fa fa-check"></i> Traitée</span>
																@endif
															</td>
															<td class="text-center">
																<div style="display: inline-flex; gap: 4px;">
																	@if($dmd[0]->booldmdF==0)
																		<form id="marq-form-{{$dmd[0]->id}}" action="{{route('MarqF', 'mode=Marquer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}" method="post" style="display:none;">
																			@csrf
																			@method('GET')
																		</form>
																		<button type="button" onclick="deleteT({{$dmd[0]->id}},'Marquer','marq')" class="btn btn-xs btn-success" title="Marquer comme traitée">
																			<i class="fa fa-check"></i> Traiter
																		</button>
																	@endif
																	<form id="delete-form-{{$dmd[0]->id}}" action="{{route('SupF', 'mode=Supprimer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[0]->date_demande)}}" method="post" style="display:none;">
																		@csrf
																		@method('DELETE')
																	</form>
																	<button type="button" onclick="deleteT({{$dmd[0]->id}},'Supprimer','delete')" class="btn btn-xs btn-danger" title="Supprimer la demande">
																		<i class="fa fa-trash-o"></i>
																	</button>
																</div>
															</td>
														</tr>
										<?php
														if(count($dmd)>1)
														{
															for($k=1;$k<count($dmd);$k++)
															{
																if($dmd[$k]->module_id!=$idMod)
																{
																	$idMod=$dmd[$k]->module_id;
																	$Mod = module::where('id',$idMod)->get();
																	$nbdmd++;
										?>
																	<tr>
																		<td><strong>{{ $nbdmd }}</strong></td>
																		<td><strong>{{ $Ent[0]->raisonSocial }}</strong></td>
																		<td><code>{{ $Ent[0]->ncc }}</code></td>
																		<td>
																			<span style="display:block; font-size:0.875rem;">{{ $Ent[0]->email }}</span>
																			<small class="text-muted"><i class="fa fa-phone"></i> {{ $Ent[0]->tel }}</small>
																		</td>
																		<td>
																			<span class="badge-status badge-status-info">{{ $Mod[0]->libMod }}</span>
																		</td>
																		<td class="text-center">
																			<a href="{{route('listeBenef','idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}" class="btn btn-xs btn-default" style="border-radius: var(--ig-radius-sm, 4px);" title="Consulter la liste des salariés bénéficiaires">
																				<i class="fa fa-users text-primary"></i> Voir les bénéficiaires
																			</a>
																		</td>
																		<td style="max-width: 200px; white-space: normal; font-size: 0.875rem;">
																			{{ $dmd[$k]->attentes ?: 'Aucune indication particulière.' }}
																		</td>
																		<td>
																			<small class="text-muted"><i class="fa fa-calendar"></i> {{ $dmd[$k]->date_demande }}</small>
																		</td>
																		<td class="text-center">
																			@if($dmd[$k]->booldmdF==0)
																				<span class="badge-status badge-status-warning"><i class="fa fa-clock-o"></i> En attente</span>
																			@else
																				<span class="badge-status badge-status-success"><i class="fa fa-check"></i> Traitée</span>
																			@endif
																		</td>
																		<td class="text-center">
																			<div style="display: inline-flex; gap: 4px;">
																				@if($dmd[$k]->booldmdF==0)
																					<form id="marq-form-{{$dmd[$k]->id}}" action="{{route('MarqF', 'mode=Marquer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}" method="post" style="display:none;">
																						@csrf
																						@method('GET')
																					</form>
																					<button type="button" onclick="deleteT({{$dmd[$k]->id}},'Marquer','marq')" class="btn btn-xs btn-success" title="Marquer comme traitée">
																						<i class="fa fa-check"></i> Traiter
																					</button>
																				@endif
																				<form id="delete-form-{{$dmd[$k]->id}}" action="{{route('SupF', 'mode=Supprimer&idEnt='.$Ent[0]->id.'&idMod='.$idMod.'&datedmd='.$dmd[$k]->date_demande)}}" method="post" style="display:none;">
																					@csrf
																					@method('DELETE')
																				</form>
																				<button type="button" onclick="deleteT({{$dmd[$k]->id}},'Supprimer','delete')" class="btn btn-xs btn-danger" title="Supprimer la demande">
																					<i class="fa fa-trash-o"></i>
																				</button>
																			</div>
																		</td>
																	</tr>
										<?php
																}
															}	
														}
													}
												}
											}
										?>
									</tbody>
								</table>
							</div>
						<?php
							}
							else{
						?>
								<div class="text-center" style="padding: 3rem 1.5rem;">
									<div style="width: 64px; height: 64px; border-radius: 50%; background: var(--ig-surface-muted, #F1F5F9); color: var(--ig-text-muted, #64748B); display: inline-flex; align-items: center; justify-content: center; font-size: 1.75rem; margin-bottom: 1rem;">
										<i class="lnr lnr-inbox"></i>
									</div>
									<h4 style="font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-bottom: 0.5rem;">Aucune demande de formation</h4>
									<p style="color: var(--ig-text-muted, #64748B); max-width: 480px; margin: 0 auto;">Les demandes de formation continue transmises par les entreprises clientes apparaîtront automatiquement dans ce tableau.</p>
								</div>
						<?php
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

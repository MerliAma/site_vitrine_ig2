@extends('Layouts/admin/baseAdmin',['title'=>'Demandes de Prestations'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="admin-page-header">
				<div>
					<h3 style="margin: 0; font-size: 1.625rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">Demandes de Prestations</h3>
					<p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">Suivi des demandes d'ingénierie informatique, développement spécifique et intégration logicielle</p>
				</div>
				<div class="hidden-xs">
					<span class="badge-status badge-status-info" style="font-size: 0.8125rem; padding: 6px 12px;">
						<i class="fa fa-cogs"></i> Ingénierie & Services
					</span>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="lnr lnr-code text-primary" style="margin-right: 6px;"></i> Liste des demandes de prestations
							</h3>
						</div>
						<div class="panel-body">
						<?php
							use App\TypePrestation;
							if(isset($_GET['info']))
							{
								echo '<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-check-circle"></i> '.$_GET['info'].'
							</div>';
							}
							
							if($nblistedmdP>0)
							{
						?> 
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Demandeur</th>
											<th>Coordonnées</th>
											<th>Types de Prestations</th>
											<th>Cahier des charges & Indications</th>
											<th class="text-center">Statut</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											for($i=0;$i<$nblistedmdP;$i++)
											{
												$k=$i+1;
										?>
												<tr>
													<td><strong>{{ $k }}</strong></td>
													<td><strong style="color: var(--ig-secondary, #1A3A6B);">{{ $listedmdP[$i]->nom }}</strong></td>
													<td>
														<span style="display:block; font-size:0.875rem;">{{ $listedmdP[$i]->email }}</span>
														<small class="text-muted"><i class="fa fa-phone"></i> {{ $listedmdP[$i]->tel }}</small>
													</td>
													<td>
														<?php
															for($j=0;$j<$nblistelier2;$j++)
															{
																if($listedmdP[$i]->id==$listelier2[$j]->dmdPrest)
																{
																	$libP = TypePrestation::where('id', $listelier2[$j]->typePrest)->get();
																	if(count($libP) > 0) {
																		echo '<span class="badge-status badge-status-info" style="margin-bottom: 2px;">'.$libP[0]->libPr.'</span> ';
																	}
																}
															}
														?>
													</td>
													<td style="max-width: 250px; white-space: normal; font-size: 0.875rem;">
														{{ $listedmdP[$i]->indicationPrest ?: 'Aucune précision complémentaire.' }}
													</td>
													<td class="text-center">
														@if($listedmdP[$i]->booldmdP==0)
															<span class="badge-status badge-status-warning"><i class="fa fa-clock-o"></i> En attente</span>
														@else
															<span class="badge-status badge-status-success"><i class="fa fa-check"></i> Traitée</span>
														@endif
													</td>
													<td class="text-center">
														<div style="display: inline-flex; gap: 4px;">
															@if($listedmdP[$i]->booldmdP==0)
																<form id="marq-form-{{$listedmdP[$i]->id}}" action="{{route('MarqP', 'mode=Marquer&idDmdP='.$listedmdP[$i]->id)}}" method="post" style="display:none;">
																	@csrf
																	@method('GET')
																</form>
																<button type="button" onclick="deleteT({{$listedmdP[$i]->id}},'Marquer','marq')" class="btn btn-xs btn-success" title="Marquer comme traitée">
																	<i class="fa fa-check"></i> Traiter
																</button>
															@endif
															<form id="delete-form-{{$listedmdP[$i]->id}}" action="{{route('SupP', 'mode=Supprimer&idDmdP='.$listedmdP[$i]->id)}}" method="post" style="display:none;">
																@csrf
																@method('DELETE')
															</form>
															<button type="button" onclick="deleteT({{$listedmdP[$i]->id}},'Supprimer','delete')" class="btn btn-xs btn-danger" title="Supprimer la demande">
																<i class="fa fa-trash-o"></i>
															</button>
														</div>
													</td>
												</tr>
										<?php
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
									<h4 style="font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-bottom: 0.5rem;">Aucune demande de prestation</h4>
									<p style="color: var(--ig-text-muted, #64748B); max-width: 480px; margin: 0 auto;">Les demandes de prestations informatiques formulées sur le site apparaîtront dans cette liste.</p>
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

@extends('Layouts/admin/baseAdmin',['title'=>'Domaines de Formations'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="admin-page-header">
				<div>
					<h3 style="margin: 0; font-size: 1.625rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">Domaines de Formations</h3>
					<p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">Gestion des filières et des modules de formation continue du cabinet</p>
				</div>
				<div>
					<a href="{{route('newForm', 'mode=Ajouter')}}" class="btn btn-primary font-weight-bold" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600; padding: 9px 18px; box-shadow: var(--ig-shadow-xs);">
						<i class="fa fa-plus-circle"></i> Nouveau Domaine
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
							<h3 class="panel-title">
								<i class="lnr lnr-laptop text-primary" style="margin-right: 6px;"></i> Domaines de formation existants
							</h3>
						</div>
						<div class="panel-body">
						<?php
							if(isset($_GET['info']))
							{
								echo '<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-check-circle"></i> '.$_GET['info'].'
							</div>';
							}
							if(isset($_GET['infoSup']) && $_GET['infoSup']==true)
							{
								echo '<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-check-circle"></i> Le domaine de formation a été supprimé avec succès.
							</div>';
							}
							if(isset($_GET['infoSup']) && $_GET['infoSup']==false)
							{
								echo '<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-exclamation-triangle"></i> Échec de la suppression : un ou plusieurs modules de ce domaine font l\'objet d\'une demande active.
							</div>';
							}
						?>
						
						@if($nblisteDomForm>0)
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>N°</th>
											<th>Intitulé du Domaine</th>
											<th>Modules associés</th>
											<th class="text-center">Affichage public</th>
											<th class="text-center">Visibilité</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										@for($i=0;$i<$nblisteDomForm;$i++)
											<tr>
												<td><strong>{{ $i+1 }}</strong></td>
												<td><strong style="color: var(--ig-secondary, #1A3A6B);">{{ $listeDomForm[$i]->libForm }}</strong></td>
												<td>
													<a href="{{route('listeModules','idDomForm='.$listeDomForm[$i]->id)}}" class="btn btn-xs btn-default" style="border-radius: var(--ig-radius-sm, 4px);">
														<i class="fa fa-eye text-primary"></i> Gérer les modules
													</a>
												</td>
												<td class="text-center">
													@if($listeDomForm[$i]->boolForm==1)
														<span class="badge-status badge-status-success"><i class="fa fa-check-circle"></i> Publié</span>
													@else
														<span class="badge-status badge-status-warning"><i class="fa fa-eye-slash"></i> Masqué</span>
													@endif
												</td>
												<td class="text-center">
													@if($listeDomForm[$i]->boolForm==1)
														<form id="ret-form-{{$listeDomForm[$i]->id}}" action="{{route('RetF','mode=Retirer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('GET')
														</form>
														<button type="button" onclick="deleteT({{$listeDomForm[$i]->id}},'Retirer','ret')" class="btn btn-xs btn-default" title="Retirer de la vue publique">
															<i class="lnr lnr-exit"></i> Masquer
														</button>
													@else
														<form id="int-form-{{$listeDomForm[$i]->id}}" action="{{route('RetF','mode=Integrer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('GET')
														</form>
														<button type="button" onclick="deleteT({{$listeDomForm[$i]->id}},'Integrer','int')" class="btn btn-xs btn-success" title="Publier sur le site public">
															<i class="lnr lnr-enter"></i> Publier
														</button>
													@endif
												</td>
												<td class="text-center">
													<div style="display: inline-flex; gap: 4px;">
														<a href="{{route('newForm','mode=Modifier&idDomF='.$listeDomForm[$i]->id)}}" class="btn btn-xs btn-default" title="Modifier le libellé">
															<i class="fa fa-pencil text-primary"></i>
														</a>
														<form id="delete-form-{{$listeDomForm[$i]->id}}" action="{{route('SupDomF','mode=Supprimer&idDomF='.$listeDomForm[$i]->id)}}" method="post" style="display:none;">
															@csrf
															@method('DELETE')
														</form>
														<button type="button" onclick="deleteT({{$listeDomForm[$i]->id}},'Supprimer','delete')" class="btn btn-xs btn-danger" title="Supprimer ce domaine">
															<i class="fa fa-trash-o"></i>
														</button>
													</div>
												</td>
											</tr>
										@endfor
									</tbody>
								</table>
							</div>
						@else
							<div class="text-center" style="padding: 3rem 1.5rem;">
								<div style="width: 64px; height: 64px; border-radius: 50%; background: var(--ig-surface-muted, #F1F5F9); color: var(--ig-text-muted, #64748B); display: inline-flex; align-items: center; justify-content: center; font-size: 1.75rem; margin-bottom: 1rem;">
									<i class="lnr lnr-laptop"></i>
								</div>
								<h4 style="font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-bottom: 0.5rem;">Aucun domaine de formation</h4>
								<p style="color: var(--ig-text-muted, #64748B); max-width: 480px; margin: 0 auto 1.5rem;">Créez votre premier domaine de formation pour commencer à organiser le catalogue.</p>
								<a href="{{route('newForm', 'mode=Ajouter')}}" class="btn btn-primary" style="border-radius: var(--ig-radius-md, 8px);">
									<i class="fa fa-plus-circle"></i> Ajouter un Domaine
								</a>
							</div>
						@endif
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

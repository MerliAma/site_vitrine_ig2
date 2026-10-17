@extends('Layouts/admin/baseAdmin',['title'=>'Modules de Formation'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="page-title">
				<div>
					<h3 style="margin: 0; font-size: 1.625rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">
						Modules : <span style="color: var(--ig-primary, #0A6E3F);">{{ $libDomForm }}</span>
					</h3>
					<p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">
						Gestion des programmes et thématiques spécifiques rattachés à ce domaine
					</p>
				</div>
				<div style="display: flex; gap: 8px;">
					<a href="{{ route('domForm') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px);">
						<i class="fa fa-arrow-left"></i> Domaines
					</a>
					<a href="{{ route('newModule','idDomForm='.$idDomForm) }}" class="btn btn-primary" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
						<i class="fa fa-plus-circle"></i> Nouveau Module
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
							<h3 class="panel-title">
								<i class="fa fa-cubes text-primary" style="margin-right: 6px;"></i> Modules configurés ({{ $nblisteModules }})
							</h3>
						</div>
						<div class="panel-body">
						<?php
							if(isset($_GET['info']) && $_GET['info']!="")
							{
								echo '<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-check-circle"></i> '.$_GET['info'].'
							</div>';
							}
							if(isset($_GET['info2']) && $_GET['info2']!="")
							{
								echo '<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-exclamation-triangle"></i> '.$_GET['info2'].'
							</div>';
							}
						?>

						@if($nblisteModules > 0)
							<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th style="width: 80px;">N°</th>
											<th>Intitulé du Module</th>
											<th class="text-center" style="width: 140px;">Actions</th>
										</tr>
									</thead>
									<tbody>
										@for($i=0;$i<$nblisteModules;$i++)
											<tr>
												<td><strong>{{ $i+1 }}</strong></td>
												<td><strong style="color: var(--ig-secondary, #1A3A6B);">{{ $listeModules[$i]->libMod }}</strong></td>
												<td class="text-center">
													<div style="display: inline-flex; gap: 4px;">
														<a href="{{route('newModule','idModule='.$listeModules[$i]->id.'&idDomForm='.$idDomForm)}}" class="btn btn-xs btn-default" title="Modifier ce module">
															<i class="fa fa-pencil text-primary"></i> Modifier
														</a>
														<form id="delete-form-{{$listeModules[$i]->id}}" action="{{route('supModule','idModule='.$listeModules[$i]->id.'&idDomForm='.$idDomForm)}}" method="post" style="display:none;">
															@csrf
															@method('DELETE')
														</form>
														<button type="button" onclick="deleteT({{$listeModules[$i]->id}},'Supprimer','delete')" class="btn btn-xs btn-danger" title="Supprimer ce module">
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
									<i class="fa fa-cubes"></i>
								</div>
								<h4 style="font-weight: 700; color: var(--ig-secondary, #1A3A6B); margin-bottom: 0.5rem;">Aucun module dans ce domaine</h4>
								<p style="color: var(--ig-text-muted, #64748B); max-width: 480px; margin: 0 auto 1.5rem;">Ajoutez les modules de formation qui composent ce domaine.</p>
								<a href="{{ route('newModule','idDomForm='.$idDomForm) }}" class="btn btn-primary" style="border-radius: var(--ig-radius-md, 8px);">
									<i class="fa fa-plus-circle"></i> Créer le premier module
								</a>
							</div>
						@endif

							<div style="margin-top: 1.5rem;">
								<a class="btn btn-default" href="{{route('domForm')}}" style="border-radius: var(--ig-radius-md, 8px);">
									<i class="fa fa-arrow-left"></i> Retour aux Domaines de Formation
								</a>
							</div>
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
@extends('Layouts/admin/baseAdmin', ['title' => 'Liste des Bénéficiaires'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
				<div>
					<h2 class="h3 font-weight-bold text-dark mb-1">Liste des Salariés Bénéficiaires</h2>
					<p class="text-muted mb-0">Détail des agents inscrits par l'entreprise pour cette session de formation continue</p>
				</div>
				<div class="mt-3 mt-md-0">
					<a class="btn btn-outline-secondary" href="{{ route('dmdForm') }}">
						<i class="lnr lnr-arrow-left mr-1"></i> Retour aux Demandes
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card border-0 shadow-sm" style="border-radius: var(--ig-radius-lg, 12px);">
						<div class="card-header bg-white border-bottom py-3">
							<h5 class="mb-0 font-weight-bold text-dark">
								<i class="lnr lnr-users mr-2 text-primary"></i> Participants rattachés à la demande ({{ $nblisteBenef }} salarié{{ $nblisteBenef > 1 ? 's' : '' }})
							</h5>
						</div>
						<div class="card-body p-0">
							@if($nblisteBenef > 0)
								<div class="table-responsive">
									<table class="table table-hover align-middle mb-0">
										<thead class="bg-light text-uppercase font-weight-bold" style="font-size: 0.8rem; letter-spacing: 0.5px;">
											<tr>
												<th class="border-0 px-4 py-3" style="width: 70px;">#</th>
												<th class="border-0 py-3">Matricule CNPS</th>
												<th class="border-0 py-3">Nom et Prénoms</th>
												<th class="border-0 py-3">Fonction</th>
												<th class="border-0 py-3 text-center">Catégorie</th>
												<th class="border-0 py-3 text-center">Année Embauche</th>
												<th class="border-0 py-3 text-center pr-4">Nationalité</th>
											</tr>
										</thead>
										<tbody>
											@for($i = 0; $i < $nblisteBenef; $i++)
												@php
													$benef = \App\Beneficiaire::where('id', $listeBenef[$i]->beneficiaire_id)->get();
													$num = $i + 1;
												@endphp
												@if(isset($benef[0]))
													<tr>
														<td class="px-4 py-3 text-muted font-weight-bold">{{ $num }}</td>
														<td class="py-3"><code>{{ $benef[0]->matBen ?: '-' }}</code></td>
														<td class="py-3"><strong class="text-dark">{{ $benef[0]->nomBen }}</strong></td>
														<td class="py-3 text-muted">{{ $benef[0]->foncBen ?: '-' }}</td>
														<td class="py-3 text-center">
															<span class="badge badge-light border text-primary font-weight-bold px-2 py-1">
																{{ $benef[0]->catBen ?: '-' }}
															</span>
														</td>
														<td class="py-3 text-center text-muted">{{ $benef[0]->AnEmBen ?: '-' }}</td>
														<td class="py-3 text-center pr-4 text-muted">{{ $benef[0]->NatBen ?: 'Ivoirienne' }}</td>
													</tr>
												@endif
											@endfor
										</tbody>
									</table>
								</div>
							@else
								<div class="text-center py-5">
									<i class="lnr lnr-user text-muted mb-3" style="font-size: 3rem;"></i>
									<h5 class="text-muted">Aucun bénéficiaire spécifié</h5>
									<p class="text-muted mb-0">Cette demande ne comporte pas encore de salariés rattachés.</p>
								</div>
							@endif

							<div class="p-3 border-top bg-light">
								<a class="btn btn-outline-secondary" href="{{ route('dmdForm') }}">
									<i class="lnr lnr-arrow-left mr-1"></i> Retour à la liste des demandes de formation
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
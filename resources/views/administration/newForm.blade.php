@extends('Layouts/admin/baseAdmin',['title'=>'Domaine de Formation'])

@section('contenu')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<?php
				use App\DomaineFormation;
				$mode = $_GET['mode'] ?? 'Ajouter';
				if($mode == "Modifier" && isset($_GET['idDomF']))
				{
					$DomF = DomaineFormation::find($_GET['idDomF']);
					$idDomF = $_GET['idDomF'];
					$titlePage = "Modification du Domaine de Formation";
				}
				else
				{
					$idDomF = null;
					$titlePage = "Nouveau Domaine de Formation";
				}
			?>
			
			<div class="page-title">
				<div>
					<h3 style="margin: 0; font-size: 1.625rem; font-weight: 700; color: var(--ig-secondary, #1A3A6B);">{{ $titlePage }}</h3>
					<p style="margin: 4px 0 0; font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">Renseignez les informations de la filière de formation continue</p>
				</div>
				<div>
					<a href="{{ route('domForm') }}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px);">
						<i class="fa fa-arrow-left"></i> Retour aux Domaines
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-edit text-primary" style="margin-right: 6px;"></i> Formulaire de gestion de domaine
							</h3>
						</div>
						<div class="panel-body">
							<form action="{{route('newForm2','mode='.$mode.'&idDomF='.$idDomF)}}" method="post">
								@csrf
								
								<div class="form-group">
									<label for="Input2" style="font-weight: 600; color: var(--ig-secondary, #1A3A6B);">
										Libellé du Domaine de Formation <span class="text-danger">*</span>
									</label>
									<input type="text" class="form-control" id="Input2" name="libForm" value="{{ $DomF->libForm ?? old('libForm') }}" placeholder="Ex: Comptabilité et Gestion Financière, Informatique Décisionnelle..." required>
									<span class="help-block" style="font-size: 0.8125rem; color: var(--ig-text-muted, #64748B);">Ce titre sera affiché sur le site public et dans le formulaire de demande.</span>
								</div>

								@if($idDomF == null)
									<div class="form-group" style="margin-top: 1.5rem; padding: 1.25rem; background: var(--ig-surface-muted, #F1F5F9); border-radius: var(--ig-radius-md, 8px); border: 1px solid var(--ig-border, #E2E8F0);">
										<label style="font-weight: 700; color: var(--ig-secondary, #1A3A6B); display: block; margin-bottom: 0.5rem;">
											<i class="fa fa-cubes text-success"></i> Modules associés à ce domaine
										</label>
										<p style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); margin-bottom: 1rem;">
											Indiquez le nombre de modules initiaux à créer sous ce domaine, puis cliquez sur <strong>Générer</strong> pour saisir leurs libellés.
										</p>
										
										<div class="row" style="margin-bottom: 1rem;">
											<div class="col-sm-6">
												<div class="input-group">
													<input type="number" class="form-control nbBen" name="nbBen" id="nbBen" min="1" max="50" placeholder="Nombre de modules" value="1" onChange="nbLigne()">
													<span class="input-group-btn">
														<button type="button" id="VBen" class="btn btn-primary VBen" onClick="nbLigne()">Générer les lignes</button>
													</span>
												</div>
											</div>
										</div>

										<div id="Err" class="Err text-danger" style="font-weight: 600; margin-bottom: 0.5rem;"></div>

										<div class="table-responsive" style="margin-top: 0.75rem; background: #fff;">
											<table id="table" class="table table-bordered table-striped" style="margin-bottom: 0;">
												<thead>
													<tr style="background: var(--ig-surface-muted, #F1F5F9);">
														<th style="width: 60px;">N°</th>
														<th>Intitulé du module</th>
													</tr>
												</thead>
												<tbody id="ligne">
												</tbody>
											</table>
										</div>
									</div>
								@endif

								<div class="form-group" style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid var(--ig-border, #E2E8F0); display: flex; gap: 12px; justify-content: flex-end;">
									<a href="{{route('domForm')}}" class="btn btn-default" style="border-radius: var(--ig-radius-md, 8px);">
										Annuler
									</a>
									<button type="submit" class="btn btn-primary" name="validForm" style="border-radius: var(--ig-radius-md, 8px); font-weight: 600;">
										<i class="fa fa-check"></i> Enregistrer le Domaine
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<script>
function nbLigne(){  
	var nbBen = document.getElementById('nbBen');
	if(!nbBen) return;
	var val = parseInt(nbBen.value, 10);
	var table = document.getElementById('table');
	var ligne = document.getElementById('ligne');
	var err = document.getElementById('Err');

	if(isNaN(val) || val < 1) {
		val = 1;
		nbBen.value = 1;
		if(err) err.innerHTML = "Attention : veuillez ajouter au moins 1 module.";
	} else {
		if(err) err.innerHTML = "";
	}

	var nbTrVrai = ligne.children.length;

	if(val > nbTrVrai) {
		while(val > nbTrVrai) {
			var newTr = document.createElement("tr");
			ligne.appendChild(newTr);
			var nOrdre = nbTrVrai + 1;
			newTr.innerHTML = "<td><strong>" + nOrdre + "</strong></td><td><input type='text' class='form-control' placeholder='Ex: Module " + nOrdre + "...' /></td>";
			newTr.children[1].children[0].setAttribute("required", "required");
			newTr.children[1].children[0].setAttribute("name", "libMod" + nbTrVrai);
			nbTrVrai = ligne.children.length;
		}
	} else {
		while(val < nbTrVrai) {
			ligne.removeChild(ligne.lastChild);
			nbTrVrai = ligne.children.length;
		}
	}
}

// Initialiser automatiquement 1 ligne par défaut
window.addEventListener('DOMContentLoaded', function() {
	if(document.getElementById('nbBen')) {
		nbLigne();
	}
});
</script>
@endsection
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
					<h3 class="page-title">Liste des Bénéficiaires</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
								
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>Matricule CNPS</th>
												<th>Nom et Prénoms</th>
												<th>Fonction</th>
												<th>Catégorie</th>
												<th>Année Embauche</th>
												<th>Nationnalité</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											use App\Beneficiaire;  
											for($i=0;$i<$nblisteBenef;$i++)
											{
											$benef=Beneficiaire::where('id',$listeBenef[$i]->beneficiaire_id)->get();
											$num=$i+1;
											echo '<tr><td>'.$num.'</td>
												<td>'.$benef[0]->matBen.'</td>
												<td>'.$benef[0]->nomBen.'</td>
												<td>'.$benef[0]->foncBen.'</td>
												<td>'.$benef[0]->catBen.'</td>
												<td>'.$benef[0]->AnEmBen.'</td>
												<td>'.$benef[0]->NatBen.'</td>
											</tr>';
											}
											?>
										</tbody>
									</table>
									<a class="btn btn-primary" href="{{route('dmdForm')}}"><i class="fa fa-arrow-left"></i>&nbsp; Retour aux Demandes</a>
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
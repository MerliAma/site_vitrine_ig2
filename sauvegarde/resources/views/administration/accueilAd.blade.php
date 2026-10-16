@extends('Layouts/admin/baseAdmin',['title'=>'Dashboard'])

@section('navactive')
<ul class="nav">
	<li><a href="{{route('accueilAd')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
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
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Bienvenue sur la Plateforme d'Administration</h3>
							<p class="panel-subtitle"><?php $date=date('d/m/Y'); echo("Aujourd'hui, $date"); ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
                                <div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-laptop"></i></span>
										<p>
											<span class="number"><?php echo $nbdmdform; ?></span>
											<span class="title">Demandes Formation</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-code"></i></span>
										<p>
											<span class="number"><?php echo $nbdmdprest; ?></span>
											<span class="title">Demandes Prestations</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-calendar-full"></i></span>
										<p>
											<span class="number"><?php echo $nbEvent; ?></span>
											<span class="title">Evènements en ligne</span>
										</p>
									</div>
								</div>
								<!--<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">35%</span>
											<span class="title">Conversions</span>
										</p>
									</div>
								</div>--> 
							</div>
						</div>
					</div>	
						<div class="row">
							<div class="col-md-8">
								<!-- TODO LIST -->
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">To-Do List (Tâches Journalières)</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<ul class="list-unstyled todo-list">
											<li>
												<label class="control-inline fancy-checkbox">
													<input type="checkbox"><span></span>
												</label>
												<p>
													<span class="title">Evènements</span>
													<span class="short-description">Vérifier les dates des évènements et actualiser les données si nécessaires.</span>
												</p>
												<div class="controls">
													<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
												</div>
											</li>
											<li>
												<label class="control-inline fancy-checkbox">
													<input type="checkbox"><span></span>
												</label>
												<p>
													<span class="title">Demandes de formation</span>
													<span class="short-description">Il s'agit de la formation continue pour les salariés.<br/>Examiner les demandes faites par les entreprises et faire le suivi.</span>
												</p>
												<div class="controls">
													<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
												</div>
											</li>
											<li>
												<label class="control-inline fancy-checkbox">
													<input type="checkbox"><span></span>
												</label>
												<p>
													<strong>Demandes de prestations</strong>
													<span class="short-description">Il s'agit de prestations spécifiques à Inter-Groupe. <br/>Examiner les demandes faites par les clients et faire le suivi.</span>
												</p>
												<div class="controls">
													<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- END TODO LIST -->
							<div class="col-md-4">
								<!-- PANEL NO PADDING -->
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Panel No Padding</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body no-padding bg-primary text-center">
										<div class="padding-top-30 padding-bottom-30">
											<i class="fa fa-thumbs-o-up fa-5x"></i>
										</div>
									</div>
								</div>
								<!-- END PANEL NO PADDING -->
							</div>
							<div class="col-md-4">
								<!-- PANEL WITH FOOTER -->
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">INTER-GROUPE</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<p>Cabinet de formation agréé par le FDFP</p>
									</div>
									<div class="panel-footer">
										<h5><a href="http://www.intergroupe-ci.com/" target="_blank">Voir le site</a></h5>
									</div>
								</div>
								<!-- END PANEL WITH FOOTER -->
							</div>
							
@endsection
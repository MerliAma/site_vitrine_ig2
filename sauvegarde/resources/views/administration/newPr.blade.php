@extends('Layouts/admin/baseAdmin',['title'=>'Nouvelle Prestation'])

@section('navactive')
<ul class="nav">
	<li><a href="{{route('accueilAd')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
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
	<li><a href="{{route('typePr')}}" class="active"><i class="lnr lnr-code"></i> <span>Types Prestations</span></a></li>
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
				<?php
                    use App\TypePrestation;
                    use App\suggestion;
                    $nbSugNonLu=suggestion::where('boolSug','0')->count();
                    if($_GET['mode']=="Modifier")
                    {
                        $typeP=TypePrestation::find($_GET['idTypeP']);
                        $idTypeP=$_GET['idTypeP'];
                        $actionNewEv="Modification d'un Type de Prestation";
                    }
                    else
                    {
                        $idTypeP=null;
                        $actionNewP="Ajout d'un nouveau Type de Prestation";
                    }
                ?>
					<h3 class="page-title"><?php if(isset($actionNewP)) {echo $actionNewP;} ?></h3> 
					<div class="row">
						<div class="col-md-5 formulaire">
                            <!--<div class="panel">-->
                                <form action="{{route('newPr2','mode='.$_GET['mode'].'&idTypeP='.$idTypeP)}}" method="post">
								@csrf
                                    <!--<div class="form-group">
                                        <label for="Input1">Identifiant</label>
                                        <input type="text" class="form-control" id="Input1" placeholder="" name="idPr">
                                    </div>-->
                                    <div class="form-group">
                                        <label for="Input2" class="text-info">Libellé du Type</label>
                                        <input type="text" class="form-control" id="Input2" placeholder="" name="libPr" value="<?php if(isset($typeP)) {echo $typeP->libPr;} ?>" required="required">
                                    </div>
                                    <br/><br/>
                                    <div class="form-group">
                                        <div class="col">
                                        <center><button type="submit" class="btn btn-success" name="validPr"><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{route('typePr')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a></center>
                                        </div>
                                    </div>
                                </form>
                            <!--</div>-->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<!--END MAIN--> 
@endsection
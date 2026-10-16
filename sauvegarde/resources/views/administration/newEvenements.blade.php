@extends('Layouts/admin/baseAdmin',['title'=>'Ajouter ou Modifier un Evènement'])

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
	<li><a href="{{route('typePr')}}" class=""><i class="lnr lnr-code"></i> <span>Types Prestations</span></a></li>
	<li><a href="{{route('suggestions')}}" class=""><i class="lnr lnr-alarm"></i> <span>Suggestions</span></a></li>
	<li><a href="{{route('evenements')}}" class="active"><i class="lnr lnr-calendar-full"></i> <span>Evènements</span></a></li>
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
                    use App\evenement;
                    use App\suggestion;
                    $nbSugNonLu=suggestion::where('boolSug','0')->count();
                    if(isset($_GET['mode']))
                    {
                        $mode=$_GET['mode'];
                        if($mode=="Modifier")
                        {
                            $idEvent=$_GET['idEvent'];
                            $event=evenement::find($idEvent);
                            $actionNewEv="Modification d'un Evènement";
                        }
                        else
                        {
                            $idEvent=null;
                            $actionNewEv="Ajout d'un nouvel Evènement";
                        }
                    }
                    /*if(isset($idEvent2) && isset($mode2))
                    {
                        $idEvent=$idEvent2;
                        $mode=$mode2;
                    }*/
                    
                ?>
					<h3 class="page-title"><?php if(isset($actionNewEv)) {echo $actionNewEv;} ?></h3> 
					<div class="row">
						<div class="col-md-5 formulaire">
                        
                        <?php
                           
                            if(isset($info1) && $info1!="")
                            {
                                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$info1.'
                            </div>';
                            }
                            if(isset($info2) && $info2!="")
                            {
                                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$info2.'
                            </div>';
                            }
                        
                        ?>
                            <!--<div class="panel">-->
                                <form action="{{route('newEvenements2','mode='.$mode.'&idEvent='.$idEvent)}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="Input2" class="text-info">Thème Formation</label>
                                        <input type="text" class="form-control" id="Input2" name="themEvent" required="required" value="{{$event->themEvent ?? old('themEvent')}}"> <!--if(isset($event)) {echo $event->themEvent;} ?>-->
                                    </div>
                                    <div class="form-group">
                                        <label for="Input3" class="text-info">Entreprise Concernée</label>
                                        <input type="text" class="form-control" id="Input3" name="entEvent" required="required" value="{{$event->entEvent ?? old('entEvent')}}"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="Input4" class="text-info">Date Debut</label>
                                        <input type="date" class="form-control" id="Input4" name="datedebEvent" required="required" value="{{$event->datedebEvent ?? old('datedebEvent')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Input5" class="text-info">Date Fin</label>
                                        <input type="date" class="form-control" id="Input5" name="datefinEvent" required="required" value="{{$event->datefinEvent ?? old('datefinEvent')}}">
                                    </div>
                                    
                                    <br/>
                                    <div class="form-group">
                                        <div class="col">
                                        <center><button type="submit" class="btn btn-success" name="validEvent"><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{route('evenements')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a></center>
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
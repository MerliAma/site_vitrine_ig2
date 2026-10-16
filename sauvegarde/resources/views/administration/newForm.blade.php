@extends('Layouts/admin/baseAdmin',['title'=>'Nouveau Domaine de Formation'])

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
	<li><a href="{{route('domForm')}}" class="active"><i class="lnr lnr-laptop"></i> <span>Domaines Formations</span></a></li>
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
<style>
    #Err{
        color:red;
    }
    #entete{
        padding:15px;
    }
    #nbBen{
        margin:15px;
    }
    td{
        padding:10px;
        font-size:17px;
    }
</style>
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<?php
                    use App\DomaineFormation;
                    use App\suggestion;
                    $nbSugNonLu=suggestion::where('boolSug','0')->count();
                    if($_GET['mode']=="Modifier")
                    {
                        $DomF=DomaineFormation::find($_GET['idDomF']);
                        $idDomF=$_GET['idDomF'];
                        $actionNewEv="Modification d'un Domaine de Formation";
                    }
                    else
                    {
                        $idDomF=null;
                        $actionNewF="Ajout d'un nouveau Domaine de Formation";
                    }
                ?>
					<h3 class="page-title"><?php if(isset($actionNewF)) {echo $actionNewF;} ?></h3> 
					<div class="row">
						<div class="col-md-5 formulaire">
                            <!--<div class="panel">-->
							<form action="{{route('newForm2','mode='.$_GET['mode'].'&idDomF='.$idDomF)}}" method="post">
							@csrf
                                    <!--<div class="form-group">
                                        <label for="Input1">Identifiant</label>
                                        <input type="text" class="form-control" id="Input1" placeholder="" name="idForm">
                                    </div>-->
                                    <div class="form-group">
                                        <label for="Input2" class="text-info">Libellé du Domaine</label>
                                        <input type="text" class="form-control" id="Input2" name="libForm" value="<?php if(isset($DomF)) {echo $DomF->libForm;} ?>" required="required">
                                    </div>
                                    <br/><br/>
									<?php
										if($idDomF==null){
                                        echo '<div class="form-group">
                                    <label class="text-info">Modules Associés</label><br/>';
									
										echo '<span id="entete">Entrez le Nombre de Modules à ajouter</span> <br/><input type="number" class="nbBen" name="nbBen" id="nbBen" required="required" title="Appuyer sur OK pour valider" onChange="nbLigne()"/>
											 &nbsp;&nbsp;&nbsp;<button type="button" id="VBen" class="VBen" onClick="nbLigne()">OK</button>
											 <div id="Err" class="Err"></div>
											 <table id="table" >
												 <thead >
													 
												 </thead>
												 <tbody id="ligne" >
													 
												 </tbody>
                                             </table>
                                             </div>';
                                        }
									?>
                                    
                                    <div class="form-group">
                                        <div class="col">
                                        <center><button type="submit" class="btn btn-success" name="validForm"><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{route('domForm')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a></center>
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
<script>

        /*for(i=1;i<document.getElementsByClassName('nbBen').length;i++)
        {
            //window.addEventListener('load',nbLigne(i));
            nbLigne(i);
        }*/

        function nbLigne(){  
            
        var nbBen = document.getElementById('nbBen').value;
        var nbTr=document.getElementById('table').children[1].children.length;
        let ligne = document.getElementById('ligne');
        var nbTrVrai=nbTr;
        var nOrdre;

        document.getElementById('table').children[0].innerHTML="<td>N° </td><td>Libellé du module</td>";
        if(nbBen==0)
        {
            nbBen=1; 
            document.getElementById('Err').innerHTML="Attention! Il faut au moins 1 Module à ajouter";
            document.getElementById('nbBen').value=1;
        }
       
        if(nbBen>nbTrVrai)
        {
            while(nbBen>nbTrVrai)
            {
                var newTr = document.createElement("tr");
                ligne.appendChild(newTr);
                newTr.setAttribute('name','tr');
                //nbTr=document.getElementById('table1').getElementsByTagName('tr').length;
                nbTr=document.getElementById('table').children[1].children.length;
                nOrdre=nbTrVrai+1;
                
                newTr.innerHTML="<td>"+nOrdre+"</td><td><input /></td>";
               
                //les attributs "name" et "required" pr les inputs!
                newTr.children[1].children[0].setAttribute("required","required");

                newTr.children[1].children[0].setAttribute("name","libMod"+nbTrVrai);

                nbTrVrai=nbTr;
            }
            
        }
        else
        {
            while(nbBen<nbTrVrai)
            {
                ligne.removeChild(ligne.lastChild);
                nbTr=document.getElementById('table').children[1].children.length;
                nbTrVrai=nbTr;
            }
        }
        }
    </script> 
@endsection
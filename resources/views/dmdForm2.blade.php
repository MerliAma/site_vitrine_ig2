@extends('Layouts/baseHTML',['title'=>'Demande de Formation (Suite)'])

@section('menu')
<?php
use App\Module;
$idEnt=$_GET['idEnt'];
$attentes=$_GET['attentes'];
$tabIdMod=$_GET['tabIdMod'];
$tabIdMod2=implode('/',$_GET['tabIdMod']); //transforme le tableau en chaine de caractère pr le passer en paramètre
?>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('quitter','idEnt='.$idEnt.'&page=Ac')}}">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('quitter','idEnt='.$idEnt.'&page=present')}}">Présentation</a>
    </li>
    <li class="nav-item active enCours">
        <a class="nav-link" href="{{route('quitter','idEnt='.$idEnt.'&page=domF')}}">Domaines de Formations</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('quitter','idEnt='.$idEnt.'&page=dev')}}">Développement</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('quitter','idEnt='.$idEnt.'&page=cont')}}">Contact</a>
    </li>
@endsection

@section('corps')

    <div class="col-8">
        <div class="col formulaire2"> 

                @if(isset($_GET['info']))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$_GET['info']}}
                </div>
                @endif
                
                
            <h4 class="sousTitreF" font="30px"> Bénéficiaires des Modules</h4> <!-- class utilisée sur la page "fdfp" -->
            <form method="post" action="{{route('newdmdForm2','idEnt='.$idEnt.'&tabIdMod='.$tabIdMod2.'&attentes='.$attentes)}}">
            @csrf
            <?php
            //echo "<form method="post" action="{{route('newdmdForm2','idEnt='..)">'";
            //$tabIdMod=$_GET['tabIdMod'];
            for($i=0;$i<count($tabIdMod);$i++)
            {
                //echo count($tabIdMod);
                $libMod=Module::find($tabIdMod[$i])->libMod;
                $cpt=$i+1;
                echo '<h4>Module '.$cpt.' : '.$libMod.'</h4> <span>Entrez le Nombre de Bénéficiaires&nbsp;&nbsp;</span> <input type="number" class="nbBen" name="nbBen'.$cpt.'" id="nbBen'.$cpt.'" required="required" title="Appuyer sur OK pour valider" onChange="nbLigne('.$cpt.')"/>
                &nbsp;&nbsp;&nbsp;<button id="VBen'.$cpt.'" class="VBen" onClick="nbLigne('.$cpt.')">OK</button>
                <div id="Err'.$cpt.'" class="Err"></div>
                <table id="table'.$cpt.'" >
                    <thead >
                        
                    </thead>
                    <tbody id="ligne'.$cpt.'" >
                        
                    </tbody>
                </table>';
            }
            ?><br/><br/>
                <div class="form-row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="validDmdF">Soumettre</button>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                            <a href="{{route('quitter','idEnt='.$idEnt.'&page=domF')}}"><button type="button" class="btn btn-danger" name="">Annuler</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>

        /*for(i=1;i<document.getElementsByClassName('nbBen').length;i++)
        {
            //window.addEventListener('load',nbLigne(i));
            nbLigne(i);
        }*/

        function nbLigne(nbM){  
            
        var nbBen = document.getElementById('nbBen'+nbM).value;
        var nbTr=document.getElementById('table'+nbM).children[1].children.length;
        let ligne = document.getElementById('ligne'+nbM);
        var nbTrVrai=nbTr;
        var nOrdre;

        document.getElementById('table'+nbM).children[0].innerHTML="<td>N° </td><td>Nom et Prénoms</td><td>Matricule CNPS</td><td>Fonction</td><td>Catégorie</td><td>Année Embauche</td><td>Nationnalité</td>";
        if(nbBen<=0)
        {
            nbBen=1; 
            document.getElementById('Err'+nbM).innerHTML="Attention! Il faut au moins 1 Bénéficiaires";
            document.getElementById('nbBen'+nbM).value=1;
        }
       
        if(nbBen>nbTrVrai)
        {
            
            while(nbBen>nbTrVrai)
            {
                var newTr = document.createElement("tr");
                ligne.appendChild(newTr);
                newTr.setAttribute('name','tr');
                //nbTr=document.getElementById('table1').getElementsByTagName('tr').length;
                nbTr=document.getElementById('table'+nbM).children[1].children.length;
                nOrdre=nbTrVrai+1;
                for(i=0;i<4;i++)
                {
                    newTr.innerHTML="<td>"+nOrdre+"</td><td><input /></td><td><input maxlength=\"12\" minlength=\"12\"/></td><td><input /></td><td><select class=\"selectCat\"><option value=\"Agent de Maîtrise\">Agent de Maîtrise</option><option value=\"Cadre\">Cadre</option><option value=\"Employé/Ouvrier\">Employé/Ouvrier</option></select></td><td><input type=\"number\"/></td><td><input /></td>";
                }
                //les attributs "name" et "required" pr les inputs!
                newTr.children[4].children[0].setAttribute("required","required");
                newTr.children[1].children[0].setAttribute("required","required");
                newTr.children[2].children[0].setAttribute("required","required");
                newTr.children[3].children[0].setAttribute("required","required");
                newTr.children[5].children[0].setAttribute("required","required");
                newTr.children[5].children[0].setAttribute("maxlength","4");
                newTr.children[6].children[0].setAttribute("required","required");

                newTr.children[1].children[0].setAttribute("name","nom"+nbM+nbTrVrai);
                newTr.children[2].children[0].setAttribute("name","mat"+nbM+nbTrVrai);
                newTr.children[3].children[0].setAttribute("name","fonc"+nbM+nbTrVrai);
                newTr.children[4].children[0].setAttribute("name","cat"+nbM+nbTrVrai);
                newTr.children[5].children[0].setAttribute("name","AnEm"+nbM+nbTrVrai);
                newTr.children[6].children[0].setAttribute("name","nat"+nbM+nbTrVrai);

                nbTrVrai=nbTr;
            }
            
        }
        else
        {
            while(nbBen<nbTrVrai)
            {
                ligne.removeChild(ligne.lastChild);
                nbTr=document.getElementById('table'+nbM).children[1].children.length;
                nbTrVrai=nbTr;
            }
        }
        }
    </script>
@endsection
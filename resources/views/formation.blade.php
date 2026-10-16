@extends('Layouts/baseHTML',['title'=>'Formation'])

@section('menu')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('presentation')}}">Présentation</a>
    </li>
    <li class="nav-item active enCours">
        <a class="nav-link" href="{{route('formation')}}">Domaines de Formations</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('developpement')}}">Développement</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
    </li>
@endsection

@section('corps')
    <div class="col-8 formation">
        <?php
            if(isset($info2))
            {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                '.$info2.'
            </div>';
            }
            if(isset($_GET['info']))
            {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                '.$_GET['info'].'
            </div>';
            }
        ?>
    @if(isset($info2)==false)
    <h2 class="titreCadre"> Aperçu des Modules <i class="info">(Cliquez sur les Domaines pour voir les modules associés)</i></h2> <br/> <!-- class utilisée dans sur la page "developpement" -->
        <!--tantque i<nbDomaine {(div container) domaine i, domaine i+1, i++} if i==nbdomaine {(div container ->col-6)}-->
        
        <?php
        $i=0;
        while($i<($nblisteDomForm-1))
        {
            
        echo'<div class="container"><div class="row">
            <div class="col nav"> 
               <label for="menu-mobile'.$i.'" class="menu-mobile" title="Cliquez pour voir les modules"><h4>'.$listeDomForm[$i]->libForm.'</h4></label>
                <input type="checkbox" id="menu-mobile'.$i.'" role="button" class="inputChk"/>
                <ul class="items sousMenu">';
                   for($j=0;$j<$nbModule;$j++)
                   {
                    if($listeModule[$j]->domForm_id==$listeDomForm[$i]->id)
                    {
                        echo'<li class="available">
                            <div class="icon-holder">
                                <i class="fa fa-check text-success"></i>  
                            </div>
                            <div class="desc">
                                <span class="text-black">'.
                                    $listeModule[$j]->libMod.'
                                </span>
                            </div>
                        </li>';
                    }
                   }             
                  echo'</ul>
            </div>';
            $i++; 
            
            echo'<div class="col nav"> 
               <label for="menu-mobile'.$i.'" class="menu-mobile" title="Cliquez pour voir les modules"><h4>'.$listeDomForm[$i]->libForm.'</h4></label>
                <input type="checkbox" id="menu-mobile'.$i.'" role="button" class="inputChk"/>
                <ul class="items sousMenu">';
                   for($j=0;$j<$nbModule;$j++)
                   {
                    if($listeModule[$j]->domForm_id==$listeDomForm[$i]->id)
                    {
                        echo'<li class="available">
                            <div class="icon-holder">
                                <i class="fa fa-check text-success"></i>  
                            </div>
                            <div class="desc">
                                <span class="text-black">'.
                                    $listeModule[$j]->libMod.'
                                </span>
                            </div>
                        </li>';
                    }
                   }             
                  echo'</ul>
            </div> 
            </div></div> </br>';
            $i++;
        }
        if($i==($nblisteDomForm-1))
        {
            
        echo'<div class="container"><div class="row">
        <div class="col-6 nav"> 
           <label for="menu-mobile'.$i.'" class="menu-mobile" title="Cliquez pour voir les modules"><h4>'.$listeDomForm[$i]->libForm.'</h4></center>
            <input type="checkbox" id="menu-mobile'.$i.'" role="button" class="inputChk"/>
            <ul class="items sousMenu">';
               for($j=0;$j<$nbModule;$j++)
               {
                if($listeModule[$j]->domForm_id==$listeDomForm[$i]->id)
                {
                    echo'<li class="available">
                        <div class="icon-holder">
                            <i class="fa fa-check text-success"></i>  
                        </div>
                        <div class="desc">
                            <span class="text-black">'.
                                $listeModule[$j]->libMod.'
                            </span>
                        </div>
                    </li>';
                }
               }             
              echo'</ul>
        </div>
        </div></div>';
        }
       ?> 
       <br/><br/>
        A la recherche d'un Cabinet pour la formation continue ? <a href="{{route('dmdFormation')}}" class="btn btn-success"> Envoyer une Demande </a>
    @endif
    </div>
@endsection
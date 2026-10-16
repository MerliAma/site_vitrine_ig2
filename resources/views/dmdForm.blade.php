@extends('Layouts/baseHTML',['title'=>'Demande de Formation'])

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
    <div class="col-8">
        <div class="col formulaire"> <br/>

                @if(isset($_GET['info']))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$_GET['info']}}
                </div>
                @endif
                @if(isset($_GET['info2']))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$_GET['info2']}}
                </div>
                @endif
                @if($errors->has('tel'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Erreur sur le numéro de télephone
                </div>
                @endif
                
            <h4 class="sousTitreF" font="30px"> Formulaire de Demande De Formation</h4> <!-- class utilisée sur la page "fdfp" -->
            <form method="post" action="{{route('newdmdForm')}}" >
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input4">N° Compte Contribuable</label>
                        <input type="text" class="form-control" id="input4" placeholder="0000000-L" maxlength="9" name="ncc" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input5">Masse Salariale Prévisionnelle Annuelle</label>
                        <input type="number" class="form-control" id="input5" name="MSalarialePA" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Input1">Raison Social</label>
                    <input type="text" class="form-control" id="Input1" placeholder="Raison social" name="raisonSocial" required="required">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="Input2">Email</label>
                        <input type="email" class="form-control" id="Input2" placeholder="name@example.com" name="email" required="required">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="Input3">Téléphone</label>
                        <input type="text" class="form-control" id="Input3" placeholder="0102030405" name="tel" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label>Modules (Cliquez sur les domaines ci-dessous et cochez les modules souhaités)</label>
                    <br/><br/>
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
                                <input type="checkbox" name="mod'.$listeModule[$j]->id.'" value="'.$listeModule[$j]->id.'"/> 
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
                                <input type="checkbox" name="mod'.$listeModule[$j]->id.'" value="'.$listeModule[$j]->id.'"/>  
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
           <label for="menu-mobile'.$i.'" class="menu-mobile" title="Cliquez pour voir les modules"><h4>'.$listeDomForm[$i]->libForm.'</h4></label>
            <input type="checkbox" id="menu-mobile'.$i.'" role="button" class="inputChk"/>
            <ul class="items sousMenu">';
               for($j=0;$j<$nbModule;$j++)
               {
                if($listeModule[$j]->domForm_id==$listeDomForm[$i]->id)
                {
                    echo'<li class="available">
                        <div class="icon-holder">
                            <input type="checkbox" name="mod'.$listeModule[$j]->id.'" value="'.$listeModule[$j]->id.'"/>  
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
            </div>
                <div class="form-group">
                <label for="Textarea1">Attentes et Autres Modules Souhaités</label>
                <textarea class="form-control" id="Textarea1" rows="5" name="attentes"></textarea>
                </div>
                <div class="form-group">
                    <div class="col">
                        <center><button type="submit" class="btn btn-primary" name="validDmdF">Soumettre</button>
                            <a href="{{route('formation')}}"><button type="button" class="btn btn-danger" name="AnnulF">Annuler</button></a>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
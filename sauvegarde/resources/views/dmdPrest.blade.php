@extends('Layouts/baseHTML',['title'=>'Demande de Prestation'])

@section('menu')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('presentation')}}">Présentation</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('formation')}}">Domaines de Formations</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('developpement')}}">Développement</a>
    </li>
    <li class="nav-item active enCours">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
    </li>
@endsection

@section('corps')
    <div class="col-8">
        <div class="col formulaire">
                @if(isset($_GET['info']))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$_GET['info']}}
                </div>
                @endif
                @if($errors->has('tel'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Erreur sur le numéro de télephone
                </div>
                @endif
         <br/>
            <h4 class="sousTitreF" font="30px"> Formulaire de Demande De Prestation</h4> <!-- class utilisée sur la page "fdfp" -->
            <form method="post" action="{{route('newdmdPrest')}}">
            @csrf
                <div class="form-group">
                    <label for="Input1">Nom et Prénoms</label>
                    <input type="text" class="form-control" id="Input1" placeholder="Nom Prénom" name="nom" required="required">
                </div>
                <div class="form-group">
                    <label for="Input2">Email</label>
                    <input type="email" class="form-control" id="Input2" placeholder="name@example.com" name="email" required="required">
                </div>
                <div class="form-group col-20">
                    <label for="Input3">Téléphone</label>
                    <input type="text" class="form-control" id="Input3" placeholder="0102030405" name="tel" required="required">
                </div>
                <div class="form-group">
                    <label>Type de Prestation</label>
                    <blockquote>
                    <!--<div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Checkbox1" value="">
                        <label class="form-check-label" for="Checkbox1">Création de Sites</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Checkbox2" value="">
                        <label class="form-check-label" for="Checkbox2">Développement d'application Bureau Locale</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Checkbox3" value="">
                        <label class="form-check-label" for="Checkbox3">Développement d'application Bureau Client/Serveur</label>
                    </div>-->
                    <?php
						for($i=0;$i<$nblisteTypePr;$i++)
						{
                            if($listeTypePr[$i]->boolTPrest==1)
                            {
                                echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" id="Checkbox'.$i.'" value="'.$listeTypePr[$i]->id.'" name="'.$i.'">
                            <label class="form-check-label" for="Checkbox'.$i.'">'.$listeTypePr[$i]->libPr.'</label>
                        </div>';
                            }
                            
                        }
                    ?>
                    </blockquote>
                </div>
                <div class="form-group">
                    <label for="Textarea1">Autres Indications</label>
                    <textarea class="form-control" id="Textarea1" rows="5" name="indicationPrest"></textarea>
                </div>
                <div class="form-group">
                    <div class="col">
                       <center><button type="submit" class="btn btn-primary" name="validDmdPrest">Soumettre</button>&nbsp;&nbsp;&nbsp;
                            <a href="{{route('contact')}}"><button type="button" class="btn btn-danger" name="AnnulPrest">Annuler</button></a>
                       </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
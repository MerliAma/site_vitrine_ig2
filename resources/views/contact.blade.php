@extends('Layouts/baseHTML',['title'=>'Contact'])

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
       <!--addresse et suggestions start-->
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
        <div class="row">
            <div class="col-6 address"> <br/><br/>
                <div>
                    <span>ADRESSES</span><br/><br/>
                    <p>Treichville Avenue 1</p>
                    <p>Résidence PONT DE GAULE Escalier A 1er Etage</p>
                    <p>Porte A/1</p>
                </div>
                <div>
                    <span>HEURES DE TRAVAIL</span><br/><br/>
                    <p>Lundi - Vendredi 8H 00mn à 17H 00mn</p>
                    <p>Samedi - Fermé</p>  <!--8H 00mn à 12H 00mn-->
                    <p>Dimanche- Fermé</p>
                </div>
                <div>
                    <span>TELEPHONES</span><br/><br/>
                    <p><blockquote><i class=""></i></blockquote> 27-21-25-05-24 </p>
                </div>
            </div>
            <div class="col formulaire"> <br/>
                <h4 class="sousTitreF" font="30px"> Envoyer nous vos Suggestions et Avis</h4> <!-- class utilisée sur la page "fdfp" -->
                <form method="post" action="{{route('SugCont')}}">
                @csrf 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom Prénom" name="nomSug" required="required" value="{{old('nomSug')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="mailSug" value="{{old('mailSug')}}"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Téléphone</label>
                        <input type="number" class="form-control" id="exampleFormControlInput3" placeholder="0102030405" name="telSug" value="{{old('telSug')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msgSug" required="required" >{{old('msgSug')}}</textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="validSug">Soumettre</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       <!--addresse et suggestions start-->
<br/> <br/>
       <!--google map start-->
        <div class="contact-map">
            <div id="map-canvas" style="width: 100%; height: 300px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.6835083711567!2d-4.012403799999998!3d5.311978300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ebc3ed8a44d1%3A0x75aed55330be96b9!2sPalais+de+la+Culture!5e0!3m2!1sfr!2sci!4v1442785288463" width="660" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <!--google map end-->
        <br/><br/><br/><br/><br/><br/>
        <div> 
           Besoin d'une Prestation ?
            <a href="{{route('dmdPrestation')}}" class="btn btn-success"> Envoyer une Demande </a>
        </div>
    </div>
@endsection
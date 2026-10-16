@extends('Layouts/baseHTML',['title'=>'Votre Cabinet à porté de Clic'])

@section('menu')
    <li class="nav-item active enCours">
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
    <li class="nav-item active">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
    </li>
@endsection

@section('corps')
    <!--slide-->
    <div class="slide col-8">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner rounded">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('img/works/img11.jpg')}}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5 class="txt1">BIENVENUE A INTER-GROUPE</h5> <style>/*.txt1{color:green;} .txt2{color:blue;}*/</style>
          <p class="txt1">------------Vous ne nous Choisirez pas par Hazard!-------------</p>-->
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('img/works/form.jpg')}}" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Formations de qualité</h5>
          <p>------------Vous ne nous choisirez pas par hazard-------------</p>-->
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('img/works/img92.jpg')}}" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <!--<h5>Tout pour vous servir</h5>
          <p>------------Vous ne nous choisirez pas par hazard-------------</p>-->
        </div>
      </div>
      <!--<div class="carousel-item">
        <img class="d-block w-100" src="{{asset('img/works/fdfp.png')}}" alt="Fourth slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Un Cabinet de formation agréé par le FDFP</h5>
          <p>------------Vous ne nous choisirez pas par hazard-------------</p>
        </div>
      </div>-->
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('img/works/site3.png')}}" alt="Fourth slide">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="txt2"></h5>
          <p class="txt2"></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

    <!--end slide-->

    <!--autres infos-->
  <div class="autres presenter">
    <h2 class="grosTitre" >présentation </h2>
    <p><span><b>INTER-GROUPE</b> - Une offre independante, large, et diversifiée</span><br/><br/>Nous sommes une société d'ingénerie informatique
      agréée par le FDFP. Nos formations s’adressent principalement aux travailleurs
       des entreprises pouvant bénéficier d’un plan de formation financé par le FDFP. Les Formations vont 
       du stage d’initiation aux cours les plus avancés. Les filières de formations Ressources humaines, 
       Comptabilité et Informatiques sont les principaux sujets abordés parmi plus de 500 cours.</p>
       <a href="{{route('presentation')}}" class="btn btn-success"> Voir Plus </a>
  </div>

  <div class="autres gerant">
    <h2 class="grosTitre">Mot du gérant </h2>
    <img src="{{asset('img/gerant2.jpg')}}" class="col"/>
      <p class="col">
          <span></span>  Être la référence dans les secteurs d’ingénierie informatique et de
          la formation professionnelle en Côte d’Ivoire », voilà une excellente 
          toile de fond qui va au-delà du cœur du métier d’informaticien et de formateur. 
          Sans faire abstraction de la qualité des services offerts, qui demeure la pierre
          angulaire de notre existence, la poursuite de cette vision nous amène quotidiennement
          à prendre en considération les attentes de nos clients et partenaires tout en demeurant une entreprise pleinement responsable.
      </p> 
      <p class="col"> 
          Au titre de Gérant d’Inter-Groupe, je suis particulièrement fier de pouvoir mettre l’épaule
          à la roue afin de relever ces défis enrichissants et tout aussi valorisants, et ce, avec une 
          équipe expérimentée, mettant son expertise au profit d’une organisation dynamique comme la nôtre. 
          Je vous souhaite la bienvenue sur notre toute nouvelle plateforme Web qui se veut dynamique et conviviale. 
          Je suis persuadé que la visite de notre site Internet vous apportera les informations pertinentes que vous recherchiez sur notre Entreprise.
      </p> 
      <i>Anet Clément BROU</i>
  </div>

  <div class="autres evenements">
    <h2 class="grosTitre">evènements</h2>
    <!--<div>
        <span class="per"> 01/05/2020 - 15/05/2020 </span><br/>
        <span class="ent">Session de formation avec SPL AGRI </span><br/>
        <span class="th">THEME : Gestion du personnel</span><br/>
    </div>
    
    <div>
      <span class="per"> 01/05/2020 - 15/05/2020 </span><br/>
      <span class="ent">Session de formation avec GMA </span><br/>
      <span class="th"> THEME : Mise en Pratique de la négociation-Vente</span><br/>
    </div>-->
    <?php
      for($i=0;$i<$nbEventAc;$i++)
      {
        $datedeb=substr($listeEventAc[$i]->datedebEvent,8,2)."/".substr($listeEventAc[$i]->datedebEvent,5,2)."/".substr($listeEventAc[$i]->datedebEvent,0,4);
        $datefin=substr($listeEventAc[$i]->datefinEvent,8,2)."/".substr($listeEventAc[$i]->datefinEvent,5,2)."/".substr($listeEventAc[$i]->datefinEvent,0,4);
        echo '<div>
      <span class="per"> '.$datedeb.' - '.$datefin.'</span><br/>
      <span class="ent">Session de formation avec '.$listeEventAc[$i]->entEvent.' </span><br/>
      <span class="th">THEME : '.$listeEventAc[$i]->themEvent.'</span><br/>
    </div>';
      }
      
    ?>
    <br/><br/><!--<a href="" class="btn btn-success"> Voir Plus </a>-->
  </div>
  <!--end autres infos-->
  
  <!-- fdfp -->
  <h2 class="grosTitre">F D F P</h2>
  <div class="row fdfp">
    <div class="col">
      <img src="{{asset('img/tab1.png')}}"  />
    </div>
    <div class="col">
      <h3>Comment bénéficier de la formation FDFP ? </h3> <br/><br/>
      <div class="works-step">
        <div>1</div>
        <p>Être à jour de ses cotisations ou taxe à la charge de l’employeur</p>
      </div>
      <div class="works-step">
        <div>2</div>
        <p> Retirer un plan au FDFP (situé en face de IVOSEP) </p>
      </div>
      <div class="works-step">
        <div>3</div>
        <p>Fournir tous les renseignements à mettre sur le plan de formation </p>
      </div>
      <div class="works-step">
        <div>4</div>
        <p>  Choisir un ou plusieurs modules de formation figurant dans le catalogue à télécharger au besoin</p>
      </div> 
      <a href="{{asset('documents\AGREMENT 2020.pdf')}}" class="btn btn-success" target="_blank"> Voir L'Agrément </a>
                    
    </div>
  </div>
  <!--end fdfp class agrement utilisé pr agrement FDFP -->

</div> <!--end col-8-->


@endsection


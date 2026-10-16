<!-- head --> 
<!-- <div class="container">
    <div class="row">
        <div class="">
            
        </div>
        <div class="">
           
        </div>
    </div>
</div>-->
 <!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light nav-fill" style="background-color: rgb(220,220,220);">  <!--navbar-dark bg-primary ou navbar-light bg-light-->
<a class="navbar-brand" href="{{route('accueil')}}"><img id="logo" src="{{asset('img/itg.png')}}" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!--<li class="nav-item active">
        <a class="nav-link" href="{{route('accueil')}}">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('presentation')}}">Présentation</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Domaines de Formations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="">Informatique</a>
          <a class="dropdown-item" href="">Finance</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Droit</a>
          <a class="dropdown-item" href="">Secteur Industriel</a>
          <a class="dropdown-item" href="">Gestion et communication</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('formation')}}">Domaines de Formations</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('developpement')}}">Développement</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
      </li>-->
      @yield('menu')
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
<!-- end menu -->
<!-- end head --> 


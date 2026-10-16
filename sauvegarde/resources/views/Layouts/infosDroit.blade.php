
<!--blocs sur le côté droit-->
<div class="col">
    
    <!--1 blocs-->
    <div class="block1">
        <a href="{{asset('documents/Extrait Catalogue de Formation.pdf')}}" target="_blank" title="Télécharger le catalogue">
            <img class="image catal" src="{{asset('img/catalogue.png')}}"/>  <br/>
            <img class="image telech" src="{{asset('img/catalogue2.png')}}"/>
        </a><!--telecharge.jfif-->
    </div>
    <!--1 blocs--> <br/><br/>
    <div class="block2">
        <h4>Domaines d'habilitation FDFP</h4>
        <ul>
            <li>Commerce, Marketing</li>
            <li>Droit, Fiscalité</li>
            <li>Langues vivantes</li>
            <li>Finances, Banques</li>
            <li>Hotellerie, Restauration</li>
            <li>Management</li>
        </ul>
    </div> 
    <!--1 blocs--> <br/><br/><br/><br/>
    <div class="block3">
        <h4>ils nous ont fait confiance</h4> <br/>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('img\clients\bollore.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\cargil.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\clipaa.png')}}" alt="Third slide">
                </div>
                <!--<div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\pci.png')}}" alt="Third slide">
                </div>-->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\sifca.png')}}" alt="fourth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\petroivoire.png')}}" alt="fifth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img\clients\clicophesudco.png')}}" alt="sixth slide">
                </div>
            </div>
        </div>
    </div> <br/>
    <!--1 block-->
    <div class="block4 row">
        <div class="col etiq1">
        @if(isset($idEnt))
            <a href="{{route('quitter','idEnt='.$idEnt.'&page=fdfp')}}" >Espace FDFP</a>
        @else
            <a href="{{route('fdfp')}}" >Espace FDFP</a>
        @endif
        </div>
        <div class="col etiq2">
            <a href="http://webmail1.hostinger.fr" target="_blank">Webmail</a>
        </div>
    </div> 

</div>
<!--end blocs-->

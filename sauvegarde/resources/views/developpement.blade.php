@extends('Layouts/baseHTML',['title'=>'Développement'])

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
    <li class="nav-item active enCours">
        <a class="nav-link" href="{{route('developpement')}}">Développement</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
    </li>
@endsection

@section('corps')
    <!--1 block-->
    <div class="col-8">
        <div class="row">
            <div class="col">
                <div class="cadre1">APPS</div>
                <div class="cadre2">Consult6</div>
            </div>
            <div class="col-9">
                <h2 class="titreCadre"> PRINCIPE DE CONSULT6 </h2> <br/>
                <p>Le principe du Logiciel CONSULT est d’intégrer les relevés bancaires mis à disposition par les serveurs des différentes banques dans le logiciel de trésorerie utilisé par le client.
CONSULT permet également d’archiver les mouvements ainsi traités au jour le jour pour les utiliser dans un logiciel de rapprochement. 
CONSULT est donc utile pour un client qui ne dispose que d’un logiciel à la fois ; soit celui de gestion de trésorerie ou de rapprochement bancaire. 
Toutefois, il est beaucoup plus avantageux pour le client qui a la gestion de trésorerie et le rapprochement bancaire.</p>

                <p>En réalité, CONSULT étant un interface entre les serveurs des banques et tout autre système qui pourrait utiliser les données issues de ces serveurs, 
des développements spécifiques peuvent être faits sur demande du client.
Dans le présent manuel, nous allons nous intéresser au cas où CONSULT est utilisé comme interface entre les serveurs des banques et les logiciels de 
gestion de trésorerie et /ou de rapprochement bancaire. CONSULT est fonctionnel comme interface chez plusieurs 
clients pour les logiciels de trésorerie et /ou de rapprochement Xrt-Universe, Concept-agresso, TresoWin, Sage Ligne 500 et 1000, SAP.</p>

                <p>Quelque soit le logiciel de gestion utilisé par le client, CONSULT se présente de la même manière. 
                    Les éventuelles différences se situent au niveau des fichiers générés pour la trésorerie et le rapprochement.</p>
                <br/>
                <a href="{{asset('documents/SupportConsult6.pdf')}}" class="btn btn-info">Plus d'infos</a>
            </div>
        </div>

        <br/><br/>

        <div class="row">
            <div class="col">
                <div class="cadre1">FRP</div>
                <div class="cadre2">Sage 1000</div>
            </div>
            <div class="col-9">
                <h2 class="titreCadre"> PRINCIPE DE SAGE 1000 </h2> <br/>
                <p>Sage 1000 FRP est une solution dédiée aux moyennes et grandes entreprises. 
Sage 1000 FRP offre une vision globale de la fonction financière et facilite le partage des informations et la rationalisation des processus internes. De conception modulaire, 
il permet aussi un déploiement progressif dans le respect de vos délais et de vos budgets.</p>

                <p>Grâce à ses modules collaboratifs – Gestion commerciale, Comptabilité, Trésorerie, Sage 1000 FRP vous permet
 d’associer l’ensemble de vos collaborateurs à la gestion quotidienne des finances de l’entreprise. Sage 1000 FRP leur 
 offre un accès autonome à des services et à des informations dans un environnement parfaitement sécurisé. 
 Vous pouvez ainsi affranchir vos équipes de certains travaux administratifs à faible valeur ajoutée. .</p>

                <p>Multi-société, multi-établissement et multi-site, Sage1000 FRP est parfaitement adapté à la 
                    gestion des sites décentralisés tout en vous offrant une vision agrégée de vos données. </p>
                <br/>    
                <a href="{{asset('documents/SAGE 1000 FRP FONCTIONNEMENT GENERAL.pdf')}}" class="btn btn-info">Plus d'infos</a>
            </div>
        </div>
    </div>
@endsection
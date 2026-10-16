<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!--<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />-->

</head>
<style>
/*nav{
    width: 100%;
    background-color: #06177a;
    padding-left:30%;
    /*padding-right:12%;
}

.nav li{
    list-style-type: none;
}
.sousMenu{
    display: none;
}

.nav a{
    text-decoration: none;
}

.nav li:hover .sousMenu{
    display: block;
    position: absolute;
}

.nav input[type=checkbox]{
    display: none;
}

.nav input[type=checkbox]:checked ~ ul{
    display: block;
}

h4{
    color:rgb(25, 56, 116);
    padding-bottom:40px;
}*/

/*style
.formation .col{
    border:1px solid rgba(45, 202, 134, 0.295);  /*rgba(169, 169, 169, 0.418)
    margin:5px;
}

.formation .col-6{
    border:1px solid rgba(45, 202, 134, 0.295);  /*rgba(169, 169, 169, 0.418)
    margin:5px;
}

.formation, label h4, .col-6 h4{
    text-align: center;
    color:rgb(25, 56, 116); /*rgba(19, 109, 70, 0.952) 
    margin-top: 10px;
}

.formation ul li{
    list-style-type: none;
    /*line-height: 45px;
    margin-bottom: 30px;
}

.icon-holder{
    float: left;
    margin:-30px;
    margin-top:0px;
}

.desc{
    font-size: 14px;
    margin-right: -17px;   
}

.desc span{
    margin:-5px;
    line-height: 15px;
}*/
</style>

<body>
    <!--<div class="container"><div class="row formation1">
        <div class="col nav"> <!--<img src="{{asset('img/logo1.png')}}" class="logo" />
            
        <label for="menu-mobile" class="menu-mobile"><i class=""></i><h4>Informatique</h4></label>
        <input type="checkbox" id="menu-mobile" role="button"/>
                    <ul class="sousMenu">
                    <li class="available">
                        <div class="icon-holder">
                            <i class="fa fa-check text-success"></i>  
                        </div>
                        <div class="desc">
                            <span class="text-black">
                            GESTION DES RESSOURCES HUMAINES
                            </span>
                        </div>
                    </li>
                    <li class="available">
                        <div class="icon-holder">
                            <i class="fa fa-check text-success"></i>  
                        </div>
                        <div class="desc">
                            <span class="text-black">
                            GESTION DES ENTREPRISES
                            </span>
                        </div>
                    </li>
                    </ul>
        </div>

        <div class="col nav"> <!--<img src="{{asset('img/logo1.png')}}" class="logo" />
            
        <label for="menu-mobile2" class="menu-mobile"><i class=""></i><h4>Informatique</h4></label>
        <input type="checkbox" id="menu-mobile2" role="button"/>
                    <ul class="sousMenu">
                    <li class="available">
                        <div class="icon-holder">
                            <i class="fa fa-check text-success"></i>  
                        </div>
                        <div class="desc">
                            <span class="text-black">
                            GESTION DES RESSOURCES HUMAINES
                            </span>
                        </div>
                    </li>
                    <li class="available">
                        <div class="icon-holder">
                            <i class="fa fa-check text-success"></i>  
                        </div>
                        <div class="desc">
                            <span class="text-black">
                            GESTION DES ENTREPRISES
                            </span>
                        </div>
                    </li>
                    </ul>
        </div>
    </div></div>-->
<form>
    
    <h3>Module: </h3> Nom module <input type="number" name="nbBen1" id="nbBen1" value="1" />
    <button id="VBen1" onClick="nbLigne(1)">ok</button>
    <div id="Err1"></div>
        <table id="table1">
            <thead>
                <th>N° D'ordre</th>
                <th>Nom</th>
                <th>N° Matricule</th>
                <th>Fonction</th>
                <th>Catégorie</th>
            </thead>
            <tbody id="ligne1">
                
            </tbody>
        </table>
    
    <h3>Module: </h3> Nom module <input type="number" name="nbBen2" id="nbBen2" value="1" />
    <button id="VBen2" onClick="nbLigne(2)" >ok</button>
    <div id="Err2"></div>
        <table id="table2">
            <thead>
                <th>N° D'ordre</th>
                <th>Nom</th>
                <th>N° Matricule</th>
                <th>Fonction</th>
                <th>Catégorie</th>
            </thead>
            <tbody id="ligne2">
                
            </tbody>
        </table>
    
    
        
</form>

<script>
        
        for(i=1;i<=2;i++)
        {
            //window.addEventListener('load',nbLigne(i));
            document.getElementById('VBen'+i).click();
        }
        //document.getElementById('VBen1').addEventListener('click',nbLigne)
        //document.getElementById('nbBen'+nbM).addEventListener('change',nbLigne(nbM))
        
        //fonction pr augmenter ou diminuer le nombre de bénéficiaires
        function nbLigne(nbM){  
            
        var nbBen = document.getElementById('nbBen'+nbM).value;
        var nbTr=document.getElementById('table'+nbM).children[1].children.length;
        let ligne = document.getElementById('ligne'+nbM);
        var nbTrVrai=nbTr;
        var nOrdre;

        if(nbBen==0)
        {
            nbBen=1; 
            document.getElementById('Err'+nbM).innerHTML="Attention! Il faut au moins 1 Bénéficiaires";
            document.getElementById('nbBen'+nbM).setAttribute("value",1);
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
                    newTr.innerHTML="<td>"+nOrdre+"</td><td><input /></td><td><input /></td><td><input /></td><td><input /></td>";
                }
                //les attributs "name" et "required" pr les inputs!
                newTr.children[4].children[0].setAttribute("required","required");
                newTr.children[1].children[0].setAttribute("required","required");
                newTr.children[2].children[0].setAttribute("required","required");
                newTr.children[3].children[0].setAttribute("required","required");

                newTr.children[1].children[0].setAttribute("name","nom"+nbM+nbTrVrai);
                newTr.children[2].children[0].setAttribute("name","mat"+nbM+nbTrVrai);
                newTr.children[3].children[0].setAttribute("name","fonc"+nbM+nbTrVrai);
                newTr.children[4].children[0].setAttribute("name","cat"+nbM+nbTrVrai);

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
</body>
</html>
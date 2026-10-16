<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evenement;
use App\suggestion;

class evenementC extends Controller
{
    //Afficher la liste des évènements chez l'Admin
    public function AfficheEvent()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $event = evenement::all();
        $nblistEvent = evenement::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return view('administration/evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'nbSugNonLu'=>$nbSugNonLu]);
    } 

    //Créer un nouvel evenement
    public function newEvent(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        //$date2=substr($request->datedebEvent,8,2)."-".substr($request->datedebEvent,5,2)."-".substr($request->datedebEvent,0,4);
        request()->validate([
            'themEvent' => ['required'],
            'entEvent' => ['required'],
            'datedebEvent' => ['required'],
            'datefinEvent' => ['required'],
        ]);

        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        if($request->datefinEvent<date('Y-m-d'))
        {
            $info1="La date de fin est une date antérieure!";
            return view('administration/newEvenements', ['info1' => $info1, 'nbSugNonLu'=>$nbSugNonLu]); //, 'idEvent2'=>$_GET["idEvent"], 'mode'=>$_GET["mode"]
        }
        else if($request->datefinEvent<$request->datedebEvent)
        {
            $info2="Erreur au niveau des dates";
            return view('administration/newEvenements', ['info2' => $info2, 'nbSugNonLu'=>$nbSugNonLu]);
        }
        else
        {
            //modifier un evenement
            if($_GET['mode']=="Modifier")
            {
                $updEv=evenement::find($_GET['idEvent']) -> update([
                    'themEvent'=>ucwords($request->themEvent),
                    'entEvent'=>strtoupper($request->entEvent), //mettre en majuscule
                    'datedebEvent'=>$request->datedebEvent,
                    'datefinEvent'=>$request->datefinEvent,
                ]);
                $action="modification";
            }
            else if($_GET['mode']=="Ajouter") //ajouter un nouvel evenement
            {
                $newEv=evenement::create([
                    'themEvent'=>ucwords($request->themEvent),
                    'entEvent'=>strtoupper($request->entEvent), //mettre en majuscule
                    'datedebEvent'=>$request->datedebEvent,
                    'datefinEvent'=>$request->datefinEvent,
                    'boolEvent'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
                ]);
                $action="enregistrement";
            }
            $info="Votre $action s'est effectué(e) avec succès!";
            $event=evenement::all();
            $nblistEvent = evenement::count();
            return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        }
    }

    //Supprimer un évènement chez l'Admin
    public function SupEvent()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        if($_GET['mode']=="Supprimer")
        {
            $supEv=evenement::find($_GET['idEvent']) -> delete();
        }

        $info="Votre evènement a été supprimé";
        $event = evenement::all();
        $nblistEvent = evenement::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //ligne ou retirer un évènement chez l'Admin
    public function RetEvent()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }

        $info="";
        $info2="";
        if($_GET['mode']=="Retirer")
        {
            $retEv=evenement::find($_GET['idEvent']) -> update([
                'boolEvent'=>"0",
            ]);
            $info="Votre evènement a été retiré.";
        }
        else if($_GET['mode']=="Integrer")
        {
            //vérifier si l'évènement est passé
            $verifEv=evenement::where('id',$_GET['idEvent'])->get();
           
            if($verifEv[0]->datefinEvent>date('Y-m-d'))
            {
                $intEv=evenement::find($_GET['idEvent']) -> update([
                    'boolEvent'=>"1",
                ]);
                $info="Votre evènement a été mis en ligne.";
            }
            else
            {
                $info2="Cet Evènement est passé! Impossible de le mettre en ligne.";
            }
        }
        $event = evenement::all();
        $nblistEvent = evenement::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'info2' => $info2, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

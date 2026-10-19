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
        $mode = $request->input('mode', $_GET['mode'] ?? 'Ajouter');
        $idEvent = $request->input('idEvent', $_GET['idEvent'] ?? null);

        if($request->datefinEvent < $request->datedebEvent)
        {
            $info2="La date de fin ne peut pas être antérieure à la date de début !";
            return view('administration/newEvenements', ['info2' => $info2, 'nbSugNonLu'=>$nbSugNonLu]);
        }
        else
        {
            //modifier un evenement
            if($mode == "Modifier" && $idEvent)
            {
                evenement::where('id', $idEvent)->update([
                    'themEvent'=>ucwords($request->themEvent),
                    'entEvent'=>strtoupper($request->entEvent), //mettre en majuscule
                    'datedebEvent'=>$request->datedebEvent,
                    'datefinEvent'=>$request->datefinEvent,
                ]);
                $action="modification";
            }
            else //ajouter un nouvel evenement
            {
                evenement::create([
                    'themEvent'=>ucwords($request->themEvent),
                    'entEvent'=>strtoupper($request->entEvent), //mettre en majuscule
                    'datedebEvent'=>$request->datedebEvent,
                    'datefinEvent'=>$request->datefinEvent,
                    'boolEvent'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
                ]);
                $action="enregistrement";
            }
            $info="Votre $action s'est effectuée avec succès !";
            $event=evenement::all();
            $nblistEvent = evenement::count();
            return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        }
    }

    //Supprimer un évènement chez l'Admin
    public function SupEvent(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }
        $mode = $request->input('mode', $_GET['mode'] ?? '');
        $idEvent = $request->input('idEvent', $_GET['idEvent'] ?? '');
        if($mode=="Supprimer" && $idEvent)
        {
            evenement::where('id', $idEvent)->delete();
        }

        $info="Votre événement a été supprimé.";
        $event = evenement::all();
        $nblistEvent = evenement::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //ligne ou retirer un évènement chez l'Admin
    public function RetEvent(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }

        $info="";
        $info2="";
        $mode = $request->input('mode', $_GET['mode'] ?? '');
        $idEvent = $request->input('idEvent', $_GET['idEvent'] ?? '');

        if($mode=="Retirer" && $idEvent)
        {
            evenement::where('id', $idEvent)->update([
                'boolEvent'=>"0",
            ]);
            $info="Votre événement a été retiré de l'affichage public.";
        }
        else if($mode=="Integrer" && $idEvent)
        {
            evenement::where('id', $idEvent)->update([
                'boolEvent'=>"1",
            ]);
            $info="Votre événement a été mis en ligne sur la page d'accueil avec succès.";
        }
        $event = evenement::all();
        $nblistEvent = evenement::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('evenements', ['listeEvent' => $event, 'nblistEvent' => $nblistEvent, 'info' => $info, 'info2' => $info2, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

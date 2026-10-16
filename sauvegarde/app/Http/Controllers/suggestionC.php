<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suggestion;

class suggestionC extends Controller
{
    //Ajouter une nouvelle suggestion
    public function EnrgSuggestion(Request $request)
    {
        request()->validate([
            'nomSug' => ['required'],
            'msgSug' => ['required'],
        ]);
        if(strlen(trim($request->telSug))==10)
        {
        //echo $_POST['telSug']; aficher telephone suggestion
           $suggestion=suggestion::create([
                'nomSug'=>strtoupper($request->nomSug),
                'mailSug'=>$request->mailSug,
                'telSug'=>wordwrap($request->telSug,2,'-',true),
                'msgSug'=>$request->msgSug,
                'boolSug'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
            ]);
            $info="Votre message a bien été envoyé!"; 
            return redirect()->route('contact', ['info'=>$info]);
        }
        else
        {
            $info2="Erreur au niveau du N° de téléphone!";
            return view('contact', ['info2'=>$info2]);
        }
       
    }

    //Afficher la liste des suggestions chez l'Admin
    public function AfficheSug()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $suggestion = suggestion::all();
        $nbSug = suggestion::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return view('administration/suggestions', ['listeSug' => $suggestion, 'nbSug' => $nbSug, 'nbSugNonLu'=>$nbSugNonLu]); 
    }

    //supprimer  une suggestion
    public function SupSug(Request $request)
    { 
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        if($_GET['mode']=="Supprimer")
        {
            $supSug=suggestion::find($_GET['idSug'])->delete();
            $info="La demande à bien été supprimée!";
        }

        $suggestion = suggestion::all();
        $nbSug = suggestion::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('suggestions', ['listeSug' => $suggestion, 'nbSug' => $nbSug, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/suggestions', ['listeSug' => $suggestion, 'nbSug' => $nbSug, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //marquer une suggestion
    public function MarqSug(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        if($_GET['mode']=="Marquer")
        {
            $marqSug=suggestion::find($_GET['idSug'])->update([
                'boolSug'=>"1",
            ]);
        }

        $suggestion = suggestion::all();
        $nbSug = suggestion::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('suggestions', ['listeSug' => $suggestion, 'nbSug' => $nbSug, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/suggestions', ['listeSug' => $suggestion, 'nbSug' => $nbSug, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dmdPrestation;
use App\lier2;
use App\TypePrestation;
use App\suggestion;

class dmdPrestationC extends Controller
{
    //Afficher la liste des types de prestation chez l'admin
    public function AffichedmdP()
    {
        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        $listedmdP = dmdPrestation::orderBy('created_at','desc')->get();
        $nblistedmdP = dmdPrestation::count();

        $listelier2 = lier2::all();
        $nblistelier2 = lier2::count();
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        return view('administration/dmdPrest',['listedmdP' => $listedmdP, 'nblistedmdP' => $nblistedmdP, 'listelier2' => $listelier2,'nblistelier2' => $nblistelier2, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //enregistrement d'une nouvelle demande par un client
    public function newdmdPrest(Request $request)
    {
        request()->validate([
            'nom' => ['required'],
            'tel' => ['required', 'min:10', 'max:10'],
            'email' => ['required', 'email'],
        ]);

            $dmdPrest=dmdPrestation::create([
                'nom'=>$request->nom,
                'email'=>$request->email,
                'tel'=>wordwrap($request->tel,2,'-',true),
                'indicationPrest'=>$request->indicationPrest,
                'booldmdP'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
            ]);

            //récupérer l'identifiant de la demande qui vient d'être créée
            $newdmdP = dmdPrestation::orderBy('created_at', 'desc')->first();
            
            //enregistrer dans la table lier2: associer les types de prestation demandés à la demande
            $listeTypePr=TypePrestation::all();
            $nblisteTypePr=TypePrestation::count();
            for($i=0;$i<$nblisteTypePr;$i++)
            {
                if(isset($_POST[$i]))
                {
                    $newlier2=lier2::create([
                        'dmdPrest'=>$newdmdP->id,  //la demande déjà enregistrée
                        'typePrest'=>$request->$i,
                    ]);
                }
            }
            $info="Votre message a bien été envoyé!";
            return redirect()->route('dmdPrestation', ['info'=>$info, 'listeTypePr'=>$listeTypePr, 'nblisteTypePr'=>$nblisteTypePr]);
    }

    //Supprimer  une demande de prestation
    public function SupP()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $listelier2 = lier2::all();
        $nblistelier2 = lier2::count();

        if($_GET['mode']=="Supprimer")
        {
            for($i=0;$i<$nblistelier2;$i++)
            {
                if($listelier2[$i]->dmdPrest==$_GET['idDmdP'])
                {
                    $suplier2=lier2::find($listelier2[$i]->id)->delete();
                }
            }
            $supdmdP=dmdPrestation::find($_GET['idDmdP'])->delete();
            $info="La demande à bien été supprimée!";
        }
        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        $listedmdP = dmdPrestation::all();
        $nblistedmdP = dmdPrestation::count();

        $listelier2 = lier2::all();
        $nblistelier2 = lier2::count();
        return redirect()->route('dmdPrest',['listedmdP' => $listedmdP, 'nblistedmdP' => $nblistedmdP, 'listelier2' => $listelier2,'nblistelier2' => $nblistelier2, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    // marquer une demande de prestation
    public function MarqP()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        //$listelier2 = lier2::all();
        //$nblistelier2 = lier2::count();

        if($_GET['mode']=="Marquer")
        {
            $marqdmdP=dmdPrestation::find($_GET['idDmdP'])->update([
                'booldmdP'=>"1",
            ]);
        }
        
        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        $listedmdP = dmdPrestation::all();
        $nblistedmdP = dmdPrestation::count();

        $listelier2 = lier2::all();
        $nblistelier2 = lier2::count();
        $info="La demande à bien été marquée!";
        return redirect()->route('dmdPrest',['listedmdP' => $listedmdP, 'nblistedmdP' => $nblistedmdP, 'listelier2' => $listelier2,'nblistelier2' => $nblistelier2, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suggestion;
use App\Beneficiaire;
use App\EntrepriseBeneficiaireModule;


class BeneficiaireC extends Controller
{
    //Afficher les sur le tableau de bord chez l'Admin
    public function listeBenef()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $idEnt=$_GET['idEnt'];
        $idMod=$_GET['idMod'];
        $datedmd=$_GET['datedmd'];
        $listeBenef=EntrepriseBeneficiaireModule::whereEntreprise_idAndModule_idAndDate_demande($idEnt,$idMod,$datedmd)->get();
        $nblisteBenef=count($listeBenef);
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return view('administration/listeBenef', ['listeBenef' => $listeBenef, 'nblisteBenef' => $nblisteBenef, 'nbSugNonLu'=>$nbSugNonLu]); 
    }

}

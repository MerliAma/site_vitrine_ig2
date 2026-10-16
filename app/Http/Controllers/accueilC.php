<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suggestion;
use App\Entreprise;
use App\Module;
use App\EntrepriseBeneficiaireModule;
use App\dmdPrestation;
use App\evenement;

class accueilC extends Controller
{
    //Afficher les infos sur le tableau de bord chez l'Admin
    public function nombre()
    {
        //$nbdmdform = EntrepriseBeneficiaireModule::count(); récupérer le nbr de dmd de formation
        $nbdmdform=0;
        $listedmd=EntrepriseBeneficiaireModule::all();
        
        //parcourir la table ternaire
        $idDate=0;
        //$i=0;
        if(count($listedmd)>1){
            $tabDatedmd[0]=$listedmd[0]->date_demande;
        for($i=1;$i<count($listedmd);$i++)
        {
            if($listedmd[$i]->date_demande!=$tabDatedmd[$idDate])
            {
                $idDate++;
                $tabDatedmd[$idDate]=$listedmd[$i]->date_demande;
            }
        }}
        $listeEnt=Entreprise::all();
        for($i=0;$i<count($listeEnt);$i++)
        {
            for($j=0;$j<count($tabDatedmd);$j++)
            {
                $dmd=EntrepriseBeneficiaireModule::whereEntreprise_idAndDate_demande($listeEnt[$i]->id,$tabDatedmd[$j])->get();
                if(count($dmd)!=0)
                {
                    $nbdmdform++;
                    $idMod=$dmd[0]->module_id;
                    if(count($dmd)>1)
                    {
                        for($k=1;$k<count($dmd);$k++)
                        {
                            if($dmd[$k]->module_id!=$idMod)
                            {
                                $nbdmdform++;
                            }
                        }
                    }
                }
            }
        }

        $nbdmdprest = dmdPrestation::count();

        $nbEvent = count(evenement::where('boolEvent', '1')->get());

        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        return view('administration/accueilAd', ['nbdmdprest' => $nbdmdprest, 'nbdmdform' => $nbdmdform, 'nbEvent' => $nbEvent, 'nbSugNonLu'=>$nbSugNonLu]); 
    }

    /*public function nombreSug()
    {
        $nbSugNonLu = suggestion::where('boolSug', '0')->get();
        return view('Layouts/baseAdmin', ['nbSugNonLu' => $nbSugNonLu]); 
    }*/
    
    //Afficher la liste des évènements sur l'accueil global
    public function EventAc()
    {
        $eventAc =evenement::where('boolEvent', '1')->take(4)->get();
        $nbEventAc = count($eventAc);
        return view('accueil', ['listeEventAc' => $eventAc, 'nbEventAc' => $nbEventAc]);
    }
}

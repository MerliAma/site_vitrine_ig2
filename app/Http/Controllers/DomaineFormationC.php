<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DomaineFormation;
use App\suggestion;
use App\Module;
use App\EntrepriseBeneficiaireModule;

class DomaineFormationC extends Controller
{
    
    //Afficher la liste des domaines de formation
    public function AfficheDomForm()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        $listeDomForm = DomaineFormation::all();
        $nblisteDomForm = DomaineFormation::count();
        return view('administration/domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //Afficher la liste des domaines de formation dans le formulaire de demandes
    public function AfficheDomForm2()
    {
        $listeDomForm = DomaineFormation::where('boolForm','1')->get();//DomaineFormation::all();
        $nblisteDomForm = count($listeDomForm); //DomaineFormation::count();
        $listeModule = Module::all();
        $nbModule = Module::count();
            
        return view('dmdForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'listeModule' => $listeModule, 'nbModule' => $nbModule]);
    }
    
    //affiche sur la page formation
    public function AfficheFormation()
    {
        $listeDomForm = DomaineFormation::where('boolForm','1')->get();//DomaineFormation::all();
        $nblisteDomForm = count($listeDomForm); //DomaineFormation::count();
        $listeModule = Module::all();
        $nbModule = Module::count();
        if(DomaineFormation::where('boolForm','1')->count()>0)
        {
            return view('formation',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'listeModule' => $listeModule, 'nbModule' => $nbModule]);
        }
        else
        {
            return view('formation',['info2' => 'Aucun Domaine de Formation disponible pour le moment.',]);
        }
    }

    public function newdomForm(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        request()->validate([
            'libForm' => ['required'],
            //'nbBen' => ['required'],
        ]);

        //modifier un domaine
        if($_GET['mode']=="Modifier")
        {
            $updDomF=DomaineFormation::find($_GET['idDomF']) -> update([
                'libForm'=>strtoupper($request->libForm),
            ]);
            $action="modification";
        }
        else if($_GET['mode']=="Ajouter") //ajouter un nouveau domaine
        {
            $newDomF=DomaineFormation::create([
                'libForm'=>ucwords($request->libForm),
                'boolForm'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
            ]);
            $action="enregistrement";
            $idDomForm=DomaineFormation::orderBy('created_at','desc')->first()->id;
            for($i=0;$i<$request->nbBen;$i++)
            {
                $newMod=Module::create([
                    'libMod'=>ucwords($_POST["libMod$i"]),
                    'domForm_id'=>$idDomForm,
                ]);
            }
        }
        $info="Votre $action s'est effectué(e) avec succès!";
        $listeDomForm = DomaineFormation::all();
        $nblisteDomForm = DomaineFormation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //Supprimer, intégrer ou retirer un domaine chez l'Admin
    public function SupDomF()
    {
        if (auth()->guest())  //pr vérifier si un utilisateur est connecté
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }//info transformé en booléen!
        $infoSup=true;
        if($_GET['mode']=="Supprimer")
        {
            //suppression des modules associés..
            $listemodule=Module::where('domForm_id',$_GET['idDomF'])->get();
            $nbmodule=Module::where('domForm_id',$_GET['idDomF'])->count();
            for($i=0;$i<$nbmodule;$i++)
            {
                //chercher si le module est lié à une demande
                $modDmd=EntrepriseBeneficiaireModule::where('module_id',$listemodule[$i]->id)->get();
                if(count($modDmd)>0)
                {
                    $infoSup=false;
                }
                else
                {
                    $supMod=Module::find($listemodule[$i]->id)->delete();
                }  
            }
            if($infoSup==true)
            {
                $supDomF=DomaineFormation::find($_GET['idDomF']) -> delete();
                //$action="supprimé.";
            }
        }

        //$info="Votre Domaine de Formation a été supprimé";
        $listeDomForm = DomaineFormation::all();
        $nblisteDomForm = DomaineFormation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'infoSup' => $infoSup, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //Supprimer, intégrer ou retirer un domaine chez l'Admin
    public function RetDomF()
    {
        if (auth()->guest())  //pr vérifier si un utilisateur est connecté
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        
        if($_GET['mode']=="Retirer")
        {
            $retDomF=DomaineFormation::find($_GET['idDomF']) -> update([
                'boolForm'=>"0",
            ]);
            $action="retiré.";
        }
        else if($_GET['mode']=="Integrer")
        {
            $intDomF=DomaineFormation::find($_GET['idDomF']) -> update([
                'boolForm'=>"1",
            ]);
            $action="mis en ligne.";
        }

        $info="Votre Domaine de Formation a été $action";
        $listeDomForm = DomaineFormation::all();
        $nblisteDomForm = DomaineFormation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/domForm',['listeDomForm' => $listeDomForm, 'nblisteDomForm' => $nblisteDomForm, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

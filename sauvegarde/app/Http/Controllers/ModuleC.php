<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suggestion;
use App\Beneficiaire;
use App\DomaineFormation;
use App\Module;
use App\EntrepriseBeneficiaireModule;


class ModuleC extends Controller
{
    //Afficher les sur le tableau de bord chez l'Admin
    public function listeModules()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $idDomForm=$_GET['idDomForm'];
        $libDomForm=DomaineFormation::where('id',$idDomForm)->get();
        $libDomForm=strtoupper($libDomForm[0]->libForm);
        $listeModules=Module::where('domForm_id',$idDomForm)->get();
        $nblisteModules=count($listeModules);
        $nbSugNonLu=suggestion::where('boolSug','0')->count();

        if(isset($_GET['info'])){ $info=$_GET['info']; }else{$info="";}
        if(isset($_GET['info2'])){ $info2=$_GET['info2']; }else{$info2="";}
        return view('administration/listeModules', ['listeModules' => $listeModules, 'nblisteModules' => $nblisteModules, 'idDomForm'=>$idDomForm, 'libDomForm'=>$libDomForm, 'nbSugNonLu'=>$nbSugNonLu,'info'=>$info, 'info2'=>$info2]); 
    }

    //Ajouter un Module
    public function newModule(Request $request)
    {
        $idDomForm=$_GET['idDomForm'];
        request()->validate([
            'libMod' => ['required'],
        ]);
        
        //Ajouter, modifier un module
        if($_GET['idModule']==null)
        {
            $newMod=Module::create([
                'libMod'=>ucwords($request->libMod),
                'domForm_id'=>$idDomForm,
            ]);
            $info="Votre module à été ajouté avec succès!";
        }
        else
        {
            $updMod=Module::find($_GET['idModule'])->update([
                'libMod'=>ucwords($request->libMod),
            ]);
            $info="Votre module à été modifié avec succès!";
        }
        return redirect()->route('listeModules',['info'=>$info, 'idDomForm'=>$idDomForm]);
    }

    //Supprimer un Module
    public function supModule()
    {
        $idDomForm=$_GET['idDomForm'];
        $nbtotalMod=Module::where('domForm_id',$idDomForm)->count();
        //vérifier si le module est lié à une demande
        if($nbtotalMod>1)
        {
            $supMod=Module::find($_GET['idModule'])->delete();
            $info="Votre module à été supprimer avec succès!";
            $info2="";
        }
        else
        {
            $info2="Impossible! Il reste un seul Module pour ce Domaine.";
            $info="";
        }
        
        
        return redirect()->route('listeModules',['info'=>$info, 'info2'=>$info2, 'idDomForm'=>$idDomForm]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dmdFormation;
use App\Module;
use App\Entreprise;
use App\DomaineFormation;
use App\suggestion;
use App\Beneficiaire;
use App\EntrepriseBeneficiaireModule;

class dmdFormationC extends Controller
{
    //Afficher la liste des types de prestation
    public function AffichedmdF()
    {
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        $listeEnt = Entreprise::all();
        $nblisteEnt = Entreprise::count();

        $listedmd = EntrepriseBeneficiaireModule::orderby('created_at','desc')->get();
        $nblistedmd = EntrepriseBeneficiaireModule::count();
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        for($i=0;$i<$nblisteEnt;$i++)
        {
            $existdmd=count(EntrepriseBeneficiaireModule::where('entreprise_id',$listeEnt[$i]->id)->get());
            if($existdmd==0)
            {
                $supEnt=Entreprise::find($listeEnt[$i]->id)->delete();
            }
        }
        return view('administration/dmdForm',['listeEnt' => $listeEnt, 'nblisteEnt' => $nblisteEnt, 'nblistedmd' => $nblistedmd, 'listedmd' => $listedmd, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //enregistrement d'une nouvelle demande par un client: etape1 enregistrement de l'entreprise
    public function newdmdForm(Request $request)
    {
        request()->validate([
            'raisonSocial' => ['required'],
            'ncc' => ['required'],
            'tel' => ['required', 'min:10', 'max:10'],
            'email' => ['required', 'email'],
            'MSalarialePA' => ['required'],
        ]);

        //s'assurer qu'au moins un module est coché
        $listeModule=Module::all();
        $nbModule=Module::count();
        $verifcoche=false;
        $j=0; //pour le tableau qui va récupérer les idetifiants des modules cochés
        for($i=1;$i<=$nbModule;$i++)
        {
            if(isset($_POST['mod'.$i]))
            {
                $verifcoche=true;
                $tabIdMod[$j]=$_POST['mod'.$i];
                $j++;
            }
        }
        if($verifcoche==false)
        {
            return redirect()->route('dmdFormation',['info2'=>'Aucun module n\'a été coché!']);
        }

        //verifier si l'entreprise n'existe pas déjà
        $rechEnt=Entreprise::where('ncc',$request->ncc)->get();
        if(count($rechEnt)==0)
        {
            $Ent=Entreprise::create([
            'raisonSocial'=>strtoupper($request->raisonSocial),
            'ncc'=>strtoupper($request->ncc),
            'email'=>$request->email,
            'tel'=>wordwrap($request->tel,2,'-',true),
            'MsalarialePA'=>$request->MSalarialePA,
            ]);
            //récupérer l'identifiant de l'entreprise qui vient d'être créée
            $newEnt = Entreprise::orderBy('created_at', 'desc')->first();
            $newEnt=$newEnt->id;
        }
        else
        {
            $Ent=Entreprise::find($rechEnt[0]->id)->update([
                'raisonSocial'=>strtoupper($request->raisonSocial),
                'ncc'=>strtoupper($request->ncc),
                'email'=>$request->email,
                'tel'=>wordwrap($request->tel,2,'-',true),
                'MsalarialePA'=>$request->MSalarialePA,
                ]);
                //dd($Ent->id);
                //récupérer l'identifiant de l'entreprise qui vient d'être modifié
                $newEnt = $rechEnt[0]->id;
        }
            //dd($request->attentes);
            if(isset($request->attentes)){$attentes=$request->attentes;}else{$attentes="";}
            return redirect()->route('dmdForm2',  ['idEnt'=>$newEnt, 'tabIdMod'=>$tabIdMod, 'attentes'=>$attentes]);
    }

    //enregistrement d'une nouvelle demande par un client: etape2 enregistrement des bénéficiaires
    public function newdmdForm2(Request $request)
    {
        //validation de données
        
        $tabIdMod = $_GET['tabIdMod'];  
        $idEnt=$_GET['idEnt'];
        $attentes=$_GET['attentes'];
        if($attentes==""){$attentes=null;}
        $enrgDmd=false;
        $tabIdMod=explode('/',$tabIdMod); //retransforme la chaine de caratères des Modules de dmdForm2 en tableau
        for($i=1;$i<=count($tabIdMod);$i++) //count($tabIdMod)
        {
            $nbBen=$_POST["nbBen$i"];
            for($j=0;$j<$nbBen;$j++)
            {
                $k=$i.$j;
                //enregistrement d'un bénéficiaire
                $newBen=Beneficiaire::create([
                    'matBen'=>$_POST["mat$k"],
                    'nomBen'=>strtoupper($_POST["nom$k"]),
                    'catBen'=>ucwords($_POST["cat$k"]),
                    'foncBen'=>ucwords($_POST["fonc$k"]),
                    'NatBen'=>ucwords($_POST["nat$k"]),
                    'AnEmBen'=>$_POST["AnEm$k"],
                ]);
                $newBen = Beneficiaire::orderBy('id', 'desc')->first();
                $Ben=$newBen->id;

                /*$rechBen=Beneficiaire::where('matBen',$_POST["mat$k"])->get();
                if(count($rechBen)==0)
                {
                    
                }
                else
                {
                    $k=$i.$j;
                    //modification du bénéficiaire s'il existe déjà
                    $newBen=Beneficiaire::find($rechBen[0]->id)->update([
                        'matBen'=>$_POST["mat$k"],
                        'nomBen'=>strtoupper($_POST["nom$k"]),
                        'catBen'=>ucwords($_POST["cat$k"]),
                        'foncBen'=>ucwords($_POST["fonc$k"]),
                        'NatBen'=>ucwords($_POST["nat$k"]),
                        'AnEmBen'=>$_POST["AnEm$k"],
                    ]);
                    $Ben=$rechBen[0]->id;
                }*/
                
                //enregistrement de la demande dans la table entreprise_beneficiaire_module
                $datedmd=date('d-m-Y');
                $dmdForm=EntrepriseBeneficiaireModule::create([
                    'entreprise_id'=>$idEnt,
                    'beneficiaire_id'=>$Ben,
                    'module_id'=>$tabIdMod[$i-1],
                    'attentes'=>$attentes,
                    'date_demande'=>$datedmd,
                    'booldmdF'=>0,
                ]);
                $enrgDmd=true;
            }
        }
        if($enrgDmd==true)
        {
            return redirect()->route('formation',  ['info'=>'Votre demande a bien été enregistré!']);
        }
    }

    //quitter le formulaire d'une demande sans enregistrer(sans terminer le processus)
    public function Quitter()
    {
        //supprimer l'entreprise créée $_get['idEnt']
        //dd($_GET['idEnt']);
        
        $rechEnt=EntrepriseBeneficiaireModule::where('entreprise_id',$_GET['idEnt'])->get();
        if(count($rechEnt)==0)//cette entreprise n'as pas de dmd enregistrée
        {
            $supEnt=Entreprise::find($_GET['idEnt'])->delete();
        }
        if($_GET['page']=="Ac")
        {
            return redirect()->route('accueil');
        }
        if($_GET['page']=="present")
        {
            return redirect()->route('presentation');
        }
        if($_GET['page']=="domF")
        {
            return redirect()->route('formation');
        }
        if($_GET['page']=="dev")
        {
            return redirect()->route('developpement');
        }
        if($_GET['page']=="cont")
        {
            return redirect()->route('contact');
        }
        if($_GET['page']=="fdfp")
        {
            return redirect()->route('fdfp');
        }
    }

    //Supprimer une demande de formation
    public function SupF()
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

        if($_GET['mode']=="Supprimer")
        {
            for($i=0;$i<$nblisteBenef;$i++)
            {
                $idBenef=$listeBenef[$i]->beneficiaire_id;
                $supdmdBen=EntrepriseBeneficiaireModule::find($listeBenef[$i]->id)->delete();
                $supBenef=Beneficiaire::find($idBenef)->delete();
                //rechercher si l'entreprise est liée à une autre demande, sinon on la supprime
                $autredmd=EntrepriseBeneficiaireModule::where('entreprise_id',$idEnt)->count();
                if($autredmd==0)
                {
                    $supEnt=Entreprise::find($idEnt)->delete();
                } 
            }
            //$supdmdF=dmdFormation::find($_GET['idDmdF'])->delete();
            $info="La demande à bien été supprimée!";
        }
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        
        $listedmd = EntrepriseBeneficiaireModule::orderby('created_at','desc')->get();
        $nblistedmd = EntrepriseBeneficiaireModule::count();
        
        return redirect()->route('dmdForm',['listedmd' => $listedmd, 'nblistedmd' => $nblistedmd, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/dmdForm',['listedmdF' => $listedmdF, 'nblistedmdF' => $nblistedmdF, 'nblistedmdF' => $nblistedmdF, 'listelier' => $listelier,'nblistelier' => $nblistelier, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    // marquer une demande de formation
    public function MarqF()
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

        if($_GET['mode']=="Marquer")
        {
            for($i=0;$i<$nblisteBenef;$i++)
            {
                $marqdmdF=EntrepriseBeneficiaireModule::find($listeBenef[$i]->id)->update([
                    'booldmdF'=>1,
                ]);
            }
        }
        
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        $listedmd = EntrepriseBeneficiaireModule::orderby('created_at','desc')->get();
        $nblistedmd = EntrepriseBeneficiaireModule::count();
        $info="La demande à bien été marquée!";
        return redirect()->route('dmdForm',['listedmd' => $listedmd, 'nblistedmd' => $nblistedmd, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/dmdForm',['listedmdF' => $listedmdF, 'nblistedmdF' => $nblistedmdF, 'nblistedmdF' => $nblistedmdF, 'listelier' => $listelier,'nblistelier' => $nblistelier, 'info'=>$info, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

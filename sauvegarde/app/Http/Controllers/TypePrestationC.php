<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypePrestation;
use App\suggestion;
use App\lier2;

class TypePrestationC extends Controller
{
    //Afficher la liste des types de prestation
    public function AfficheTypePrest()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        $listeTypePr = TypePrestation::all();
        $nblisteTypePr = TypePrestation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return view('administration/typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //afficher les types de prestation ds le formulaire de demandes
    public function AfficheTypePrest2()
    {
        $listeTypePr = TypePrestation::all();
        $nblisteTypePr = TypePrestation::count();
        if(TypePrestation::where('boolTPrest','1')->count()>0)
        {
            return view('dmdPrest',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr]);
        }
        else
        {
            return view('contact',['info2' => 'Aucun Type de Prestation disponible pour le moment.']);
        }
    }

    public function newTypePr(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }

        request()->validate([
            'libPr' => ['required'],
        ]);

        //modifier un type de prestation
        if($_GET['mode']=="Modifier")
        {
            $updTypeP=TypePrestation::find($_GET['idTypeP']) -> update([
                'libPr'=>ucwords($request->libPr),
            ]);
            $action="modification";
        }
        else if($_GET['mode']=="Ajouter") //ajouter un nouveau domaine
        {
            $newTypeP=TypePrestation::create([
                'libPr'=>ucwords($request->libPr),
                'boolTPrest'=>"0", //c'est une valeur qui ne se trouve pas ds le formulaire
            ]);
            $action="enregistrement";
        }
        $info="Votre $action s'est effectué(e) avec succès!";
        $listeTypePr = TypePrestation::all();
        $nblisteTypePr = TypePrestation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //Supprimer, intégrer ou retirer un type prestation chez l'Admin
    public function SupTypeP()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }
        if($_GET['mode']=="Supprimer")
        {
            $info="";
            $info2="";
            $rechType=lier2::where('typePrest',$_GET['idTypeP'])->get();
            if(count($rechType)>0)
            {
                $info2="Impossible de supprimer! Ce Type de Prestation est lié à une demande";
            }
            else
            {
                $supTypeP=TypePrestation::find($_GET['idTypeP']) -> delete();
                $info="Votre Type de Prestation a été supprimé";
            }
            
        }

        $listeTypePr = TypePrestation::all();
        $nblisteTypePr = TypePrestation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'info2' => $info2, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //intégrer ou retirer un type prestation chez l'Admin
    public function RetTypeP()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
           
        }

        if($_GET['mode']=="Retirer")
        {
            $retTypeP=TypePrestation::find($_GET['idTypeP']) -> update([
                'boolTPrest'=>"0",
            ]);
            $action="retiré.";
        }
        else if($_GET['mode']=="Integrer")
        {
            $intTypeP=TypePrestation::find($_GET['idTypeP']) -> update([
                'boolTPrest'=>"1",
            ]);
            $action="mis en ligne.";
        }

        $info="Votre Type de Prestation a été $action";
        $listeTypePr = TypePrestation::all();
        $nblisteTypePr = TypePrestation::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
        //return view('administration/typePr',['listeTypePr' => $listeTypePr, 'nblisteTypePr' => $nblisteTypePr, 'info' => $info, 'nbSugNonLu'=>$nbSugNonLu]);
    }
}

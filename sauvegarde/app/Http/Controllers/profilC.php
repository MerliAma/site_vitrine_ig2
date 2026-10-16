<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suggestion;

class profilC extends Controller
{
    //Afficher sugNonLu
    public function profilSug()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return view('administration/profil', ['nbSugNonLu'=>$nbSugNonLu]); 
    }

}

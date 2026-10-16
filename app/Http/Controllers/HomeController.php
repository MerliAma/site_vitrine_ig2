<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ajouté
use App\suggestion;
use App\dmdFormation;
use App\dmdPrestation;
use App\evenement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   /* public function index()
    {
        return view('home');
    }*/

    public function redirectDashboard()
    {
        if(Auth::check())
        {
            /*if(Auth::user()->role->id==1)
            {
                return redirect()->route('accueilAd');
            }
            else
            {
                return redirect()->route('accueilAd');
            }*/
            return redirect()->route('accueilAd'); 
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\suggestion;
use App\dmdFormation;
use App\dmdPrestation;
use App\evenement;
use App\role;

class UserC extends Controller
{
    //première connexion à l'appli
    public function firstConnect()
    {
        //ds new user
    }

    //afficher la liste des users
    public function afficheUser()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }
        $listeUser=User::all();
        $nblisteUser=User::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        if(isset($_GET['info']))
        {
            return view('administration/user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$_GET['info']]);
        }
        return view('administration/user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu]);
    }

    //ajouter un user
    public function newUser(Request $request)
    {
        
        /*if($request->password!=$request->password_confirmation) //verifier si l'utilisateur connecté à le droit...!?
        {
            $info="Les Mots de Passe ne sont pas identiques";
            return view('administration/newUser',['info'=>$info]);
        }
        else if(strlen(trim($request->telUser))!=8)
        {
            $info="Erreur sur le N° de téléphone";
            return view('administration/newUser',['info'=>$info]);
        }
        else
        {*/
        //création des roles: admin et autre
        if(role::count()==0)
        {
            $user=new role();
            $user->libelle='Admin';
            $user->save();

            $user=new role();
            $user->libelle='Autre';
            $user->save();
        }

        $mode = $request->input('mode', $_GET['mode'] ?? '');
        $idUser = $request->input('idUser', $_GET['idUser'] ?? null);

        // Nettoyage préalable du numéro de téléphone (uniquement les chiffres)
        if ($request->has('telUser')) {
            $telClean = preg_replace('/\D/', '', $request->telUser);
            $request->merge(['telUser' => $telClean]);
        }

        if(User::count()==0 && $mode=="new")
        {
            $request->validate([
                'name' => ['required'],
                'telUser' => ['required', 'min:10','max:10'],
                'email' => ['required', 'email','unique:users'],
                'password' => ['required', 'confirmed', 'min:6'],
                'password_confirmation' => ['required'],
                'username'=>['required'],
            ]);
    
            $password=Hash::make($request->password);
            $idAdmin=role::where('libelle','Admin')->get();
            $user=new User();
            $user->name=strtoupper($request->name);
            $user->email=$request->email;
            $user->telUser=wordwrap($request->telUser,2,"-",true);
            $user->username=$request->username;
            $user->role_id=$idAdmin[0]->id;
            $user->password=$password;
            $user->save();
            
            return redirect()->route('profil');           
        }

        if($mode=="Ajouter")
        {
            $request->validate([
                'name' => ['required'],
                'telUser' => ['required', 'min:10','max:10'],
                'email' => ['required', 'email','unique:users'],
                'password' => ['required', 'confirmed', 'min:6'],
                'password_confirmation' => ['required'],
                'username'=>['required', 'unique:users'],
            ]);

            $password=Hash::make($request->password);
            
            $user=new User();
            $user->name=strtoupper($request->name);
            $user->email=$request->email;
            $user->telUser=wordwrap($request->telUser,2,"-",true);
            $user->username=$request->username;
            $user->role_id=$request->role_id ?? role::where('libelle', 'Autre')->value('id');
            $user->password=$password;
            $user->save();
            
            $info="Votre Utilisateur a bien été enregistré !";
            $listeUser=User::all();
            $nblisteUser=User::count();
            $nbSugNonLu=suggestion::where('boolSug','0')->count();
            
            return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
        }
        else if($mode=="Modifier" && $idUser)
        {
            $user=User::find($idUser);
            if (!$user) {
                return redirect()->back()->withErrors(['idUser' => "Utilisateur introuvable."]);
            }

            if($request->filled('password'))
            {
                $request->validate([
                    'name' => ['required'],
                    'telUser' => ['required', 'min:10','max:10'],
                    'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                    'password' => ['required', 'confirmed', 'min:6'],
                    'password_confirmation' => ['required'],
                    'username'=>['required', 'unique:users,username,' . $user->id],
                ]);

                $password=Hash::make($request->password);
                $user->password=$password;
            }
            else
            {
                $request->validate([
                    'name' => ['required'],
                    'telUser' => ['required', 'min:10', 'max:10'],
                    'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                    'username'=>['required', 'unique:users,username,' . $user->id],
                ]);
            }

            $user->name=strtoupper($request->name);
            $user->email=$request->email;
            $user->telUser=wordwrap($request->telUser,2,"-",true);
            $user->username=$request->username;
            if ($request->has('role_id') && $request->role_id) {
                $user->role_id = $request->role_id;
            }
            $user->save();
            
            $info="Modification effectuée avec succès !";
            // Si on modifie son propre compte, rediriger vers profil, sinon vers la liste des utilisateurs
            if (Auth::check() && Auth::id() == $user->id) {
                return redirect()->route('profil',['info'=>$info]);
            } else {
                return redirect()->route('user',['info'=>$info]);
            }
        }
    }

    //supprimer un user
    public function SupUser(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }

        $mode = $request->input('mode', $_GET['mode'] ?? '');
        $idUser = $request->input('idUser', $_GET['idUser'] ?? '');

        if($mode=="Supprimer" && $idUser)
        {
            User::where('id', $idUser)->delete();
        }
        $listeUser=User::all();
        $nblisteUser=User::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        $info="Suppression réussie !";
        return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
    }

    //réinitialiser permission un user
    public function RenPermUser(Request $request)
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }

        $mode = $request->input('mode', $_GET['mode'] ?? '');
        $idUser = $request->input('idUser', $_GET['idUser'] ?? '');

        if($mode=="Perm" && $idUser)
        {
            $listeUser=User::all();
            $nblisteUser=User::count();
            $nbSugNonLu=suggestion::where('boolSug','0')->count();

            $PermUser=User::find($idUser);
            if ($PermUser) {
                $idAdmin=role::where('libelle','Admin')->first();
                $idAdmin=$idAdmin ? $idAdmin->id : 1;
                if($PermUser->role_id==$idAdmin) 
                {
                    if(User::where('role_id',$idAdmin)->count()>1)
                    {
                        $idAutre=role::where('libelle','Autre')->first();
                        $idAutre=$idAutre ? $idAutre->id : 2;
                        $PermUser->update([
                            'role_id'=>  $idAutre,
                        ]);
                    }
                    else
                    {
                        return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info2'=>'Impossible de Réduire les privilèges de l\' Administrateur unique']);   
                    }
                }
                else
                {
                    $PermUser->update([
                        'role_id'=>  $idAdmin,
                    ]);
                }
            }
        }
        
        $info="Modification réussie !";
        $listeUser=User::all();
        $nblisteUser=User::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
    }
    
}

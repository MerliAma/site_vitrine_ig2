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

        if(User::count()==0 && $_GET['mode']=="new")
        {
            request()->validate([
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
        if($_GET['mode']=="Ajouter")
        {
            request()->validate([
                'name' => ['required'],
                'telUser' => ['required', 'min:10','max:10'],
                'email' => ['required', 'email','unique:users'],
                'password' => ['required', 'confirmed', 'min:6'],
                'password_confirmation' => ['required'],
                'username'=>['required'],
            ]);

            $password=Hash::make($request->password);
            
            $user=new User();
            $user->name=strtoupper($request->name);
            $user->email=$request->email;
            $user->telUser=wordwrap($request->telUser,2,"-",true);
            $user->username=$request->username;
            $user->role_id=$request->role_id;
            $user->password=$password;
            //dd($user->email);
            $user->save();
            
            $info="Votre Utilisateur a bien été enregistré!";
            $listeUser=User::all();
            $nblisteUser=User::count();
            $nbSugNonLu=suggestion::where('boolSug','0')->count();
            
            return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
        }
        else if($_GET['mode']=="Modifier")
        {
            //if()
            if($request->password!="")
            {
                request()->validate([
                    'name' => ['required'],
                    'telUser' => ['required', 'min:10','max:10'],
                    'email' => ['required', 'email'],
                    'password' => ['required', 'confirmed', 'min:6'],
                    'password_confirmation' => ['required'],
                    'username'=>['required'],
                ]);

                $password=Hash::make($request->password);

                $user=User::find($_GET['idUser']);
                $user->name=strtoupper($request->name);
                $user->email=$request->email;
                $user->telUser=wordwrap($request->telUser,2,"-",true);
                $user->username=$request->username;
                $user->password=$password;
                //dd($user->email);
                $user->save();
            }
            else
            {
                request()->validate([
                    'name' => ['required'],
                    'telUser' => ['required', 'min:10', 'max:10'],
                    'email' => ['required', 'email'],
                    'username'=>['required'],
                ]);

                $user=User::find($_GET['idUser']);
                $user->name=strtoupper($request->name);
                $user->email=$request->email;
                $user->telUser=wordwrap($request->telUser,2,"-",true);
                $user->username=$request->username;
                $user->save();
            }
            
            $info="Modification effectuée avec succès!";
            return redirect()->route('profil',['info'=>$info]);
        }
        //return view('administration/user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
        //}
    }

    //supprimer un user
    public function SupUser()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }

        if($_GET['mode']=="Supprimer")
        {
            $supUser=User::find($_GET['idUser'])->delete();
        }
        $listeUser=User::all();
        $nblisteUser=User::count();
        $nbSugNonLu=suggestion::where('boolSug','0')->count();
        $info="Suppression réussie!";
        return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
    }

    //réinitialiser permission un user
    public function RenPermUser()
    {
        if (auth()->guest()) 
        {
            return redirect('/login')->withErrors([
                'logout' => "Vous devez être connecté pour voir cette page.",
            ]);
        }

        /*if($_GET['mode']=="Ren")
        {
            $ReUser=User::find($_GET['idUser'])->update([
                'password'=>Hash::make("000000"),
            ]);
        }*/
        if($_GET['mode']=="Perm")
        {
            $listeUser=User::all();
            $nblisteUser=User::count();
            $nbSugNonLu=suggestion::where('boolSug','0')->count();

            $PermUser=User::find($_GET['idUser']);
            $idAdmin=role::where('libelle','Admin')->get();
            $idAdmin=$idAdmin[0]->id;
            if($PermUser->role_id==$idAdmin) 
            {
                if(User::where('role_id',$idAdmin)->count()>1)
                {
                    $idAutre=role::where('libelle','Autre')->get();
                    $idAutre=$idAutre[0]->id;
                    $PermUser=User::find($_GET['idUser'])->update([
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
                $PermUser=User::find($_GET['idUser'])->update([
                    'role_id'=>  $idAdmin,
                  ]);
            }
        }
        
        $info="Modification réussie!";
        return redirect()->route('user',['listeUser'=>$listeUser, 'nblisteUser'=>$nblisteUser, 'nbSugNonLu'=>$nbSugNonLu, 'info'=>$info]);
    }
    
}

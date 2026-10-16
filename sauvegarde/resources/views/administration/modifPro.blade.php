@extends('Layouts/admin/baseAdmin2',['title'=>''])

@section('contenu')
<!-- MAIN -->
<div class="main2"> <style>.main2{padding-top:70px;padding-left:70px;padding-right:70px;} </style>
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
            <?php
                use App\User;
                use App\role;
                $role=role::all();

                //$nbSugNonLu=suggestion::where('boolSug','0')->count();
                if(User::count()==0)
                {
                    $actionNewU="Bienvenue, veuillez vous enregistrer pour continuer";
                    $idUser=null;
                }
                else if($_GET['mode']=="Modifier")
                {
                    $actionNewU="Modification du profil";
                    $idUser=$_GET['idUser'];
                    $user=User::find($idUser);
                    $tel=substr($user->telUser,0,2).substr($user->telUser,3,2).substr($user->telUser,6,2).substr($user->telUser,9,2);
                }
            ?>
			<h3 class="page-title"><?php if(isset($actionNewU)) {echo $actionNewU;} ?></h3> 
			<div class="row">
                @if($errors->has('password'))
                    <div class="alert alert-warning alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Les Mots de passe ne sont pas identiques ou la taille minimum non respectée.
                    </div>
                @endif
                        @if($errors->has('telUser'))
                            <div class="alert alert-warning alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Erreur sur le N° de téléphone!
                            </div>
                        @endif
                        @if($errors->has('email'))
                            <div class="alert alert-warning alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Erreur sur l'Email!
                            </div>
                        @endif
                    
						<div class="col-md-12"> <!--une class "formulaire" en suspend-->
                        <!--<div class="panel">-->
                       
                            <form  action="{{route('newUser2','mode='.$_GET['mode'].'&idUser='.$idUser)}}" method="post">
                            @csrf
                                <!--<div class="form-group">
                                    <label for="Input1">Identifiant</label>
                                    <input type="text" class="form-control" id="Input1" placeholder="" name="idUser">
                                </div>
                                <div class="form-group">
                                    <label for="Input2">Noms et Prénoms</label>
                                    <input type="text" class="form-control" id="Input2" placeholder="Nom Prénoms" name="name" required="required" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="Input3">Téléphone</label>
                                    <input type="number" class="form-control" id="Input3" placeholder="05050505" name="telUser" required="required" value="{{old('telUser')}}">
                                </div>-->
                                <style>.form-control{font-size:17px; text-align:justify;}</style>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Input2" class="text-info">Noms et Prénoms</label>
                                        <input type="text" class="form-control" id="Input2" placeholder="Nom Prénoms" name="name" required="required" value="{{$user->name ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Input3" class="text-info">Téléphone</label>
                                        <input type="number" class="form-control" id="Input3" placeholder="0102030405" name="telUser" required="required" value="{{$tel ?? ''}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Input4" class="text-info">Email</label>
                                        <input type="text" class="form-control" id="Input4" placeholder="name@gmail.com" name="email" required="required" value="{{$user->email ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Input5" class="text-info">Login</label>
                                        <input type="text" class="form-control" id="Input5" name="username" required="required" value="{{$user->username ?? ''}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Input6" class="text-info">Nouveau Mot de Passe (6 caractères minimum)</label>
                                        <input type="password" class="form-control" id="Input6" name="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Input7" class="text-info">Confirmation du Mot de Passe (6 caractères minimum)</label>
                                        <input type="password" class="form-control" id="Input7" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for=""></label>
                                    <center><button type="submit" class="btn btn-success" ><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if($_GET['mode']=="Modifier")
                                    <a href="{{route('profil')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a>
                                    @else
                                    <a href="{{route('accueil')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a>
                                    @endif
                                    </center></div>
                                </div>
                            </form>
                        <!--</div>-->
                    </div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
<!--END MAIN--> 
@endsection
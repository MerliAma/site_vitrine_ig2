@extends('Layouts/admin/baseAdmin',['title'=>'Nouvel Utilisateur'])

@section('navactive')
<ul class="nav">
	<li><a href="{{route('accueilAd')}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
	<li>
		<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Demandes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
		<div id="subPages" class="collapse ">
			<ul class="nav">
				<li><a href="{{route('dmdForm')}}" class="">Formations</a></li>
				<li><a href="{{route('dmdPrest')}}" class="">Prestations</a></li>
			</ul>
		</div>
	</li>
	<li><a href="{{route('domForm')}}" class=""><i class="lnr lnr-laptop"></i> <span>Domaines Formations</span></a></li>
	<li><a href="{{route('typePr')}}" class=""><i class="lnr lnr-code"></i> <span>Types Prestations</span></a></li>
    <li><a href="{{route('suggestions')}}" class=""><i class="lnr lnr-alarm"></i> <span>Suggestions</span></a></li>
    <li><a href="{{route('evenements')}}" class=""><i class="lnr lnr-calendar-full"></i> <span>Evènements</span></a></li>
    <?php
	use App\role;
	$idAdmin=role::where('libelle','Admin')->get();
	if(Auth::user()->role_id==$idAdmin[0]->id)
	{ ?>
	<li><a href="{{route('user')}}" class="active"><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
	<?php 
	}
	?>
</ul>
@endsection

@section('contenu')
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                <?php
                    use App\User;
                    use App\suggestion;
                    $role=role::all();

                    $nbSugNonLu=suggestion::where('boolSug','0')->count();
                    $idUser=null;
                    $actionNewU="Ajout d'un nouvel Utilisateur";
                ?>
					<h3 class="page-title"><?php if(isset($actionNewU)) {echo $actionNewU;} ?></h3> 
					<div class="row">
					<div class="panel-body">
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
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Input2" class="text-info">Noms et Prénoms</label>
                                            <input type="text" class="form-control" id="Input2" placeholder="Nom Prénoms" name="name" required="required" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Input3" class="text-info">Téléphone</label>
                                            <input type="number" class="form-control" id="Input3" placeholder="0102030405" name="telUser" required="required" value="{{old('telUser')}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Input4" class="text-info">Email</label>
                                            <input type="text" class="form-control" id="Input4" placeholder="name@gmail.com" name="email" required="required" value="{{old('email')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Input5" class="text-info">Login</label>
                                            <input type="text" class="form-control" id="Input5" name="username" required="required" value="{{old('username')}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Input6" class="text-info">Mot de Passe (6 caractères minimum)</label>
                                            <input type="password" class="form-control" id="Input6" name="password" required="required">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Input7" class="text-info">Confirmation du Mot de Passe (6 caractères minimum)</label>
                                            <input type="password" class="form-control" id="Input7" name="password_confirmation" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Select1" class="text-info">Niveau Accès</label>
                                            <select class="form-control" id="Select1" name="role_id">
                                                @for($i=0;$i<count($role);$i++)
                                                    <option value="{{$role[$i]->id}}" selected="selected">{{$role[$i]->libelle}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <label for=""></label>
                                        <center><button type="submit" class="btn btn-success" ><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{route('user')}}"><button type="button" class="btn btn-danger"><i class="lnr lnr-cross"> </i>Annuler</button></a></center>
                                        </div>
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
<br/>
@endsection


@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection

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
	if(Auth::user()->role_id==1)
	{ ?>
	<li><a href="{{route('user')}}" class=""><i class="lnr lnr-users"></i> <span>Utilisateurs</span></a></li>
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
                    use App\role;
                    $role=role::all();

                    $nbSugNonLu=suggestion::where('boolSug','0')->count();
                    $idUser=null;
                    $actionNewU="Ajout d'un nouvel Utilisateur";
                ?>
					<h3 class="page-title"><?php if(isset($actionNewU)) {echo $actionNewU;} ?></h3> 
					<div class="row">
                    @error('name')
                        <span id="erreur">
    	                    {{ $message }}
                        </span>
                    @enderror
                    @error('password')
                        <span id="erreur">
    	                    {{ $message }}
                        </span>
                    @enderror
                    @error('username')
                        <span id="erreur">
    	                    {{ $message }}
                        </span>
                    @enderror
                    <style>#erreur{color:red; font-size:15px}</style>
						<div class="col-md-5 formulaire">
                            <!--<div class="panel">register-->
                                <form action="{{ route('register','mode='.$_GET['mode'].'&idUser='.$idUser) }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="name">Noms et Prénoms</label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="Input3">Téléphone</label>
                                        <input type="number" class="form-control" id="Input3" placeholder="05050505" name="telUser" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Login</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de Passe</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirmation du Mot de Passe</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="Select1">Niveau Accès</label>
                                        <select class="form-control" id="Select1" name="role_id">
                                        <?php
                                        for($i=0;$i<count($role);$i++)
                                        {
                                            echo '<option value="'.$role[$i]->id.'" selected="selected">'.$role[$i]->libelle.'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <br/><br/>
                                    <div class="form-group">
                                        <div class="col">
                                        <center><button type="submit" class="btn btn-success"><i class="lnr lnr-thumbs-up"> </i>Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<!--END MAIN--> 
@endsection

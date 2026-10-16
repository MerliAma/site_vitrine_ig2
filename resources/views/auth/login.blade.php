@extends('Layouts/app',['titre'=>'Se connecter'])

@section('content')

@error('email')
    <span id="erreur" class="invalid-feedback" role="alert">
    	Login ou Mot de passe incorrect(s)!
    </span>
@enderror
@error('password')
    <span id="erreur" class="invalid-feedback" role="alert">
		Login ou Mot de passe incorrect(s)!
    </span>
@enderror

@error('logout')
    <span id="erreur" class="invalid-feedback" role="alert">
    	{{$message}}
    </span>
@enderror

<style>#erreur{color:red; font-size:15px;} #first{color:blue; font-size:15px; text-align:center;}</style>

	<form class="form-auth-small" action="{{ route('login') }}" method="POST"> <!--action="{{route('verifLog')}}"-->
	@csrf
		<div class="form-group">
			<label for="email" class="control-label sr-only">Login ou Email</label>
			<input type="text" id="email"  placeholder="Login" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		</div>
		<div class="form-group">
			<label for="password" class="control-label sr-only">Mot de Passe</label>
			<input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		</div>
		<div class="form-group clearfix">
			<label class="fancy-checkbox element-left" for="remember">
				<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<span>Remember me</span>
			</label>
		</div>
		<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
		
	
	<?php
	use App\User;
	if(User::count()==0)
	{
		echo '<br/>Vous n\'êtes pas encore inscrit ? &nbsp;';
	?>
	<a href="{{route('modifPro','mode=new')}}" class="text-primary">Inscription &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
	<?php
	}
	else
	{
	?>
		<div class="bottom">
			<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Mot de passe oublié?</a></span> <!---->
		</div>
	<?php
	}
	?></form>
@endsection

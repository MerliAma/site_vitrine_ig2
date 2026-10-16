@extends('layouts.app',['titre'=>'Modification du mot de passe'])

@section('content')
<!--<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">-->
            <div class="card">
                <!--<div class="card-header">{{ __('Reset Password') }}</div>-->

                <div class="card-body">
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

                <style>#erreur{color:red; font-size:15px;}</style>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!--<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                        </div>-->
                        <div class="form-group">
                            <label for="email" class="control-label sr-only">Email</label>
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label sr-only">Mot de Passe</label>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="control-label sr-only">Confirmation du Mot de Passe</label>
                            <input id="password-confirm" type="password" placeholder="Confirmation du Mot de Passe" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!--</div>
    </div>
</div>-->
@endsection

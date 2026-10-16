@extends('layouts.app',['titre'=>'Réinitialisation'])

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">-->
        @error('email')
            <span id="erreur" class="invalid-feedback" role="alert">
                Email incorrect!
            </span>
        @enderror
        <style>#erreur{color:red; font-size:15px;}</style>

            <div class="card">
                <!--<div class="card-header">{{ __('Reset Password') }}</div>-->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!--<div class="form-group row">
                            <label for="email" class="control-label sr-only">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="email" class="control-label sr-only">Login ou Email</label>
                            <input type="email" id="email"  placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="/acceuil/images/logo_eaux_forrets_chasses.png"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>
    <!-- /.login-logo -->

    <!-- /.login-box-body -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Veuillez vous authentifier</p>

            <form method="post" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"                       
                           value="{{ user_admin()? user_admin()->email : old('email')}}"
                           placeholder="Email"
                           class="form-control @error('email') is-invalid @enderror" {{ user_admin()? 'readonly' : ''}}>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           placeholder="Mot de passe"
                           class="form-control @error('password') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>

                <div class="row">
<!--                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>-->

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </div>

                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Créer un compte</a>
            </p>
            @if(user_admin())
            <p class="mb-0">
                <a href="{{ route('backpack.dashboard') }}" class="text-center">Retour à l'espace d'administration</a>
            </p>
            @endif
        </div>
        <!-- /.login-card-body -->
    </div>

</div>
<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>

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

    <div class="card">
        <div class="card-body login-card-body">
            
             @if($valid_link)
            
            <p class="login-box-msg">Vous y etes presque, actualiser votre mot de passe maintenent.</p>

            <form action="{{ route('compte.activate') }}" method="POST">
                @csrf

                <input type="hidden" name="code" value="{{ $code }}">

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Activer</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

             @else
            <p class="mt-3 mb-1">
                Votre lien d'activation ou de changement de mot de passe n'est plus utilisable. Veuillez demander un autre lien en cliquant <a href="{{ route('password.request') }}">ici</a>
            </p>
            @endif
            
            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Se connecter</a>
            </p>
            
           
            
            
        </div>
        <!-- /.login-card-body -->
    </div>

</div>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>

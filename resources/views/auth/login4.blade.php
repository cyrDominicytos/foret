<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>eForex</title>
        <meta name="description" content="Bureau de l&amp;#039;Evaluation des Politiques Publiques">
        <!-- Favicon -->
        <link rel="shortcut icon" href="/acceuil/images/logo_eaux_forrets_chasses.png">

        <!-- page css -->

        <!-- Core css -->
        <link href="pro/css/app.min.css" rel="stylesheet">
        <link href="pro/css/stylesheet.css?v=1.004" rel="stylesheet">


    </head>

    <body>
        <div class="app">



            <div class="container-fluid p-0 h-100">
                <div class="row no-gutters h-100 full-height">
                    <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('/acceuil/images/pencil-1209544_1920-640x940.jpg')">
                        <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                            <div class="login-logo-triangle-container"></div>
                            <div class="login-logo-container">
                                <img src="/acceuil/images/logo_eaux_forrets_chasses.png" style="width: 100px;height: 100px" alt="">
                            </div>
                            <div class="banner-text-container">
                                <h1 class="text-white m-b-20 font-weight-normal">Plateforme digitalisée des formalités et procédures de contrôle des produits forestiers destinés à l’exportation au Bénin</h1>
                                <p class="text-white font-size-16 lh-2 w-80 opacity-08">Bienvenue au portail web de la Direction Générale des Eaux, Forêts et Chasse (DGEFC). Accéder à votre espace de travail</p>
                            </div>
                            <div class="d-flex justify-content-between login-footer">
                                <span class="text-white">© 2021 DGEFC</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 bg-white">
                        <div class="container h-100 login-container">
                            <div class="row no-gutters my-h-auto align-items-center">
                                <div class="col-md-8 col-lg-7 col-xl-6 mx-auto login-form-container">
                                    <div class="hide-on-big-screen m-t-10 m-auto"style="text-align: center">
                                        <img style="width: 35%" src="/acceuil/images/logo_eaux_forrets_chasses.png" alt="">
                                        <hr class="mobile-m-t-b-10">
                                    </div>
                                    <h2>Se connecter</h2>
                                    <p class="m-b-30">Saisissez vos informations de connexion pour vous authentifier</p>
                                    <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
                                           <!-- <input type="hidden" name="beppaagg_csrf_token_nonce" value="1ec5d2667ccfcdb793eee8cfdf7409b8" /> -->
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="font-weight-semibold">Email</label>   
                                            <!-- <div class="input-affix"> -->
                                                <!-- <i class="prefix-icon anticon anticon-user"></i> -->
                                            <div class="input-group mb-3">
                                                <input type="text" name="email" value="{{ user_admin()? user_admin()->email : old('email')}}" id="email" placeholder="Adresse Email" class="form-control @error('email') is-invalid @enderror" {{ user_admin()? 'readonly' : ''}}  />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                                @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror

                                            </div>

                                        </div>
                                        <div>

                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="font-weight-semibold">Mot de passe</label>
                                            <!-- <div class="input-affix m-b-10"> -->
                                                <!-- <i class="prefix-icon anticon anticon-lock"></i> -->
                                            <div class="input-group mb-3">
                                                <input type="password" name="password" value="" id="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror"  />
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                                @error('password')
                                                <span style="display: block;" class="form-group error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <div class="checkbox">
                                               <!--  <input type="checkbox" name="login[remember]" value="1" checked="checked"  id="checkbox2" />
                                            <label for="checkbox2">Se souvenir de moi</label> -->
                                                <p><a class="float-right" href="{{ route('password.request') }}">Mot de passe oublié ?
                                                    </a><p/><br>
                                                <p class="mb-0">
                                                    <a href="{{ route('register') }}" style="float: right;" class="text-center">Créer un compte</a>
                                                </p>
                                                @if(user_admin())
                                                <p class="mb-0">
                                                    <a href="{{ route('backpack.dashboard') }}" style="float: right;" class="text-center">Retour à l'espace d'administration</a>
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div id="my_google_recaptcha"></div> -->
                                            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfLT_EUAAAAAFVheYzMMKH_KKZLFatqvWcUjlac" data-expired-callback="recaptchaExpired"></div>

                                            <input type="hidden" name="g-recaptcha-response" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">

                                                    <a class="anticon anticon-arrow-left" href="{{ route("acceuil") }}"> <i
                                                            class=""></i> Retourner au site</a>
                                                </span>
                                                <button disabled=""  id="recaptcha_submit" type="submit"  class="btn btn-primary m-l-5"><span>Se connecter</span>
                                                    <i class="anticon anticon-loading m-l-5"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </form>


                                    @if(user_admin())
                                    <p class="mb-0">
                                        <a href="{{ route('backpack.dashboard') }}" class="text-center">Retour à l'espace d'administration</a>
                                    </p>
                                    @endif

                                    </form>            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>



            function recaptchaCallback()
            {
                $('#recaptcha_submit').removeAttr('disabled');
            }
            ;

            function recaptchaExpired()
            {

                $('#recaptcha_submit').attr('disabled', 'disabled');
            }
            ;



        </script>


        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
                async defer>
        </script>
        <script src="pro/js/vendors.min.js"></script>
        <script>
    var clientData = {"publicAjaxifyUrl": "http:\/\/127.0.0.1\/epp-master\/ajaxify\/doCronJobs", "csrf_token_name": "beppaagg_csrf_token_nonce", "csrf_hash": "1ec5d2667ccfcdb793eee8cfdf7409b8"}</script>
        <script src="pro/js/app.min.js"></script>
        <script src="pro/js/public.js?v=1.003"></script>
        <script src="landing/js/ajaxify.js?v=1.001"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>


<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>eForex</title>
        <meta name="description" content="Bureau de l&amp;#039;Evaluation des Politiques Publiques">
        <!-- Favicon -->
        <link rel="shortcut icon" href="http://127.0.0.1/epp-master/uploads/favicon-ultimate-150x150.png">

        <!-- page css -->

        <!-- Core css -->
        <link href="../pro/css/app.min.css" rel="stylesheet">
        <link href="../pro/css/stylesheet.css?v=1.004" rel="stylesheet">

         <script type="text/javascript">
            var verifyCallback = function (response) {
                if ($('form input[name=g-recaptcha-response]')) {
                    $('form input[name=g-recaptcha-response]').val(response);
                    $('form button[type=submit]').removeAttr('disabled');
                }
            };
            var verifyExpireCallback = function (response) {
                alert('in');
                $('form button[type=submit]').attr('disabled', '');
            };
            var verifyErrorCallback = function (response) {
                $('form button[type=submit]').attr('disabled', '');
            };
            var onloadCallback = function () {
                grecaptcha.render(/*HTML ID*/'my_google_recaptcha', {
                    'sitekey': '<?= config("eforex.recaptcha.sitkey"); ?>',
                    'data-expired-callback': verifyExpireCallback,
                    'data-error-callback': verifyErrorCallback,
                    'callback': verifyCallback,
                });
            };
        </script>  

    </head>

    <body>
        <div class="app">



            <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('http://127.0.0.1/epp-master/assets/pro/images/others/login-3.png')">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100">
                        <div class="row align-items-center w-100">
                            <div class="col-md-7 col-lg-5 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <img class="img-fluid m-auto" alt="" src="/acceuil/images/logo_eaux_forrets_chasses.png" style="width: 100px;height: 100px">
                                        </div>
                                        <h5 class="m-b-25 text-center">Réinitialisez votre mot de passe</h5>
                                        <form action="{{ route('password.email') }}" method="post" accept-charset="utf-8">
                                            @csrf
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                <!-- <div class="input-affix"> -->
                                                   <!--  <i class="prefix-icon anticon anticon-user"></i> -->
                                                <div class="input-group mb-3">
                                                    <input type="email" name="email" value="" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Saisissez adresse Email"/>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                    <span style="display: block;" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div id="my_google_recaptcha"></div>                                            
                                                <input type="hidden" name="g-recaptcha-response" value="" />
                                            </div>
                                            @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                            @endif  
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="font-size-13 text-muted">
                                                        <a class="anticon anticon-arrow-left" href="{{ route("login") }}"> <i
                                                                class=""></i> Retour</a>
                                                    </span>

                                                    <button disabled=""  id="recaptcha_submit" type="submit" class="btn btn-primary"><span>Réinitialiser</span>
                                                        <i class="anticon anticon-loading m-l-5"></i>
                                                    </button>

                                                </div>
                                            </div>
                                        </form>                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-flex p-h-40 justify-content-between">
                        <span class="">© 2021 DGEFC</span>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
                async defer>
        </script>
        <script src="../pro/js/vendors.min.js"></script>
            <script>
var clientData = {"publicAjaxifyUrl": "http:\/\/127.0.0.1\/epp-master\/ajaxify\/doCronJobs", "csrf_token_name": "beppaagg_csrf_token_nonce", "csrf_hash": "e5b364b968b895fda2de1124a8a13414"}</script>
        <script src="../pro/js/app.min.js"></script>
        <script src="../pro/js/public.js?v=1.003"></script>
        <script src="../landing/js/ajaxify.js?v=1.001"></script>

    </body>
</html>
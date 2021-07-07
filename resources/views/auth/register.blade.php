
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }} | Registration Page</title>
        <meta name="description" content="Bureau de l&amp;#039;Evaluation des Politiques Publiques">
        <!-- Favicon -->
        <link rel="shortcut icon" href="http://127.0.0.1/epp-master/uploads/favicon-ultimate-150x150.png">

        <!-- page css -->

        <!-- Core css -->

        <link href="pro/css/app.min.css" rel="stylesheet">
        <link href="pro/css/stylesheet.css?v=1.004" rel="stylesheet">

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
                                    <h2>Compte</h2>
                                    <p class="m-b-30">Saissez vos informations pour créer un compte</p>
                                    <form action="{{ route('register') }}" method="post">

                                        @csrf
                                        <div class="form-group">

                                            <div class="input-group mb-3">
                                                <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="Prénom" maxlength="150" class="form-control @error('firstname') is-invalid @enderror" maxlength="200">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="input-group mb-3">
                                                <input type="text" name="name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" placeholder="Nom de famille" maxlength="100"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="input-group mb-3">
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                                       placeholder="Email" maxlength="50">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="input-group mb-3">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Mot de passe" maxlength="255"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                                </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="form-group">

                                            <div class="input-group mb-3">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Entrez de nouveau votre mot de passe" maxlength="255"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" class="@error('terms') is-invalid @enderror">
                                                <label for="agreeTerms">                               
                                                    J'accepte les <a href="#" data-toggle="modal" data-target="#termesEtconditions"> termes et conditions</a>
                                                </label>
                                                @error('terms')
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
                                                    <a class="anticon anticon-arrow-left" href="{{ route('login') }}">  Déjà membre ? Allez à la page de connexion
                                                    </a>
                                                </span>

                                                <button disabled=""  id="recaptcha_submit" type="submit"  class="btn btn-primary m-l-5"><span>S'enregistrer</span>
                                                    <i class="anticon anticon-loading m-l-5"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!------------------------------------ Modal termesEtconditions ---------------------------------------->
        <div class="modal fade" id="termesEtconditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Conditions et Termes d'utilisation de eForex</h5>
                        <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>-->
                    </div>
                    <div class="modal-body">

                        Conditions générales d'utilisation en vigueur à ce jour:

                        <br><br>Les présentes conditions générales d'utilisation (dites « CGU ») ont pour objet l'encadrement juridique des modalités de mise à disposition du site et des services par eforex et de définir les conditions d’accès et d’utilisation des services par « l'Utilisateur ».
                        <br>Toute inscription ou utilisation du site implique l'acceptation sans aucune réserve ni restriction des présentes CGU par l’utilisateur. Lors de l'inscription sur le site via le Formulaire d’inscription, chaque utilisateur accepte expressément les présentes CGU en cochant la case précédant le texte suivant : « J'accepte les termes et conditions».
                        <br>En cas de non-acceptation des CGU stipulées dans le présent contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.
                        eforex.bj se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes CGU.

                        <br><br>Article 1 : Les mentions légales
                        <br>L'édition du site eforex.bj est assurée par La direction Générale des Eaux Forets et Chasse du Bénin
                        <br><br>ARTICLE 2 : Accès au site
                        <br>Le site eforex.bj permet à l'Utilisateur un accès gratuit aux services suivants :
                        <br>RÉDACTION ET SUIVI DE DEMANDE D’EXPORTATION DES PRODUITS FORESTIER
                        <br>Le site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.
                        <br>L’Utilisateur non membre n'a pas accès aux services réservés. Pour cela, il doit s’inscrire en remplissant le formulaire. En acceptant de s’inscrire aux services réservés, l’Utilisateur membre s’engage à fournir des informations sincères et exactes concernant son état civil et ses coordonnées, notamment son adresse email.
                        Pour accéder aux services, l’Utilisateur doit ensuite s'identifier à l'aide de son identifiant et de son mot de passe qui lui seront communiqués après son inscription.
                        Tout Utilisateur membre régulièrement inscrit pourra également solliciter sa désinscription en se rendant à la page dédiée sur son espace personnel. Celle-ci sera effective dans un délai raisonnable.
                        Tout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du site ou serveur et sous réserve de toute interruption ou modification en cas de maintenance, n'engage pas la responsabilité de eforex.bj. Dans ces cas, l’Utilisateur accepte ainsi ne pas tenir rigueur à l’éditeur de toute interruption ou suspension de service, même sans préavis.
                        L'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse email de l’éditeur communiqué à l’ARTICLE 1.


                        <br><br>ARTICLE 3 : Collecte des données
                        <br>Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément aux lois en vigueur en République du Bénin
                        <br>En vertu de la loi Informatique et Libertés, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit :
                        ·         par mail à l'adresse mail info@eforex.bj
                        <br><br>ARTICLE 4 : Propriété intellectuelle
                        <br>Les marques, logos, signes ainsi que tous les contenus du site (textes, images, son…) font l'objet d'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur.
                        <br>La marque eforex est une marque déposée par eforex.Toute représentation et/ou reproduction et/ou exploitation partielle ou totale de cette marque, de quelque nature que ce soit, est totalement prohibée.
                        <br>L'Utilisateur doit solliciter l'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus. Il s'engage à une utilisation des contenus du site dans un cadre strictement privé, toute utilisation à des fins commerciales et publicitaires est strictement interdite.
                        <br>Toute représentation totale ou partielle de ce site par quelque procédé que ce soit, sans l’autorisation expresse de l’exploitant du site Internet constituerait une contrefaçon sanctionnée par l’article L 335-2 et suivants du Code de la propriété intellectuelle.
                        <br>Il est rappelé conformément à l’article L122-5 du Code de propriété intellectuelle que l’Utilisateur qui reproduit, copie ou publie le contenu protégé doit citer l’auteur et sa source.


                        <br><br>ARTICLE 5 : Responsabilité
                        <br>Les sources des informations diffusées sur le site eforex.bj sont réputées fiables mais le site ne garantit pas qu’il soit exempt de défauts, d’erreurs ou d’omissions.
                        <br>Les informations communiquées sont présentées à titre indicatif et général sans valeur contractuelle. Malgré des mises à jour régulières, le site eforex.bj ne peut être tenu responsable de la modification des dispositions administratives et juridiques survenant après la publication. De même, le site ne peut être tenue responsable de l’utilisation et de l’interprétation de l’information contenue dans ce site.
                        <br>L'Utilisateur s'assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite. Il assume les risques liés à l'utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.
                        <br>Le site eforex.bj ne peut être tenu pour responsable d’éventuels virus qui pourraient infecter l’ordinateur ou tout matériel informatique de l’Internaute, suite à une utilisation, à l’accès, ou au téléchargement provenant de ce site.
                        <br>La responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d'un tiers.
                        <br><br>ARTICLE 6 : Liens hypertextes
                        <br>Des liens hypertextes peuvent être présents sur le site. L’Utilisateur est informé qu’en cliquant sur ces liens, il sortira du site eforex.bj. Ce dernier n’a pas de contrôle sur les pages web sur lesquelles aboutissent ces liens et ne saurait, en aucun cas, être responsable de leur contenu.


                        <br><br>ARTICLE 7 : Cookies
                        <br>L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement sur son logiciel de navigation.
                        <br>Les cookies sont de petits fichiers stockés temporairement sur le disque dur de l’ordinateur de l’Utilisateur par votre navigateur et qui sont nécessaires à l’utilisation du site eforex.bj. Les cookies ne contiennent pas d’information personnelle et ne peuvent pas être utilisés pour identifier quelqu’un. Un cookie contient un identifiant unique, généré aléatoirement et donc anonyme. Certains cookies expirent à la fin de la visite de l’Utilisateur, d’autres restent.
                        <br>L’information contenue dans les cookies est utilisée pour améliorer le site eforex.bj.
                        <br>En naviguant sur le site, L’Utilisateur les accepte.
                        <br>L’Utilisateur doit toutefois donner son consentement quant à l’utilisation de certains cookies.
                        <br>A défaut d’acceptation, l’Utilisateur est informé que certaines fonctionnalités ou pages risquent de lui être refusées.
                        <br>L’Utilisateur pourra désactiver ces cookies par l’intermédiaire des paramètres figurant au sein de son logiciel de navigation.


                        <br><br>ARTICLE 8 : Droit applicable et juridiction compétente
                        <br>La législation béninoise s'applique au présent contrat. En cas d'absence de résolution amiable d'un litige né entre les parties, les tribunaux béninois seront seuls compétents pour en connaître.
                        <br>Pour toute question relative à l’application des présentes CGU, vous pouvez joindre l’éditeur aux coordonnées inscrites à l’ARTICLE 1.

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------ Fin Modal termesEtconditions ---------------------------------------->

        

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
        async defer>
        </script>
        <script src="pro/js/vendors.min.js"></script>
        <script>
        var clientData = {"publicAjaxifyUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/doCronJobs","csrf_token_name":"beppaagg_csrf_token_nonce","csrf_hash":"1ec5d2667ccfcdb793eee8cfdf7409b8"}    </script>
        <script src="pro/js/app.min.js"></script>
        <script src="pro/js/public.js?v=1.003"></script>
        <script src="landing/js/ajaxify.js?v=1.001"></script>        
    </body>
</html>

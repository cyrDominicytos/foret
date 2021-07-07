<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="eForex"/>
    <meta name="description" content="eForex"/>
    <meta name="author" content="www.akasigroup.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>eForex - Landing Page</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="/acceuil/images/logo_eaux_forrets_chasses.png"/>

    <!-- inject css start -->

    <!--== bootstrap -->
    <link href="/acceuil/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!--== animate -->
    <link href="/acceuil/css/animate.css" rel="stylesheet" type="text/css"/>

    <!--== fontawesome -->
    <link href="/acceuil/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>

    <!--== line-awesome -->
    <link href="/acceuil/css/line-awesome.min.css" rel="stylesheet" type="text/css"/>

    <!--== magnific-popup -->
    <link href="/acceuil/css/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>

    <!--== owl-carousel -->
    <link href="/acceuil/css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>

    <!--== base -->
    <link href="/acceuil/css/base.css" rel="stylesheet" type="text/css"/>

    <!--== shortcodes -->
    <link href="/acceuil/css/shortcodes.css" rel="stylesheet" type="text/css"/>

    <!--== default-theme -->
    <link href="/acceuil/css/style.css?v=1.0001" rel="stylesheet" type="text/css"/>

    <!--== responsive -->
    <link href="/acceuil/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!--== color-customizer -->
    <link href="#" data-style="styles" rel="stylesheet">
    <link href="/acceuil/css/color-customize/color-customizer.css" rel="stylesheet" type="text/css"/>

    <!-- inject css end -->

</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper">

    <!-- preloader start -->

    <div id="ht-preloader">
        <div class="loader clear-loader">
            <div class="loader-box"></div>
            <div class="loader-box"></div>
            <div class="loader-box"></div>
            <div class="loader-box"></div>
            <div class="loader-wrap-text">
                <div class="text"><span>e</span><span>F</span><span>o</span><span>r</span><span>e</span>x</span>
                </div>
            </div>
        </div>
    </div>

    <!-- preloader end -->


    <!--header start-->

    <header id="site-header" class="header header-1">
        <div class="container-fluid">
            <div id="header-wrap" class="box-shadow">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand logo" href="/">
                                <img id="logo-img" class="img-center" src="/acceuil/images/logo_eaux_forrets_chasses.png" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNavDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation"><span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <!-- Left nav -->
                                <ul id="main-menu" class="nav navbar-nav ml-auto mr-auto">
                                    <li class="nav-item"><a class="nav-link active" href="#home">Accueil</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#about">A propos</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#how">Comment ça marche</a>
<!--                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#team">Equipe</a>
                                    </li>-->
                                    <!--<li class="nav-item"><a class="nav-link" href="#testimony">Témoignages</a>-->
                                    </li>
                                </ul>
                            </div>
                            <a class="btn btn-theme btn-sm" href="{{ route('login') }}">
                             @auth
                             Espace de travail
                             @endauth                            
                             @guest
                             Connexion
                             @endguest                            
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--header end-->


    <!--hero section start-->

    <section id="home" class="fullscreen-banner banner p-0 bg-contain bg-pos-rt" data-bg-img="/acceuil/images/bg/01.png">
        <div class="spinner-eff">
            <div class="spinner-circle circle-1"></div>
            <div class="spinner-circle circle-2"></div>
        </div>
        <div class="align-center pt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 order-lg-1">
                        <img class="img-center wow jackInTheBox" data-wow-duration="3s" src="/acceuil/images/interconnected.jpg"
                             alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
<!--                        <h1 class="mb-4 wow fadeInUp" data-wow-duration="1.5s">eForex</h1>-->
                        <h1 class="mb-4 wow fadeInUp" data-wow-duration="1.5s">EFOREX</h1>
                        <p class="lead mb-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s"><h5>Plate forme digitalisée des formalités et procédures de contrôle des produits forestiers destinés à l’exportation au Bénin</h5>
                            <br>- Organiser le contrôle et l’exportation.
                            <br>- Mieux sécuriser les données et mieux servir les acteurs.
                        </p>
<!--                        <a class="btn btn-theme " href="#">En savoir plus
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--hero section end-->


    <!--body content start-->

    <div class="page-content">

        <!--feature start-->

        <section class="p-0 text-center wow fadeInUp" data-wow-duration="2s">
            <div class="container-fluid">
                <div class="row custom-mt-10 z-index-1 md-mt-0">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" data-dots="false" data-items="4" data-lg-items="3"
                             data-md-items="2" data-sm-items="1" data-autoplay="true">
                            <div class="item">
                                <div class="featured-item style-2">
                                    <div class="featured-icon">
                                        <i class="flaticon-chart"></i>
                                        <span class="rotateme"></span>
                                    </div>
                                    <div class="featured-title">
                                        <h5>Temps Reel</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Partage des informations entre acteurs et notifications en temps réel</p>
                                        <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="featured-item style-2">
                                    <div class="featured-icon">
                                        <i class="flaticon-process"></i>
                                        <span class="rotateme"></span>
                                    </div>
                                    <div class="featured-title">
                                        <h5>Accès aux données</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Moteur de partage des données entièrement intelligent, autonome et sécuritaire sans
                                            intervention humaine</p>
                                        <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="featured-item style-2">
                                    <div class="featured-icon">
                                        <i class="flaticon-software"></i>
                                        <span class="rotateme"></span>
                                    </div>
                                    <div class="featured-title">
                                        <h5>Flexible</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Grâce à la flexibilité de EFOREX, l'intégration de nouveaux services est plus rapide</p>
                                        <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="featured-item style-2">
                                    <div class="featured-icon">
                                        <i class="flaticon-market"></i>
                                        <span class="rotateme"></span>
                                    </div>
                                    <div class="featured-title">
                                        <h5>Data Reporting</h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Grâce à son tableau de bord moderne multi plateforme, visualisez vos statistiques personalisées en temps reel</p>
                                        <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="item">
                              <div class="featured-item style-2">
                                <div class="featured-icon">
                                  <i class="flaticon-analytics"></i>
                                  <span class="rotateme"></span>
                                </div>
                                <div class="featured-title">
                                  <h5>Easily To Use</h5>
                                </div>
                                <div class="featured-desc">
                                  <p>Top quality Software services, labore et dolore magna ali qua Lorem ipsum dolor sit amet.</p>
                                  <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                  </a>
                                </div>
                              </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--feature end-->


        <!--about start-->

        <section id="about" class="pos-r bg-contain bg-pos-l py-10" data-bg-img="/acceuil/images/bg/02.png">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12 image-column p-0 pr-lg-5">
                        <div class="img-box box-shadow">
                            <div class="box-loader">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <img class="img-center" src="/acceuil/images/dashboard1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 ml-auto col-md-12 md-mt-5">
                        <div class="section-title mb-4">
                            <div class="title-effect">
                                <div class="bar bar-top"></div>
                                <div class="bar bar-right"></div>
                                <div class="bar bar-bottom"></div>
                                <div class="bar bar-left"></div>
                            </div>
                            <h6>EFOREX</h6>
                            <h3>Faire et suivre sa demande d'exportation des produits forestiers depuis son espace client:</h3>
                        </div>
                        <ul class="list-unstyled list-icon mb-4">
                            <li class="mb-3"><i class="la la-check"></i> Gestion automatisée des flow de traitement</li>
                            <li class="mb-3"><i class="la la-check"></i> Notification en temps réel des différents acteurs tout au long des différents processus
                            </li>
                            <li class="mb-3"><i class="la la-check"></i> Data Reporting en temps réel</li>
<!--                            <li><i class="la la-check"></i> Accessible egalement sur mobile en version Android & iOS sur
                                les Stores respectifs
                            </li>-->
                        </ul>
<!--                        <a class="btn btn-border btn-circle" href="#"><i class="la la-android la-1-6x"></i> App Android
                        </a>
                        <a class="btn btn-theme btn-circle" href="#"><i class="la la-apple la-1-6x"></i> App iOS
                        </a>-->
                    </div>
                </div>
            </div>
        </section>

        <!--about end-->


        <!--step start-->

        <section id="how" class="text-center pos-r">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10 ml-auto mr-auto">
                        <div class="section-title">
                            <div class="title-effect">
                                <div class="bar bar-top"></div>
                                <div class="bar bar-right"></div>
                                <div class="bar bar-bottom"></div>
                                <div class="bar bar-left"></div>
                            </div>
                            <h6>Comment ça marche</h6>
                            <h2 class="title">Comment fonctionne EFOREX ?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="svg-container">
                        <svg id="svgC" width="100%" height="100%" viewBox="0 0 620 120"
                             preserveAspectRatio="xMidYMid meet"></svg>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="work-process">
                            <div class="box-loader"><span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="step-num-box">
                                <div class="step-icon"><span><i class="la la-binoculars"></i></span>
                                </div>
                                <div class="step-num">01</div>
                            </div>
                            <div class="step-desc">
                                <h4>Créer son compte</h4>
                                <p class="mb-0">Vous etes un exploitant forestier en règle en République du Bénin? Cliquer sur le bouton S'INSCRIR en haut de la page pour créer votre compte utilisateur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 md-mt-5">
                        <div class="work-process">
                            <div class="box-loader"><span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="step-num-box">
                                <div class="step-icon"><span><i class="la la-cloud-upload"></i></span>
                                </div>
                                <div class="step-num">02</div>
                            </div>
                            <div class="step-desc">
                                <h4>Remplir une demande d'exportation</h4>
                                <p class="mb-0">Connectez-vous à votre compte utilisateur et faites votre demande depuis votre espace</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 md-mt-5">
                        <div class="work-process">
                            <div class="step-num-box">
                                <div class="step-icon"><span><i class="la la-magic"></i></span>
                                </div>
                                <div class="step-num">03</div>
                            </div>
                            <div class="step-desc">
                                <h4>Traitement</h4>
                                <p class="mb-0">Votre demande suit le flow normal de traitement effectué par l'Administration Forestière du Bénin. Complétez toutes les formalités en lien avec votre demande depuis votre espace</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 md-mt-5">
                        <div class="work-process">
                            <div class="step-num-box">
                                <div class="step-icon"><span><i class="la la-truck"></i></span>
                                </div>
                                <div class="step-num">03</div>
                            </div>
                            <div class="step-desc">
                                <h4>Suivi</h4>
                                <p class="mb-0">EFOREX vous notifie automatiquement par mail de l'état de l'évolution de votre demande. Vous pouvez aussi consulter en ligne toutes les informations sur vos demandes</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--step end-->


        <!--team start-->

<!--        <section id="team" class="bg-effect right pos-r o-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-title">
                            <div class="title-effect">
                                <div class="bar bar-top"></div>
                                <div class="bar bar-right"></div>
                                <div class="bar bar-bottom"></div>
                                <div class="bar bar-left"></div>
                            </div>
                            <h6>Equipe </h6>
                            <h2 class="title">Découvrez l'équipe type des personnes qui maintiennent le EFOREX</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-xl-10 col-lg-11 col-md-10 ml-auto">
                        <div class="owl-carousel owl-theme" data-dots="false" data-items="3" data-md-items="2"
                             data-sm-items="1" data-autoplay="true">
                            <div class="item">
                                <div class="team-member style-1">
                                    <div class="team-images">
                                        <img class="img-fluid radius box-shadow" src="/acceuil/images/team.jpg" alt="">
                                    </div>
                                    <div class="team-description"><span>Chef de Mission</span>
                                        <h5>Pierre Houdagba</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-member style-1">
                                    <div class="team-images">
                                        <img class="img-fluid radius box-shadow" src="/acceuil/images/alexis.jpg" alt="">
                                    </div>
                                    <div class="team-description"><span>Expert Intégration</span>
                                        <h5>Alexis DJISSOU</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-member style-1">
                                    <div class="team-images">
                                        <img class="img-fluid radius box-shadow" src="/acceuil/images/team.jpg" alt="">
                                    </div>
                                    <div class="team-description"><span> Assurance Qualité</span>
                                        <h5>Valentin Akando</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="team-member style-1">
                                    <div class="team-images">
                                        <img class="img-fluid radius box-shadow" src="/acceuil/images/team.jpg" alt="">
                                    </div>
                                    <div class="team-description"><span> Transformation Digitale</span>
                                        <h5>ANIMASHAUN Michael</h5>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="clients-logo">
                            <img class="img-center" style="height: 50px" src="/acceuil/images/cfe.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="clients-logo">
                            <img class="img-center" style="height: 50px" src="/acceuil/images/logo-otr.png" alt="">
                        </div>
                    </div>
                  <div class="col-lg-3 col-md-6">
                        <div class="clients-logo">
                            <img class="img-center" style="height: 50px" src="/acceuil/images/inseed.png" alt="">
                        </div>
                    </div><div class="col-lg-3 col-md-6">
                        <div class="clients-logo">
                            <img class="img-center" style="height: 50px" src="/acceuil/images/mef.jpg" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>-->

        <!--team end-->


        <!--testimonial start-->

<!--        <section id="testimony" class="grey-bg pos-r o-hidden" data-bg-img="/acceuil/images/pattern/01.png">
            <div class="wave-shape">
                <img class="img-fluid" src="/acceuil/images/bg/03.png" alt="">
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-8 col-md-12 ml-auto mr-auto">
                        <div class="section-title">
                            <div class="title-effect">
                                <div class="bar bar-top"></div>
                                <div class="bar bar-right"></div>
                                <div class="bar bar-bottom"></div>
                                <div class="bar bar-left"></div>
                            </div>
                            <h6>Témoignages</h6>
                            <h2 class="title">Ce qui se dit de EFOREX</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div id="testimonial-1" class="testimonial-carousel carousel slide" data-ride="carousel"
                             data-interval="2500">
                             Wrapper for slides 
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-12">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testimonial style-1">
                                                <div class="testimonial-content">
                                                    <div class="testimonial-quote"><i class="la la-quote-left"></i>
                                                    </div>
                                                    <p>Depuis l'avènement de EFOREX, les tracasseries pour recevoir les données depuis l'OTR ont drastiquement baissé.
                                                    Plus de courriers à ne pas en finir. Nous n'avons plus a relancer nos collègues de l'OTR pour recevoir quelques données.
                                                      Tout se fait de façon autonome et souteraine maintenant. EFOREX est une superbe initiative.
                                                    </p>
                                                    <div class="testimonial-caption">
                                                        <h5>TCHAKALA Assane</h5>
                                                        <label>Chef Service Informatique INSEED</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="testimonial style-1">
                                                <div class="testimonial-content">
                                                    <div class="testimonial-quote"><i class="la la-quote-left"></i>
                                                    </div>
                                                    <p>Depuis l'avènement de EFOREX, les tracasseries pour recevoir les données depuis CFE ont drastiquement baissé.
                                                      Plus de courriers à ne pas en finir. Nous n'avons plus a relancer nos collègues du CFE pour recevoir quelques données.
                                                      Tout se fait de façon autonome et souteraine maintenant. EFOREX est une superbe initiative.</p>
                                                    <div class="testimonial-caption">
                                                        <h5>WAGBE Wagbe</h5>
                                                        <label>OTR</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="testimonial style-1">
                                                <div class="testimonial-content">
                                                    <div class="testimonial-quote"><i class="la la-quote-left"></i>
                                                    </div>
                                                    <p>Depuis l'avènement de EFOREX, les tracasseries pour recevoir les données depuis CFE ont drastiquement baissé.
                                                      Plus de courriers à ne pas en finir. Nous n'avons plus a relancer nos collègues du CFE pour recevoir quelques données.
                                                      Tout se fait de façon autonome et souteraine maintenant. EFOREX est une superbe initiative.</p>
                                                    <div class="testimonial-caption">
                                                        <h5>TOKOUDAGBE Romuald</h5>
                                                        <label>MEF</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         End Item 
                                    </div>
                                     End Carousel Inner 
                                </div>
                                <div class="col-lg-5 col-md-12 md-mt-5">
                                    <div class="controls">
                                        <div class="anti-01-holder">
                                            <div class="anti-01"></div>
                                        </div>
                                        <div class="anti-02-holder">
                                            <div class="anti-02"></div>
                                        </div>
                                        <div class="anti-03-holder">
                                            <div class="anti-03"></div>
                                        </div>
                                        <ul class="nav">
                                            <li data-target="#testimonial-1" data-slide-to="0" class="active">
                                                <a href="#">
                                                    <img class="img-fluid" src="/acceuil/images/mik.png" alt="">
                                                </a>
                                            </li>
                                            <li data-target="#testimonial-1" data-slide-to="1">
                                                <a href="#">
                                                    <img class="img-fluid" src="/acceuil/images/alexis-square.jpg" alt="">
                                                </a>
                                            </li>
                                            <li data-target="#testimonial-1" data-slide-to="2">
                                                <a href="#">
                                                    <img class="img-fluid" src="/acceuil/images/mik.png" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                         End Carousel 
                    </div>
                </div>
            </div>
        </section>-->

        <!--testimonial end-->

    </div>

    <!--body content end-->


    <!--footer start-->

    <footer class="footer footer-1 pos-r" data-bg-img="/acceuil/images/bg/05.png">
        <div class="primary-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="footer-logo">
                            <img id="footer-logo-img" src="/acceuil/images/logo_eaux_forrets_chasses.png" class="img-center" alt="">
                        </div>
                        <p class="mb-0">EFOREX est un Projet de l'Administration Forestière Béninoise avec le soutien de ENABEL</p>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mt-5">
                        <ul class="media-icon list-unstyled">
                            <li>
                                <p class="mb-0">Address: <b>DGEFC, Cotonou, Bénin</b>
                                </p>
                            </li>
                            <li>Email: <a href="mailto:infos_eforex@eforex.bj"><b>infos_eforex@eforex.bj</b></a>
                            </li>
                            <li>Appel 1: <a href="tel:+228 67 33 70 24"><b>+229 xx xx xx xx</b></a>
                            </li>
                            <li>Appel 2: <a href="tel:+228 22 33 70 24"><b>+229 xx xx xx xx</b></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="secondary-footer">
            <div class="container">
                <div class="copyright">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12"><span>EFOREX 2020 | Maquette conçue par <a href="http://akasigroup.com/" target="_blank">AKASI Group</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--footer end-->


</div>

<!-- page wrapper end -->


<!--color-customizer start-->


<!--color-customizer end-->


<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="fa fa-arrow-up fa-1x"></i></a></div>

<!--back-to-top end-->


<!-- inject js start -->

<!--== jquery -->
<script src="/acceuil/js/jquery.min.js"></script>

<!--== popper -->
<script src="/acceuil/js/popper.min.js"></script>

<!--== bootstrap -->
<script src="/acceuil/js/bootstrap.min.js"></script>

<!--== appear -->
<script src="/acceuil/js/jquery.appear.js"></script>

<!--== modernizr -->
<script src="/acceuil/js/modernizr.js"></script>

<!--== easing -->
<script src="/acceuil/js/jquery.easing.min.js"></script>

<!--== menu -->
<script src="/acceuil/js/menu/jquery.smartmenus.js"></script>

<!--== owl-carousel -->
<script src="/acceuil/js/owl-carousel/owl.carousel.min.js"></script>

<!--== magnific-popup -->
<script src="/acceuil/js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!--== counter -->
<script src="/acceuil/js/counter/counter.js"></script>

<!--== countdown -->
<script src="/acceuil/js/countdown/jquery.countdown.min.js"></script>

<!--== canvas -->
<script src="/acceuil/js/canvas.js"></script>

<!--== confetti -->
<script src="/acceuil/js/confetti.js"></script>

<!--== step animation -->
<script src="/acceuil/js/snap.svg.js"></script>
<script src="/acceuil/js/step.js"></script>

<!--== contact-form -->
<script src="/acceuil/js/contact-form/contact-form.js"></script>

<!--== wow -->
<script src="/acceuil/js/wow.min.js"></script>

<!--== color-customize -->
<script src="/acceuil/js/color-customize/color-customizer.js"></script>

<!--== theme-script -->
<script src="/acceuil/js/theme-script.js"></script>

<!-- inject js end -->

</body>
</html>
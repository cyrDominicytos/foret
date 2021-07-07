<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eforex - Landing Page</title>
    <meta name="description" content="Direction Générale des Eaux, Forêts et Chasse">

    <!--    Facebook Meta Tags-->
    <meta property="og:title" content="Direction Générale des Eaux, Forêts et Chasse">
    <meta property="og:description" content="Direction Générale des Eaux, Forêts et Chasse">
    <meta property="og:image" content="http://127.0.0.1/epp-master/uploads/logo-ultimate.png">
    <meta property="og:url" content="http://127.0.0.1/epp-master/">

    <!--    Twitter Meta Tags-->
    <meta name="twitter:title" content="Bureau de l&amp;#039;Evaluation des Politiques Publiques">
    <meta name="twitter:description" content="Bureau de l&amp;#039;Evaluation des Politiques Publiques">
    <meta name="twitter:image" content="http://127.0.0.1/epp-master/uploads/logo-ultimate.png">
    <meta name="twitter:card" content="http://127.0.0.1/epp-master/">

    <!--    Others Meta Tags -->
    <meta property="og:site_name" content="BEPP">
    <meta name="twitter:image:alt" content="BEPP">

    <!-- CSS Files -->
    
    <link href="landing/css/os-stylec577.css?v=1.0" rel="stylesheet">
    <link href="landing/css/stylefd49.css?v=1.02" rel="stylesheet">
    <link href="landing/css/m-style5fab.css?v=1.001" rel="stylesheet">

    <link href="landing/css/custom.css?v=1.04" rel="stylesheet">
    <style>

    

    /*@media screen and (max-width: 780px) {
        .navbar-toggle{
            background-color: red;
        }*/
   /* @media screen and (max-width: 768px) {
        .connexion{
            background-color: red;
            margin-top: -10px;
        }
    }*/

   
    .descripton{
        color: #337ab7;
    }
    
    

</style>
    <link href="landing/css/responsive.css?v=1.002" rel="stylesheet">
    <link href="landing/css/all.css" rel="stylesheet">
    <link href="landing/css/owl.carousel.min.css" rel="stylesheet">
    <link href="landing/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing/css/stylesheet.css?v=1.072" rel="stylesheet">
    <link rel="shortcut icon" href="http://127.0.0.1/epp-master/uploads/favicon-ultimate-150x150.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id=UA-153632512-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', "UA-153632512-1");
    </script>

</head>
<body style="" class="public-view">
<!--Wrapper Start-->
<!--<div class="wrapper">-->
<header class="wf100 header">
    <div class="logo-nav-row">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">
                            <img src="/acceuil/images/logo_eaux_forrets_chasses.png" style="width: 100px;height: 80px;">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active act" style="color: red"><a href="">Accueil</a></li>
                                <li><a href="{{route('apropos')}}">A propos</a></li>
                                 <!--<li><a href="#">Exportation de produit forestier</a></li>-->
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <!-- <li><a href="http://127.0.0.1/epp-master/contact">Connexion</a></li> -->
                               
                            </ul>
                           
                        </div>
                        
                    </nav>

                </div>
                <div class="col-md-2" style="padding-top: 2%">
                    <a  style="text-align: justify-all;float: right;" class="btn btn-primary connexion" href="{{ route('login') }}">
                             @auth
                             Espace de travail
                             @endauth                            
                             @guest
                             Mon espace
                             @endguest                            
                            </a>
                </div>

            </div>
        </div>
    </div>
</header>
	<div class="main-slider wf100" style="margin-top: 2%">
		<div id="home-slider" class="owl-carousel owl-theme">
			<!--Item Start-->
							<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>EFOREX</li>
							</ul>
							<a class="slider-text" href="#"><strong>Plateforme digitalisée des formalités et procédures de contrôle des produits forestiers destinés à l’exportation au Bénin</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/2.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>EFOREX</li>
							</ul>
							<a class="slider-text" href="#"><strong>Organiser le contrôle et l’exportation.</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/5.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>EFOREX</li>
							</ul>
							<a class="slider-text" href="#"><strong>Mieux sécuriser les données et mieux servir les acteurs.</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/7.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Temps Reel</li>
							</ul>
							<a class="slider-text" href="#"><strong>Faire et suivre sa demande d'exportation des produits forestiers depuis son espace client</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/13.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Accès aux données</li>
							</ul>
							<a class="slider-text" href="#"><strong>Gestion automatisée des flow de traitement</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/20.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Flexible</li>
							</ul>
							<a class="slider-text" href="#"><strong>Notification en temps réel des différents acteurs tout au long des différents processus</strong></a>
							<a class="slider-button" href="#">Découvrir</a></div>
					</div>
					<img src="landing/img/15.jpg" style="height: 550px" alt=""></div>
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Dernières actualités</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/articles/41"><strong>un article</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/articles/41">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide11-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Dernières actualités</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/articles/33"><strong>Rapport de l'étude diagnostique sur les capacités nationales en évaluation</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/articles/33">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide8-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Derniers événements</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/evenements/13"><strong>2éme Edition des Journées Béninoises de l'Evaluation</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/evenements/13">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide7-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Derniers événements</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/evenements/12"><strong>3ème Edition des Journées Béninoises de L'Evaluation</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/evenements/12">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide6-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Derniers événements</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/evenements/11"><strong>Colloque Régional sur l’Évaluation des Politiques Publiques</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/evenements/11">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide5-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
								<!--Item Start-->
				<!-- <div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li>Derniers événements</li>
							</ul>
							<a class="slider-text" href="http://127.0.0.1/epp-master/evenements/10"><strong>1ère Edition des Journées Béninoises de l'Evaluation</strong></a>
							<a class="slider-button" href="http://127.0.0.1/epp-master/evenements/10">Découvrir</a></div>
					</div>
					<img src="http://127.0.0.1/epp-master/uploads/slide3-1920x700.jpg" alt=""></div> -->
				<!--Item End-->
						</div>
	</div>
	

<!--Slider End-->
<!--Main Content Start-->
<div class="main-content">
	<section class="wf100 p80 h2-local-brands depart-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Parcourir & Découvrir</h2>
						<p class="black-color font-size-21-big-screen">PLATEFORME DIGITALISÉE DES FORMALITÉS ET PROCÉDURES DE CONTRÔLE DES PRODUITS FORESTIERS DESTINÉS À L’EXPORTATION AU BÉNIN
						</p>
					</div>
					<div class="row">
						<!--Local Box Start-->
						<!--						<div class="col-md-1"></div>-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<span>
									<img style="margin-top: -4%" data-src="landing/img/a.jpg" alt="">
								</span>

								<h6 style="color: #337ab7;">Grâce à la flexibilité de EFOREX, l'intégration de nouveaux services est plus rapide</h6>
								<!-- <a class="rm" href="http://127.0.0.1/epp-master/evaluations">Flexible</a> -->
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<span>
									<img data-src="landing/img/b.png" alt="">
								</span>

								<h6 style="color: #337ab7;">Partage des informations entre acteurs et notifications en temps réel</h6>
								<!-- <a class="rm" href="http://127.0.0.1/epp-master/events">Temps Reel</a> -->
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<span>
									<img style="margin-top: -5%" data-src="landing/img/j.png" alt="">
								</span>
								<h6 style="color: #337ab7;">Moteur de partage des données entièrement intelligent, autonome et sécuritaire sans  intervention humaine</h6>
								<!-- <a class="rm" href="http://127.0.0.1/epp-master/blog">Accès aux données</a> -->
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
													<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="deprt-icon-box">
									<span>
										<img data-src="landing/img/c.png" alt="">
									</span>
									<h6 style="color: #337ab7;">Mieux sécuriser les données et mieux servir les acteurs
									</h6>
									<!-- <a class="rm" href="http://127.0.0.1/epp-master/articles/categorie/partenariat5ddce7e015eff">Sécurité</a> -->
								</div>
							</div>
													<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<span data-scroll-nav="1" href="">
									<img style="margin-top: -6%" data-src="landing/img/f.png" alt="">
								</span>
								<h6 style="color: #337ab7;">Grâce à son tableau de bord moderne multi plateforme, visualisez vos statistiques personalisées en temps reel
								</h6>
								<!-- <a class="rm" style="cursor: none;" data-scroll-nav="1" href="#">Data Reporting</a> -->
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="#">
									<img data-src="landing/img/h.png" alt="">
								</a>
								<h6 ><a style="color: #337ab7;" href="#">A propos du EFOREX</a>
								</h6>
								<a class="rm" href="#">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->

					</div>
				</div>
			</div>

		</div>
	</section>
	<!--Local Boards & Services End-->
	<!--Event Festivals & News Articles Start-->
		<!-- 	<section class="wf100 city-news p75">
			<div class="container">
				<div class="title-style-3">
					<div class="row">
						<div class="col-md-10 col-sm-6">
							<h3>Nos dernières actualités & publications</h3>
						</div>
						<div class="col-md-2 col-sm-6 title-style-2">
							<a href="http://127.0.0.1/epp-master/articles">Voir tout</a>
						</div>
					</div>
					<p>Restez au courant de nos dernières actualités & publications en rapport avec la gestion des
						processus évaluatifs</p>
				</div>
				<div class="row">
										    <div class="col-md-3 col-sm-6 myNews">
        <div class="news-box">
            <div class="new-thumb lazy" data-src="http://127.0.0.1/epp-master/uploads/61WGVPscF-L__SL1024_-263x200.JPEG"><span
                        class="cat c1">Publication</span></div>
            <div class="new-txt">
                <div class="row">
                    <div class="col-xs-10">
                        <ul class="news-meta">
                            <li>14 Mai 2020</li>
                        </ul>
                    </div>
                    <div class="col-xs-2">
                        <div class="btn-group share-post">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                            <ul class="dropdown-menu">
                                <li><a onClick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;" href='https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43' class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a onClick="window.open('https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43', 'Whatsapp', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43' class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a onClick="window.open('https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43;text=Ajouter+un+article', 'Twitter', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43;text=Ajouter+un+article' class="tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43;text=Ajouter+un+article', 'LinkedIn', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F43;text=Ajouter+un+article' class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h6><a class="size-16"
                       href="http://127.0.0.1/epp-master/articles/43">Ajouter un article</a></h6>
                <p> Attacher image à la une de l'article * </p>
            </div>
        </div>
    </div>
        <div class="col-md-3 col-sm-6 myNews">
        <div class="news-box">
            <div class="new-thumb lazy" data-src="http://127.0.0.1/epp-master/uploads/DSC002909-263x200.JPG"><span
                        class="cat c1">Gestion des connaissances</span></div>
            <div class="new-txt">
                <div class="row">
                    <div class="col-xs-10">
                        <ul class="news-meta">
                            <li>14 Mai 2020</li>
                        </ul>
                    </div>
                    <div class="col-xs-2">
                        <div class="btn-group share-post">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                            <ul class="dropdown-menu">
                                <li><a onClick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;" href='https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42' class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a onClick="window.open('https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42', 'Whatsapp', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42' class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a onClick="window.open('https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42;text=Ajouter+un+article', 'Twitter', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42;text=Ajouter+un+article' class="tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42;text=Ajouter+un+article', 'LinkedIn', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F42;text=Ajouter+un+article' class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h6><a class="size-16"
                       href="http://127.0.0.1/epp-master/articles/42">Ajouter un article</a></h6>
                <p> Attacher image à la une de l'article </p>
            </div>
        </div>
    </div>
        <div class="col-md-3 col-sm-6 myNews">
        <div class="news-box">
            <div class="new-thumb lazy" data-src="http://127.0.0.1/epp-master/uploads/DSC002908-263x200.JPG"><span
                        class="cat c1">Publication</span></div>
            <div class="new-txt">
                <div class="row">
                    <div class="col-xs-10">
                        <ul class="news-meta">
                            <li>14 Mai 2020</li>
                        </ul>
                    </div>
                    <div class="col-xs-2">
                        <div class="btn-group share-post">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                            <ul class="dropdown-menu">
                                <li><a onClick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;" href='https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41' class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a onClick="window.open('https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41', 'Whatsapp', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41' class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a onClick="window.open('https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41;text=un+article', 'Twitter', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41;text=un+article' class="tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41;text=un+article', 'LinkedIn', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F41;text=un+article' class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h6><a class="size-16"
                       href="http://127.0.0.1/epp-master/articles/41">un article</a></h6>
                <p> Attacher image à la une de l'article </p>
            </div>
        </div>
    </div>
        <div class="col-md-3 col-sm-6 myNews">
        <div class="news-box">
            <div class="new-thumb lazy" data-src="http://127.0.0.1/epp-master/uploads/RapportdCfinitif-etudediagnostiquesurlCvaluationPrimetic-263x200.jpg"><span
                        class="cat c1">Publication</span></div>
            <div class="new-txt">
                <div class="row">
                    <div class="col-xs-10">
                        <ul class="news-meta">
                            <li>27 Avril 2020</li>
                        </ul>
                    </div>
                    <div class="col-xs-2">
                        <div class="btn-group share-post">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                            <ul class="dropdown-menu">
                                <li><a onClick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;" href='https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33' class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a onClick="window.open('https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33', 'Whatsapp', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://api.whatsapp.com/send?text=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33' class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a onClick="window.open('https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33;text=Rapport+de+l%27%C3%A9tude+diagnostique+sur+les+capacit%C3%A9s+nationales+en+%C3%A9valuation', 'Twitter', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33;text=Rapport+de+l%27%C3%A9tude+diagnostique+sur+les+capacit%C3%A9s+nationales+en+%C3%A9valuation' class="tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33;text=Rapport+de+l%27%C3%A9tude+diagnostique+sur+les+capacit%C3%A9s+nationales+en+%C3%A9valuation', 'LinkedIn', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;" href='http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F127.0.0.1%2Fepp-master%2Farticles%2F33;text=Rapport+de+l%27%C3%A9tude+diagnostique+sur+les+capacit%C3%A9s+nationales+en+%C3%A9valuation' class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h6><a class="size-16"
                       href="http://127.0.0.1/epp-master/articles/33">Rapport de l'étude diagnostique sur les capacités nationales en évaluation</a></h6>
                <p> La présente étude portant sur le diagnostic des capacités évaluatives au Bénin constitue la cinquième&#8230; </p>
            </div>
        </div>
    </div>
    

				</div>
			</div>


		</section> -->
			<section class="wf100 p80 news-event" style="margin-top: -3%">
			<div class="container">
				<div class="row event-header">
					<div class="title-style-2 wf100">
						<!-- <div class="col-md-4 col-sm-6 m-b-20"> -->
							<h2>Nos partenaires</h2>
						<!-- </div> -->
						<!-- <div class="col-md-6 col-sm-6 outerTitleDescription">
							<p class="innerTitleDescription">Retrouvez les derniers évènements en rapport avec la gestion des
								processus évaluatifs</p>
						</div> -->
						<!-- <div class="col-md-2 btn-container"><a class="mg-t-17" href="http://127.0.0.1/epp-master/evenements">Voir tout</a></div> -->
					</div>
				</div>
				<div class="row">
					    <div class="col-md-4 col-sm-4">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="landing/img/o.jpg" >
             <!--    <a href="http://127.0.0.1/epp-master/evenements/13">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">Le Conseil National des Chargeurs du Bénin</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 02 Juillet 2012</li>
                    </ul> -->
                    <p>Le Conseil National des Chargeurs du Bénin (CNCB) se charge de la certification du poids des produits destinés à l’exportation à travers l’établissement et la délivrance de la VGM (Verified Gross Mass   ou Masse brute vérifiée). Au cours du processus, deux pesées sont effectuées : la pesée à vide du conteneur et la pesée du conteneur déjà chargé.  En effet, à la suite de l’autorisation de l’exportation des produits, il est mis à la disposition de l’usager un conteneur pour l’empotage de ses produits...</p>
            </div>
           <!--  <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/13"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
        <div class="col-md-4 col-sm-4">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="landing/img/l.jpeg">
               <!--  <a href="http://127.0.0.1/epp-master/evenements/12">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">Bénin Control</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 30 Juin 2014</li>
                       
                    </ul> -->
                                    <p>Tout conteneur du bois qui transite par le port doit faire objet de scanning à Bénin Control. En effet, après l’obtention du visa sur l’AT, l’usager se présente à Bénin Control pour procéder au scanning de son conteneur. Bénin Control après avoir vérifié l’AT et la déclaration brute faite en ligne, procède au scanning du conteneur puis délivre à l’usager, le relevé de scanning suivi du rapport de scanning. En cas de suspicion confirmée, le conteneur est mis à la disposition de la BFSP pour les suites contentieuses éventuelles.</p>
            </div>
           <!--  <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/12"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
        <div class="col-md-4 col-sm-4">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="landing/img/k.jpg">
              <!--   <a href="http://127.0.0.1/epp-master/evenements/11">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">Webb Fontaine</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 07 Juillet 2015</li>
                       
                    </ul> -->
                <p>Au Bénin, Webb Fontaine intervient en tant que prestataire de Bénin control qui lui confie un certain nombre de mission dans le cadre du contrat de Bénin Control avec le gouvernement. 
De façon spécifique dans le cadre de notre projet, Webb Fontaine entretient un certain nombre d’outils dont le Guichet Unique pour le Commerce (GUCE), le système douanier dématérialisé qui interviennent dans le processus de contrôle des formalités des produits forestiers destinés à l’exportation.
</p>
            </div>
            <!-- <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/11"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
    				</div>
			</div>
		</section>
			<style>
		.fact-newsletter {
			background: url(http://127.0.0.1/epp-master/assets/public/images/etoile-rouge1.jpg) no-repeat;
			background-size: cover;
		}
	</style>
	<!-- <section class="wf100 p80 fact-newsletter" data-scroll-index="1">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="title-style-1 white">
						<h2>Nos chiffres</h2>
					</div>
					<div class="row">
						<ul class="counter">
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img
											data-src="http://127.0.0.1/epp-master/assets/public/images/report-symbol.png" alt=""></i>
									<strong>50</strong> <span>Evaluations publiées</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="http://127.0.0.1/epp-master/assets/public/images/calendar.png"
															  alt=""></i> <strong>6</strong> <span>Evènements organisés</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="http://127.0.0.1/epp-master/assets/public/images/brochure.png"
															  alt=""></i> <strong>20</strong> <span>Articles publiés</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="http://127.0.0.1/epp-master/assets/public/images/visibility.png"
															  alt=""></i>
									<strong>981</strong>
									<span>Total vues du site</span></div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="http://127.0.0.1/epp-master/assets/public/images/eval-views.png"
															  alt=""></i>
									<strong>38</strong>
									<span>Total vues évaluations</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="http://127.0.0.1/epp-master/assets/public/images/download-icon.png"
															  alt=""></i>
									<strong>5</strong>
									<span>Total téléchargements</span></div>
							</li>


						</ul>
					</div>
				</div> -->
				<div class="col-md-4">
					<!--Stay Connected Start-->
					<!-- <div class="stay-connected">
						<h5>Restez connectés</h5>
						<p>Restez au courant de nos dernières évaluations, actualités & evènements en souscrivant à
							notre Newsletter</p>
						<form action="http://127.0.0.1/epp-master/" id="newsletter_form" method="post" accept-charset="utf-8">
<input type="hidden" name="beppaagg_csrf_token_nonce" value="1ec5d2667ccfcdb793eee8cfdf7409b8" />                                                                                             
						<div class="alert alert-dismissable" style="display: none">

						</div>
						<ul>
							<li>
								<input type="text" name="fullname" value="" class="form-control" placeholder="Saisissez votre nom" required=""  />
							</li>
							<li>
								<input type="email" name="email" value="" class="form-control" placeholder="Saisissez votre email" required=""  />
							</li>
							<li>
								<button type="submit">Soumettre</button>
							</li>
						</ul>
						</form>					</div> -->
					<!--Stay Connected End-->
				</div>
			</div>
		</div>
	</section>
</div>
<div class="footer" style="display: block">
<!--    <span class="center"></span>-->
	<div >
					<!-- <img class="m-t-20 m-r-20" src="http://127.0.0.1/epp-master/uploads/logo-ultimate1-345x119.png" alt=""> -->
            <!-- filter-white -->
						<!-- <img class="m-t-20" src="http://127.0.0.1/epp-master/uploads/UNICEF1-150x150.png" alt=""> -->
             
				</div>
    <ul class="footer-socials">
             <!-- filter-white       <li class="btn-sm btn-sm-big"><a target='_blank' href="https://web.facebook.com/bepp.benin.9" class="fab fa-facebook" title="Facebook"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://twitter.com/bepp.benin.9" class="fab fa-twitter" title="Twitter"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://www.youtube.com/feed/my_videos" class="fab fa-youtube" title="Youtube"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://www.flickr.com/photos/187612203@N06/" class="fab fa-flickr" title="Flickr"></a></li>
                </ul> --> 
            <ul class="footer-nav">
                                <li>
                        <!-- <span>LA PRÉSIDENCE DU BÉNIN</span> -->
                                                   <!--  <ul class="">
                                                                        <li>
                                            <a target="_blank" href="https://presidence.bj/home/la-presidence/le-secretaire-general-de-la-presidence/biographie/">Le Secrétaire Général de la Présidence</a>
                                        </li>
                                                                    </ul> -->
                            
                    </li>
                            </ul>
        
<!--    <span class="hr center"></span>-->
    <!--<ul>
        <li><a href="<?/*= site_url('contact') */?>">Contact</a></li>
        <li><a href="sitemap.html">Plan du site</a></li>
    </ul>-->
    <div class="center">&copy; 2021 Eforex. Propulsé par <a target="_blank" href="http://akasigroup.com">AKASI Consulting Group</a></div>
    <div class="flag-container"><ul class="flag"><li></li><li></li><li></li></ul></div>
</div>
<!--Footer End-->
<div class="overlay"></div>
<!--</div>-->
<!--Wrapper End-->
<!-- JS -->
<script src="landing/js/jquery.min.js"></script>
<!--<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script src="landing/js/bootstrap.min.js"></script>
    <script>
        var clientData = {"publicAjaxifyUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/doCronJobs","csrf_token_name":"beppaagg_csrf_token_nonce","csrf_hash":"1ec5d2667ccfcdb793eee8cfdf7409b8","newsletterUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/updateNewsletter","contactUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/contactMailer","publicStatUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/setSiteViewCounter","downloadStatUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/setDownloadCounter","publicEvaluationStatUrl":"http:\/\/127.0.0.1\/epp-master\/ajaxify\/setSingleEvaluationViewCounter","bodyClass":["public-view"]}    </script>
    <script src="landing/js/script34b3.js?v=1.001"></script>
<script src="landing/js/owl.carousel.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
<script src="landing/js/scrollIt.min.js"></script>
<script src="landing/js/scrollUp.js"></script>
<script src="landing/js/jquery.ticker.js"></script>
<script src="landing/js/jquery.prettyPhoto.js"></script>
<script src="landing/js/custom.js?v=1.51"></script>
<script src="landing/js/ajaxify.js?v=1.004"></script>
</body>

</html>

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
                                <li ><a href="{{route('acceuil')}}">Accueil</a></li>
                                <li class="active act" style="color: red"><a href="">A propos</a></li>
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
								<li style="cursor: none;">A PROPOS</li>
							</ul>
							<span class="slider-text" style="font-size: 38px;color: white;text-align: center;font-weight: bold;">Plateforme digitalisée des formalités et procédures de contrôle des produits forestiers destinés à l’exportation au Bénin</span>
							<span class="slider-button" ></span></div>
					</div>
					<img src="landing/img/16.jpg" style="height: 350px" alt=""></div>
				
				
								<!--Item Start-->
				
				
						</div>
	</div>
	

	<section class="wf100 p80 news-event" style="margin-top: -3%">
			<div class="container">
				<div class="row event-header">
					<div class="title-style-2 wf100">
						<!-- <div class="col-md-4 col-sm-6 m-b-20"> -->
							<h2>A PROPOS</h2>
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
            <div class="thumb lazy" data-src="landing/img/contexte.jpg" >
             <!--    <a href="http://127.0.0.1/epp-master/evenements/13">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">Contexte</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 02 Juillet 2012</li>
                    </ul> -->
                    <p>L’administration forestière   dans   sa   mission   d’assurer   le   contrôle   des   opérations d’exportation des produits forestiers procède à la vérification de la conformité, de l’authenticité et de la régularité des produits et des documents. Ce dispositif de contrôle qui nécessite la manipulation de liasse documentaire reste empirique et est peu adapté au reste du dispositif de la chaîne de contrôle sur la plateforme portuaire notamment à la douane et à Benin Control. En effet depuis novembre 2014, la plateforme portuaire a connu des réformes dont la dématérialisation des opérations avec le SEGUB (guichet unique). Mieux les demandes de scanning et les procédures de transfert des informations de déclarations en douane se font digitalement et sont davantage perfectionnées au niveau du dispositif de contrôle de la douane et du scanning des conteneurs. 

Ce dispositif mérite d’être amélioré pour s’adapter aux reformes et surtout rester conforme et complémentaire à celle de la douane et de Bénin Control. Par ailleurs, cette amélioration contribuera au renforcement de l’efficacité du contrôle global au niveau de la plateforme portuaire et permettra au système portuaire de gagner en performance. Ceci est un élément de stratégie que le Programme d’Action du gouvernement inclut parmi ses défis.

C’est à cet effet que l’Administration Forestière en tandem avec Enabel a lancé le recrutement d’un prestataire qualifié pour apporter son expertise dans l’appui à la digitalisation des formalités et procédures de contrôle des produits forestiers destinés à l’exportation.

AKASI GROUP a été retenu pour conduire cette mission. Le présent document est le rapport d’état des lieux qui fait suite à la collecte des données sur la procédure existante réalisé par les agents de AKASI GROUP.
</p>
            </div>
           <!--  <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/13"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
        <div class="col-md-4 col-sm-4">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="landing/img/mission.jpg">
               <!--  <a href="http://127.0.0.1/epp-master/evenements/12">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">Mission</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 30 Juin 2014</li>
                       
                    </ul> -->
                                    <p>Cette mission d ’expertise est de fournir une assistance technique à la Direction Générale des Eaux, Forêts et Chasse pour la digitalisation des formalités et procédures d’exportation des produits forestiers au Bénin.</p><br>
                                    
            </div>
           <!--  <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/12"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
        <div class="col-md-4 col-sm-4">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="landing/img/objectif.png">
              <!--   <a href="http://127.0.0.1/epp-master/evenements/11">
                    <i class="fas fa-link"></i>
                </a> -->
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="#">objectif</a></h5>
                                   <!--  <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le 07 Juillet 2015</li>
                       
                    </ul> -->
                <p>De façon spécifique, il s’agit de:</p><br>
<p>-	Faire le diagnostic approfondi des formalités et procédures d’exportation des produits forestiers au Bénin au niveau des différents maillons ; </p>
<p>-	Faire le diagnostic approfondi des formalités et procédures de contrôle des produits forestiers destinés à l’exportation au niveau de la BFSP ; </p>
<p>-	Identifier les éléments des deux précédents niveaux de contrôle du système à dématérialiser en lien avec le système en place à la douane et à Bénin Control</p>
<p>-	Proposer et mettre en place un modèle technique digital adapté au système et l’arrimer aux dispositifs digitaux de la douane et de Bénin Control afin d’en parfaire la complémentarité, ainsi qu’avec le futur système du Guichet Unique de Commerce Extérieur qui devrait remplacer le système du guichet unique portuaire (SEGUB) d’ici la fin de l’année 2021 ;</p>
<p>-	Proposer la logistique nécessaire adaptée au modèle technique ainsi défini ;</p>
<p>-	Elaborer un plan de formation et de communication à l’endroit du personnel et des usagers de la BFSP ;</p>
<p>-	Apporter un appui-conseil à la BFSP pour les six premiers mois de mise en œuvre de la digitalisation intégrant la formation du personnel et son accompagnement en situation de travail.
.</p>
            </div>
            <!-- <div class="event-post-loc">
                 <i class="fas fa-map-marker-alt"></i> Cotonou                <a href="http://127.0.0.1/epp-master/evenements/11"><i class="fas fa-arrow-right"></i></a></div> -->
        </div>
        <!--News Post End-->
    </div>
    				</div>
			</div>
		</section>

<!--Slider End-->
<!--Main Content Start-->

			
			<style>
		.fact-newsletter {
			background: url(http://127.0.0.1/epp-master/assets/public/images/etoile-rouge1.jpg) no-repeat;
			background-size: cover;
		}
	</style>
	
				<div class="col-md-4">
					
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
             <!-- filter-white -->
				</div>
    <ul class="footer-socials">
                   <!-- <li class="btn-sm btn-sm-big"><a target='_blank' href="https://web.facebook.com/bepp.benin.9" class="fab fa-facebook" title="Facebook"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://twitter.com/bepp.benin.9" class="fab fa-twitter" title="Twitter"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://www.youtube.com/feed/my_videos" class="fab fa-youtube" title="Youtube"></a></li>
                        <li class="btn-sm btn-sm-big"><a target='_blank' href="https://www.flickr.com/photos/187612203@N06/" class="fab fa-flickr" title="Flickr"></a></li>
                </ul> --> 
          
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

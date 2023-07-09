<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Chambly Pétanque</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/public/vendor.css">
    <link rel="stylesheet" href="css/public/styles.css">

    <!-- script
    ================================================== -->
    <script src="../../css/public/js/modernizr.js"></script>
    <script defer src="../../css/public/js/fontawesome/all.min.js"></script>
<!--    <script src="../../js/modernizr.js"></script>-->
<!--    <script defer src="../../js/fontawesome/all.min.js"></script>-->

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="../template/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../template/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../template/favicon-16x16.png">
    <link rel="manifest" href="../template/site.webmanifest">
    <link rel="icon" type="image/png" href="Views/public/images/logo-club.jpg">

</head>

<body id="top">


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- header
    ================================================== -->
<header class="s-header">

    <!--        <div class="s-header__logo">-->
    <a href="indexpublic.php?acc">
        <img src="Views/public/images/logo-club.jpg" alt="Homepage" class="taille-logo">
    </a>
    <!--        </div>-->

    <div class="row s-header__navigation">

        <nav class="s-header__nav-wrap">

            <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <form method="post" action="indexpublic.php">
<!--                        <li class="current"><a href="indexpublic.php?acc_accueilView" title="Accueil">Accueil</a></li>-->
                        <li class="has-children">
                            <a href="#0" title="">Le Club</a>
                            <ul class="sub-menu">
                                <li><a href="indexpublic.php?page=lic_licencies">Nos licenciés</a></li>
                                <li><a href="indexpublic.php?page=adh_inscription">Inscription</a></li>
                                <li><a href="indexpublic.php?page=lic_compositionbureau">Composition du bureau</a></li>
                            </ul>
                        </li>
                        <li class="current"><span><a href="indexpublic.php?page=grp_affiche" title="Affiche du Grand Prix">Grand Prix</a></span></li>
                        <li class="current"><a href="indexpublic.php?page=evt_getAllEvents" title="Nos évènements">Evènements</a></li>
                        <li class="current"><a href="indexpublic.php?page=res_getAllResultats" title="Les résultats du club">Résultats</a></li>
                        <li class="has-children">
                            <a>Coupe de france</a>
                            <ul class="sub-menu">
                                <li><a href="indexpublic.php?page=res_getAllResultatsCPFP">Pétanque</a></li>
                                <li><a href="indexpublic.php?page=res_getAllResultatsCPFJP">Jeu Provencal</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Championnat des clubs</a>
                            <ul class="sub-menu">
                                <li><a href="indexpublic.php?page=res_getAllResultatsChampClubP">Pétanque</a></li>
                                <li><a href="indexpublic.php?page=res_getAllResultatsChampClubJP">Jeu Provencal</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Ecole de Pétanque</a>
                            <ul class="sub-menu">
                                <li><a href="indexpublic.php?page=eco_afficher">Les Cours</a></li>
                                <li><a href="indexpublic.php?page=jco_afficher">Nos Joueurs</a></li>
                            </ul>
                        </li>
                        <li><a href="http://ffpjp-comite-oise-petanque.e-monsite.com/pages/calendrier-veterans/" title="Calendrier Comité Oise Pétanque">Calendrier</a></li>
                        <li><a href="indexpublic.php?page=par_afficher" title="Sponsors">Nos Sponsors</a></li>
                        <li><a href="indexpublic.php?page=jou_trouverjoueur" title="Trouver une équipe pour un concours, championnat, ...">Trouver une équipe</a></li>
                    </form>
                </ul> <!-- end s-header__nav -->

            <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end s-header__nav-wrap -->

    </div> <!-- end s-header__navigation -->

    <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>


</header>
</body>
</html>

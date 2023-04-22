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
    <script defer src="css/public/js/fontawesome/all.min.js"></script>

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
    <a href="http://localhost:7080/cp/indexpublic.php?acc">
        <img src="Views/public/images/logo-club.jpg" alt="Homepage" class="taille-logo">
    </a>
    <!--        </div>-->

    <div class="row s-header__navigation">

        <nav class="s-header__nav-wrap">

            <h3 class="s-header__nav-heading h6">Navigate to</h3>
            <form method="post" action="indexpublic.php">
                <ul class="s-header__nav">
                    <li class="current"><a href="indexpublic.html" title="">Home</a></li>
                    <li><button type="submit" name="page" value="evt_getAllEvents">Nos évènements</button></li>
                    <li class="has-children">
                        <a href="#0" title="">Nos résultats</a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView">Jeunes</a></li>
                            <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView">Vétérants</a></li>
                            <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView">Séniors</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Coupe de france</a>
                        <ul class="sub-menu">
                            <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView">Pétanque</a></li>
                            <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView">Jeu Provencal</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Championnat des clubs</a>
                        <ul class="sub-menu">
                            <li><a href="../template/single-video.html">Pétanque</a></li>
                            <li><a href="../template/single-audio.html">Jeu Provencal</a></li>
                        </ul>
                    </li>

                    <li><a href="http://ffpjp-comite-oise-petanque.e-monsite.com/pages/calendrier-veterans/" title="">Calendrier</a></li>
                    <li><a href="http://localhost:7080/cp/indexpublic.php?acc_accueilView" title="">Trouver un joueur</a></li>
                </ul> <!-- end s-header__nav -->
            </form>
            <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end s-header__nav-wrap -->

    </div> <!-- end s-header__navigation -->

    <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

    <div class="s-header__search">

        <div class="s-header__search-inner">
            <div class="row wide">

                <form role="search" method="get" class="s-header__search-form" action="#">
                    <label>
                        <span class="h-screen-reader-text">Search for:</span>
                        <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="s-header__search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

            </div> <!-- end row -->
        </div> <!-- s-header__search-inner -->

    </div> <!-- end s-header__search wrap -->

    <a class="s-header__search-trigger" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
    </a>

</header>
<section class="s-content s-content--no-top-padding">


    <!-- masonry
    ================================================== -->
    <div class="s-bricks">

        <div class="masonry">
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>

                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <?php foreach ($this->data['lesEvents'] as $event){ ?>
                    <article class="brick entry" data-aos="fade-up">
                        <div class="entry__thumb">
                            <a href="http://localhost:7080/cp/index.php?acc_accueilView" class="thumb-link">
                                                                    <img src="<?php $event->getPathImagePrincipale() ?>">
<!--                                <img src="./images/thumbs/masonry/macbook-600.jpg" srcset="./images/thumbs/masonry/macbook-600.jpg 1x, ./images/thumbs/masonry/macbook-1200.jpg 2x" alt="">-->
                            </a>
                        </div> <!-- end entry__thumb -->
                    </article>
                <?php } ?>
            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->

    </div> <!-- end s-bricks -->

</section>
</body>
</html>


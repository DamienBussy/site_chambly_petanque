<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<style>
    .boxsimple {
        width: 50%;
        margin: 0 auto;
        text-align: center;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .boxsimple img {
        max-width: 100%;
    }

    .boxsimple p {
        font-size: 18px;
        margin-top: 20px;
    }

    .box {
        background-color: #f5f5f5;
        margin: auto;
        border: 1px solid #ccc;
        text-align: center;
        padding: 20px;
        margin-top: 100px;
        max-width: 90%;
        position: relative;
        height: 600px;
    }

    .box img {
        display: block;
        margin: -180px auto;
        max-width: 100%;
        max-height: 100%;
        width: 500px;
        height: 290px;
    }

    .boximgunevt {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        max-height: 100%;
        width: 500px;
        height: 290px;
    }
    .box h2, .box p {
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        color: #333;
        margin: 0;
    }

    /*.box p {*/
    /*    text-align: center;*/
    /*    font-size: 18px;*/
    /*}*/
    .box form {
        margin-top: 250px;
    }

    .box h2 {
        font-size: 24px;
        margin-top: 500px;
    }

    .events {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
    }

    .event {
        position: absolute;
        top: 0%;
        left: 0;
        opacity: 0;
        width: 100%;
        transition: opacity 0.5s ease-in-out;
    }

    .event.active {
        opacity: 1;
    }

    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        cursor: pointer;
    }

    .arrow.left {
        left: 10px;
    }

    .arrow.right {
        right: 10px;
    }

    /* New style for the button */
    .box input {
        margin-top: -5000px;
    }

    /* Style the button on hover */
    .box input:hover {
        background-color: #05707e;
    }
    h1 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        color: #333;
        margin-top: 20px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px #aaa;
    }
    .boxsimple h2 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: #333;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .box h2 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: #333;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
<br><br><br>
<h1>Championnat des clubs de Jeu Provencal</h1>
<?php
$arrEvents = $this->data['lesEvents'];
if(count($arrEvents) != 0) {
    if (count($arrEvents) == 1){
        foreach ($arrEvents as $evt){
            ?>
            <div class="boxsimple">
                <h2>À venir : <?php echo $evt->getEventTitle() ?></h2>
                <img src="<?= $evt->getPathImagePrincipale() ?>" alt="Image">
                <form action="indexpublic.php" method="post">
                    <input type="hidden" name="page" value="evt_eventDetails" />
                    <input type="hidden" name="id" value="<?= $evt->getEventId() ?>" />
                    <input type="submit" value="Voir plus">
                </form>
            </div>
        <?php }
    }
    else{
    ?>
        <div class="box">
            <h2>À venir :</h2>
            <div class="events">
                <?php foreach ($arrEvents as $index => $evt) {
                    $activeClass = ($index === 0) ? 'active' : ''; ?>
                    <div class="event <?= $activeClass ?>">
                        <img src="<?= $evt->getPathImagePrincipale() ?>" alt="Image">
                        <form action="indexpublic.php" method="post">
                            <input type="hidden" name="page" value="evt_eventDetails" />
                            <input type="hidden" name="id" value="<?= $evt->getEventId() ?>" />
                            <input type="submit" value="Voir plus">
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="arrow left">&#9668;</div>
            <div class="arrow right">&#9658;</div>
            <style>
                .box h2 {
                    font-size: 24px;
                    margin-top: 20px;
                }
            </style>
        </div>

        <script>
            // Ajout d'un gestionnaire d'événements pour les flèches gauche et droite
            var events = document.querySelectorAll('.box .event');
            var arrowLeft = document.querySelector('.box .arrow.left');
            var arrowRight = document.querySelector('.box .arrow.right');
            var currentIndex = 0;

            arrowLeft.addEventListener('click', function() {
                events[currentIndex].classList.remove('active');
                currentIndex = (currentIndex === 0) ? events.length - 1 : currentIndex - 1;
                events[currentIndex].classList.add('active');
            });
            arrowRight.addEventListener('click', function() {
                events[currentIndex].classList.remove('active');
                currentIndex = (currentIndex === events.length - 1) ? 0 : currentIndex + 1;
                events[currentIndex].classList.add('active');
            });
        </script>
    <?php } ?>
<?php } ?>


<?php //var_dump($this->data['lesResultats']); ?>
<?php
foreach ($this->data['lesResultats'] as $annee) { ?>
    <h2>Saison <?php echo $annee[0]->getResultatAnnee() ?></h2>
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

                    <!--                --><?php //var_dump($this->data['lesResultats']);
                    foreach ($annee as $resultat){ ?>
                        <!--                    --><?php //var_dump($resultat->getPathImagePrincipale()); ?>
                        <?php $path = $resultat->getPathImagePrincipale() ?>
                        <!--                    --><?php //var_dump($path); ?>
                        <article class="brick entry" data-aos="fade-up">
                            <div class="entry__thumb">
                                <a href="http://localhost:7080/cp/indexpublic.php?page=res_resultatDetails&id=<?= $resultat->getResultatId() ?>" class="thumb-link">
                                    <img src="<?= $path ?>" alt="">
                                </a>
                            </div> <!-- end entry__thumb -->
                            <div class="entry__text">
                                <div class="entry__header">
                                    <h1 class="entry__title"><?= $resultat->getResultatTitle() ?></h1>
                                </div>
                            </div>
                        </article>

                    <?php } ?>
                </div> <!-- end brick-wrapper -->


            </div> <!-- end masonry -->

        </div> <!-- end s-bricks -->

    </section>

<?php }
?>

<?php require_once "Views/public/footer.php" ?>


<!-- Java Script
================================================== -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</html>

</html>
<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<style>
    h1 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        color: #333;
        margin-top: 120px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px #aaa;
    }
</style>
<h1>Nos Partenaires</h1>
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

                <?php foreach ($this->data['lesJoueurs'] as $joueur){ ?>
                    <?php $path = $joueur->getJoueurecolePhoto(); ?>
                    <article class="brick entry" data-aos="fade-up">
                        <div class="entry__thumb">
<!--                            <a href="#" class="thumb-link">-->
                                <img src="<?= $path ?>" alt="">
<!--                            </a>-->
                        </div> <!-- end entry__thumb -->
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><?= $joueur->getJoueurecoleNom() . "  " . $joueur->getJoueurecolePrenom() ?></h1>
                            </div>
                        </div>
                        <!-- HTML pour la fenêtre modale -->
                    </article>
                <?php } ?>
            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->

    </div> <!-- end s-bricks -->

</section>

<?php require_once "Views/public/footer.php"; ?>



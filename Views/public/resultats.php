<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<br>
<br><br>
<style>
    form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    /* mettre les selects sur une seule ligne */
    form select {
        width: auto;
        margin: 0 10px;
    }

    /* centrer le bouton */
    form button {
        margin: 0 10px;
    }
     .year-wrapper {
         text-align: center;
         background-color: #e8b0b0; /* Couleur de fond pour les années */
         /* Autres styles si nécessaire */
     }

    .month-wrapper {
        text-align: center;
        background-color: #94dada; /* Couleur de fond pour les mois */
        /* Autres styles si nécessaire */
    }
</style>
<div class="search-container">
    <form action="indexpublic.php?page=res_recherche" method="post">
        <select name="categ">
            <option value="">Catégorie</option>
            <option value="5">Championnat de l'Oise Pétanque</option>
            <option value="10">Championnat de l'Oise Jeu provencal</option>
            <option value="12">Championnat de l'Oise Tir de précision</option>
            <option value="13">Nationaux</option>
            <option value="14">Concours</option>
            <option value="15">Championnats de Ligue</option>
            <option value="16">Championnats de France</option>
        </select>
<!--        --><?php //var_dump($this->data['lesAnnees']) ?>
        <select name="annee">
            <option value="">Année</option>
            <?php foreach ($this->data['lesAnnees'] as $annee) { ?>
                <option value="<?php echo $annee ?>"><?php echo $annee ?></option>
            <?php } ?>
        </select>
        <select name="souscateg">
            <option value="">Sous-catégorie</option>
            <option value="1">Individuel</option>
            <option value="2">Doublette</option>
            <option value="3">Triplette</option>
        </select>
        <button type="submit">Rechercher<i class="fa fa-search"></i></button>
    </form>
</div>
<?php
foreach ($this->data['lesResultats'] as $annee => $resultats) { ?>
<!--    <h2 class="error-message">Saison --><?php //echo $annee ?><!--</h2>-->
        <div class="year-wrapper">
            <h2><?= $annee ?></h2>
        </div>

 <?php foreach ($resultats as $categ){ ?>
            <div class="month-wrapper">
                <?php if($categ[0]->getResultatCategorie() == 5){ ?>
                    <h2>Championnat de l'Oise Tête à tête</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 6){ ?>
                    <h2>Championnat de l'Oise Doublette</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 7){ ?>
                    <h2>Championnat de l'Oise Triplette</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 8){ ?>
                    <h2>Championnat de l'Oise Doublette mixte</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 9){ ?>
                    <h2>Championnat de l'Oise Triplette mixte</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 10){ ?>
                    <h2>Championnat de l'Oise Doublette Jeu provencal</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 11){?>
                    <h2>Championnat de l'Oise Triplette Jeu provencal</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 12){?>
                    <h2>Championnat de l'Oise Tir de précision</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 13){?>
                    <h2>National</h2>
                <?php }
                elseif ($categ[0]->getResultatCategorie() == 14){?>
                    <h2>Concours</h2>
                <?php }
                ?>
            </div>

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
        <?php foreach ($categ as $resultat) { ?>

            <!--                    --><?php //var_dump($resultat->getPathImagePrincipale()); ?>
            <?php $path = $resultat->getPathImagePrincipale() ?>
            <!--                    --><?php //var_dump($path); ?>
            <article class="brick entry" data-aos="fade-up">
                <div class="entry__thumb">
                    <a href="indexpublic.php?page=res_resultatDetails&id=<?= $resultat->getResultatId() ?>" class="thumb-link">
                        <img src="<?= $path ?>" alt="">
                    </a>
                </div> <!-- end entry__thumb -->
                <div class="entry__text">
                    <div class="entry__header">
                        <h1 class="entry__title"><?= $resultat->getResultatTitle() ?></h1>
                    </div>
                </div>
            </article>
        <?php }?>
        </div> <!-- end brick-wrapper -->


        </div> <!-- end masonry -->

        </div> <!-- end s-bricks -->

        </section>
    <?php } ?>
<?php }
?>

<?php require_once "Views/public/footer.php" ?>
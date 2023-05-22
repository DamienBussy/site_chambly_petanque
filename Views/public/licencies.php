<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>

<style>
    .search-form {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 100px;
    }

    label {
        margin-right: 10px;
    }

    input[type="search"] {
        padding: 5px;
        border: none;
        border-radius: 3px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        font-size: 16px;
        width: 230px;
        margin-right: 10px;
    }

    button[type="submit"] {
        background-color: #604b4b;
        border: none;
        color: #fff;
        border-radius: 5px;
        padding: 3px 12px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: -16px; /* Ajout de la marge pour remonter le bouton */
    }

    button[type="submit"]:hover {
        background-color: #2980b9;
    }

    .search-form select,
    .search-form input[type="search"] {
        margin-right: 10px;
    }
</style>

<form class="search-form" action="indexpublic.php" method="post">
    <input type="hidden" name="page" value="lic_recherche" />

    <select name="categ" id="categ">
        <option value="">-- Sélectionner une catégorie --</option>
        <option value="Benjamin">Benjamin</option>
        <option value="Minime">Minime</option>
        <option value="Cadet">Cadet</option>
        <option value="Junior">Junior</option>
        <option value="Sénior">Sénior</option>
        <option value="Vétéran">Vétéran</option>
    </select>

    <select name="classe" id="classe">
        <option value="">-- Sélectionner un classement --</option>
        <option value="Non classé">Non classé</option>
        <option value="Promotion">Promotion</option>
        <option value="Honneur">Honneur</option>
        <option value="Elite">Elite</option>
    </select>

<!--    <label for="search-input">Recherche :</label>-->
    <input type="search" id="search-input" name="q" placeholder="Entrez votre recherche ici...">
    <button type="submit">Rechercher</button>
</form>
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

                <?php foreach ($this->data['lesLicencies'] as $licencie){ ?>
<!--                    --><?php //var_dump($licencie->getLicencieNom()); ?>
                    <?php $path = $licencie->getLicenciePhoto(); ?>
                    <article class="brick entry" data-aos="fade-up">
                        <div class="entry__thumb">
                            <a href="#licencie" class="thumb-link">
                                <img src="<?= $path ?>" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><?= $licencie->getLicencieNom() . "  " . $licencie->getLicenciePrenom() ?></h1>
<!--                                <h2 class="entry__title">--><?php //= "Numéro de licence : ". $licencie->getLicencieId() ?><!--</h2>-->
<!--                                <h2 class="entry__title">--><?php //= "Catégorie : ". $licencie->getLicencieCategorie() ?><!--</h2>-->
<!--                                <h2 class="entry__title">--><?php //= "Classé : ". $licencie->getLicencieClasse() ?><!--</h2>-->
                            </div>
                        </div>
                        <!-- HTML pour la fenêtre modale -->
                    </article>
                <?php } ?>
            </div> <!-- end brick-wrapper -->
<!--            <div id="licencie" class="modal">-->
<!--                <div class="modal_content">-->
<!--                    <h1>Hello</h1>-->
<!---->
<!--                    <p>Bienvenue sur la fenêtre modale !</p>-->
<!---->
<!--                    <a href="#" class="modal_close">&times;</a>-->
<!--                </div>-->
<!--            </div>-->

        </div> <!-- end masonry -->

    </div> <!-- end s-bricks -->

</section>

<?php require_once "Views/public/footer.php"; ?>



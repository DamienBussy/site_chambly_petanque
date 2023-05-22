<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleUsers.css">-->
<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="res_saisieAjout"><span>Ajouter un résultat</span></button>
    </form>
</div>
<br>
<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Image Principale</th>
        <th>Catégorie</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php foreach ($this->data['lesAnnees'] as $annee){ ?>

        <tbody>
        <tr class="tr-annee">
            <td class="td-users" colspan="7"><strong><?=$annee?></strong></td>
        </tr>
        <?php foreach ($this->data['lesResultats'] as $resultat){
            if($resultat->getResultatAnnee() == $annee){
            ?>

            <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
                <td class="td-users"><?= $resultat->getResultatId() ?></td>
                <td class="td-users"><?= $resultat->getResultatTitle() ?></td>
                <td class="td-users"><?= $resultat->getResultatDescription() ?></td>
                <td class="td-users"><?= $resultat->getResultatDate() ?></td>
                <td class="table-image"> <img src="<?= $resultat->getPathImagePrincipale() ?>" alt="Logo"></td>
                <?php if($resultat->getResultatCategorie() == 0 || empty($resultat->getResultatCategorie())){ ?>
                    <td class="td-users">Pas de catégorie</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 1){ ?>
                    <td class="td-users">Coupe de France Pétanque</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 2){ ?>
                    <td class="td-users">Coupe de France Jeu Provencal</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 3){ ?>
                    <td class="td-users">Championnat des clubs Pétanque</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 4){ ?>
                    <td class="td-users">Championnat des clubs Jeu Provencal</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 5){ ?>
                    <td class="td-users">Championnat de l'Oise Tête à tête</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 6){ ?>
                    <td class="td-users">Championnat de l'Oise Doublette</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 7){ ?>
                    <td class="td-users">Championnat de l'Oise Triplette</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 8){ ?>
                    <td class="td-users">Championnat de l'Oise Doublette mixte</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 9){ ?>
                    <td class="td-users">Championnat de l'Oise Triplette mixte</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 10){ ?>
                    <td class="td-users">Championnat de l'Oise Doublette Jeu provencal</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 11){ ?>
                <td class="td-users">Championnat de l'Oise Triplette Jeu provencal</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 12){ ?>
                    <td class="td-users">Championnat de l'Oise Tir de précision</td>
                <?php }
                elseif ($resultat->getResultatCategorie() == 13){ ?>
                <td class="td-users">National</td>
                <?php } ?>
                <?php if($resultat->getResultatCategorie() == 14){ ?>
                    <td class="td-users">Concours</td>
                <?php } ?>

                <td class="td-users">
                    <form id="usr" action="index.php" method="post" style="display: inline-block;">
                        <?php echo '<p><input type="hidden" name="id_resultat" value="'.$resultat->getResultatId().'" /></p>' ?>
                        <p><input type="hidden" name="page" value="res_saisieUpdate" /></p>
                        <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                    </form>
                    <form id="evt" action="index.php" method="post" style="display: inline-block;">
                        <?php echo '<p><input type="hidden" name="id_resultat" value="'.$resultat->getResultatId().'" /></p>' ?>
                        <p><input type="hidden" name="page" value="res_gestionImages" /></p>
                        <p><input class="btn-update-event-img btn-update-effet" type="submit" value="Gestion Images" onclick="id"/></p>
                    </form>
                    <form id="usr" action="index.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $resultat->getResultatTitle() ?> ?')" style="display: inline-block;">
                        <?php echo '<p><input type="hidden" name="id_resultat" value="'.$resultat->getResultatId().'" /></p>' ?>
                        <p><input type="hidden" name="page" value="res_delete" /></p>
                        <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                    </form>
                </td>
            </tr>
            <?php }
        } ?>
        </tbody>
    <?php } ?>

</table>
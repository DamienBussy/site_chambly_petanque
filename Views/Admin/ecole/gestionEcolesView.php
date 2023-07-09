<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleUsers.css">-->
<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="eco_saisieAjout"><span>Ajouter un cours</span></button>
    </form>
</div>
<br>
<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesEcoles'] as $ecole){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
            <td class="td-users"><?= $ecole->getEcoleTitre() ?></td>
            <td class="td-users"><?= $ecole->getEcoleDescription() ?></td>
            <td class="td-users"><?= $ecole->getEcoleDate() ?></td>
            <td class="td-users">
                <form id="usr" action="index.php?page=eco_saisieModif" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_ecole" value="'.$ecole->getEcoleId().'" /></p>' ?>
                    <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                </form>
                <form id="evt" action="index.php" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_ecole" value="'.$ecole->getEcoleId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="eco_galery" /></p>
                    <p><input class="btn-update-event-img btn-update-effet" type="submit" value="Gestion Images" onclick="id"/></p>
                </form>
                <form id="usr" action="index.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $ecole->getEcoleTitre() ?> ?')" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_ecole" value="'.$ecole->getEcoleId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="eco_delete" /></p>
                    <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
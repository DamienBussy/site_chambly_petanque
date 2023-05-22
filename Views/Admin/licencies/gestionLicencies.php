<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>

<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="lic_saisieAjouter"><span>Ajouter un Licencié</span></button>
    </form>
    <br>
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="lic_saisieUpload"><span>Renouveler les Licencié</span></button>
    </form>
</div>
<br>

<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>Numéro licence</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Statut</th>
        <th>Catégorie</th>
        <th>Classé</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    </thead>
        <tbody>
        <?php foreach ($this->data['lesLicencies'] as $resultat){ ?>
                <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
                    <td class="td-users"><?= $resultat->getLicencieId() ?></td>
                    <td class="td-users"><?= $resultat->getLicencieNom() ?></td>
                    <td class="td-users"><?= $resultat->getLicenciePrenom() ?></td>
                    <td class="td-users"><?= $resultat->getLicencieStatut() ?></td>
                    <td class="td-users"><?= $resultat->getLicencieCategorie() ?></td>
                    <td class="td-users"><?= $resultat->getLicencieClasse() ?></td>
                    <td class="table-image"> <img src="<?= $resultat->getLicenciePhoto() ?>" alt="Logo"></td>

                    <td class="td-users">
                        <form id="usr" action="index.php" method="post" style="display: inline-block;">
                            <?php echo '<p><input type="hidden" name="id_licencie" value="'.$resultat->getLicencieId().'" /></p>' ?>
                            <p><input type="hidden" name="page" value="lic_saisieModifier" /></p>
                            <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                        </form>
                        <form id="usr" action="index.php" method="post" style="display: inline-block;">
                            <?php echo '<p><input type="hidden" name="id_licencie" value="'.$resultat->getLicencieId().'" /></p>' ?>
                            <p><input type="hidden" name="page" value="lic_delete" /></p>
                            <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                        </form>
                    </td>
                </tr>
        <?php } ?>
        </tbody>
</table>
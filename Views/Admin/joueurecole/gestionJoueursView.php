<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<div class="button-container">
    <form action="index.php?page=jcl_saisieAjout" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="jcl_saisieAjout"><span>Ajouter un joueur</span></button>
    </form>
</div>
<br>
<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesJoueurs'] as $joueur){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
            <td class="td-users"><?= $joueur->getJoueurecoleNom() ?></td>
            <td class="td-users"><?= $joueur->getJoueurecolePrenom() ?></td>
            <td class="table-image"><img src="<?= $joueur->getJoueurecolePhoto() ?>" alt=""></td>
            <td class="td-users">
                <form id="usr" action="index.php?page=jcl_saisieModif" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_joueurecole" value="'.$joueur->getJoueurecoleId().'" /></p>' ?>
                    <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                </form>
                <form id="usr" action="index.php?page=jcl_delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $joueur->getJoueurecolePrenom() ?> ?')" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_joueurecole" value="'.$joueur->getJoueurecoleId().'" /></p>' ?>
                    <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<div class="button-container">
    <form action="index.php?page=par_saisieAjout" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="par_saisieAjout"><span>Ajouter un sponsor</span></button>
    </form>
</div>
<br>
<table class="table-events">
    <thead class="th-users">
    <tr>
        <th>Titre</th>
        <th>Lien du site</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesPartners'] as $partner){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
            <td class="td-users"><?= $partner->getPartnerTitre() ?></td>
            <td class="td-users"><?= $partner->getPartnerLink() ?></td>
            <td class="table-image"><img src="<?= $partner->getPartnerPicture() ?>" alt=""></td>
            <td class="td-users">
                <form id="usr" action="index.php?page=par_saisieModif" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_partner" value="'.$partner->getPartnerId().'" /></p>' ?>
                    <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                </form>
                <form id="usr" action="index.php?page=par_delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $partner->getPartnerLink() ?> ?')" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_partner" value="'.$partner->getPartnerId().'" /></p>' ?>
                    <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
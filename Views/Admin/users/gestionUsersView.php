<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleUsers.css">-->
<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="usr_saisieAjout"><span>Ajouter un utilisateur</span></button>
    </form>
</div>
<br>
<table class="table-users">
    <thead class="th-users">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Login</th>
        <th>Statut</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesAdmin'] as $admin){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux tr-couleur-gold-president">
            <td class="td-users"><?= $admin->getUserId() ?></td>
            <td class="td-users"><?= $admin->getUserLastname() ?></td>
            <td class="td-users"><?= $admin->getUserFirstName() ?></td>
            <td class="td-users"><?= $admin->getUserEmail() ?></td>
            <td class="td-users"><?= $admin->getUserLogin() ?></td>
            <td class="td-users"><?= $admin->getUserStatut() ?></td>
            <td class="td-users">
                <form id="usr" action="index.php" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id" value="'.$admin->getUserId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="usr_saisieUpdate" size="30" /></p>
                    <p><input class="btn-update-users btn-update-effet" type="submit" value="Modifier" class="btn-update" onclick="id"/></p>
                </form>
                <?php if($admin->getUserStatut() == "Admin"){ ?>
                    <form id="usr" action="index.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $admin->getUserFirstname() . ' ' . $admin->getUserLastname() ?> ?')" style="display: inline-block;">
                        <?php echo '<p><input type="hidden" name="id" value="'.$admin->getUserId().'" /></p>' ?>
                        <p><input type="hidden" name="page" value="usr_delete" size="30" /></p>
                        <p><input class="btn-delete-users btn-delete-effet" type="submit" value="Supprimer" class="btn-delete" onclick="id"/></p>
                    </form>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-saisie-new-president" type="submit" name="page" value="usr_saisieNouveauPresident"><span>Choisir un nouveau Président</span></button>
    </form>

</div>
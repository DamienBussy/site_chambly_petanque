<?php require_once "Views/public/joueurs/sousmenuconnect.php" ?>
<style>
    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 20vh; /* Ajustez cette valeur selon vos besoins */
    }

    .button-container form {
      display: flex;
      justify-content: center;
      align-items: center;
    }
</style>
<div class="button-container">
    <form action="indexpublic.php" method="post">
        <button type="submit" name="page" value="jou_saisiecreateannonce"><span>Publier une annonce</span></button>
    </form>
</div>
<?php if(isset($this->data['lesAnnonces'])){ ?>
    <div class="row">
    <div class="column large-12">
    <h3>Annonces</h3>
    <div class="table-responsive">
    <table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Joueur</th>
        <th>Discussion</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php foreach($this->data['lesAnnonces'] as $annonce){ ?>
            <tbody>
            <tr>
                <td><?= $annonce->getAnnonceTitre() ?></td>
                <td><?= $annonce->getAnnonceDate() ?></td>
                <td><?= $annonce->getJoueur() ?></td>
                <td><a href="indexpublic.php?page=jou_affichercomments&idAnnonce=<?= $annonce->getAnnonceId() ?>&title=<?= $annonce->getAnnonceTitre() ?>">Discuter</a></td>
                <?php if($_SESSION['joueurs']->getJoueurId() == $annonce->getAnnonceJoueur()){ ?>
                    <td><a href="indexpublic.php?page=jou_deleteannonce&idAnnonce=<?= $annonce->getAnnonceId() ?>">Supprimer</a>
                    |
                    <a href="indexpublic.php?page=jou_saisieupdateannonce&idAnnonce=<?= $annonce->getAnnonceId() ?>">Modifier</a></td>
                <?php } else{ ?>
                    <td><p>Vous n'avez aucun droits sur cette annonce.</p></td>
                <?php }?>

            </tr>
            </tbody>
<?php } ?>
</table>
        </div>
    </div>
<?php } else{ ?>
    <br>
    <p class="msg-error">Aucune annonce de publié</p>
<?php }


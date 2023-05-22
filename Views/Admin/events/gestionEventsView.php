<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<!--<link rel="stylesheet" type="text/css" href="./css/styleUsers.css">-->
<div class="button-container">
    <form action="index.php" method="post">
        <button class="button-ajout-users button-espace" type="submit" name="page" value="evt_saisieAjout"><span>Ajouter un évènemment</span></button>
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
        <th>Lieu</th>
        <th>Heure Début</th>
        <th>Heure Fin</th>
        <th>Image Principale</th>
        <th>Catégorie</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->data['lesEvents'] as $event){ ?>
        <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">
            <td class="td-users"><?= $event->getEventId() ?></td>
            <td class="td-users"><?= $event->getEventTitle() ?></td>
            <td class="td-users"><?= $event->getEventDescription() ?></td>
            <td class="td-users"><?= $event->getEventDate() ?></td>
            <td class="td-users"><?= $event->getEventLieu() ?></td>
            <td class="td-users"><?= $event->getEventHeureDebut() ?></td>
            <td class="td-users"><?= $event->getEventHeureFin() ?></td>
            <td class="table-image"> <img src="<?= $event->getPathImagePrincipale() ?>" alt="Logo"></td>
            <?php if($event->getEventCategorie() == 0 || empty($event->getEventCategorie())){ ?>
                <td class="td-users">Pas de catégorie</td>
            <?php }
            elseif ($event->getEventCategorie() == 1){ ?>
                <td class="td-users">Coupe de France Pétanque</td>
            <?php } ?>
            <?php if($event->getEventCategorie() == 2){ ?>
                <td class="td-users">Coupe de France Jeu Provencal</td>
            <?php }
            elseif ($event->getEventCategorie() == 3){ ?>
                <td class="td-users">Championnat des clubs Pétanque</td>
            <?php } ?>
            <?php if($event->getEventCategorie() == 4){ ?>
                <td class="td-users">Championnat des clubs Jeu Provencal</td>
            <?php } ?>
            <td class="td-users">
                <form id="usr" action="index.php" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_event" value="'.$event->getEventId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="evt_saisieModifier" /></p>
                    <p><input class="btn-update-users btn-update-effet btn-update" type="submit" value="Modifier" onclick="id"/></p>
                </form>
                <form id="evt" action="index.php" method="post" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_event" value="'.$event->getEventId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="evt_gestionImages" /></p>
                    <p><input class="btn-update-event-img btn-update-effet" type="submit" value="Gestion Images" onclick="id"/></p>
                </form>
                <form id="usr" action="index.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer <?= $event->getEventTitle() ?> ?')" style="display: inline-block;">
                    <?php echo '<p><input type="hidden" name="id_event" value="'.$event->getEventId().'" /></p>' ?>
                    <p><input type="hidden" name="page" value="evt_delete" /></p>
                    <p><input class="btn-delete-users btn-delete-effet btn-delete" type="submit" value="Supprimer" onclick="id"/></p>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
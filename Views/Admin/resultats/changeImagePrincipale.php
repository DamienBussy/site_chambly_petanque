<?php require_once "Views/Admin/resultats/menuResultatImages.php"?>
<form action="index.php" method="POST">
    <p><input type="hidden" name="page" value="res_updateImagePrincipale" /></p>
    <p><input type="hidden" name="id_resultat" value="<?= $this->data['id_resultat'] ?>" /></p>
    <div class="gallery">
        <?php foreach ($this->data['images'] as $image) { ?>
            <div class="gallery-item">
                <a href="<?= $image->getImagePath() ?>" target="_blank">
                    <img src="<?= $image->getImagePath() ?>">
                </a>
            </div>
            <br>
            <input type="radio" name="idNouveau" value="<?= $image->getImageId() ?>">
        <?php } ?>
    </div>

    <br>
    <?php
    if(!empty($this->data['images'])){ ?>
        <input type="submit" value="Enregistrer mon image favorite" class="btn-update-users"/>
    <?php   }
    ?>
    <?php
    if(empty($this->data['images'])){ ?>
        <p class="msg-error">Vous n'avez aucune image pour cet évènement.</p>
    <?php   }
    ?>

</form>
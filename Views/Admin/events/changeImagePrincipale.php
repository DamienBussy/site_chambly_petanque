<?php require_once "Views/Admin/events/menuEventImages.php"?>
<form action="index.php" method="POST">
    <p><input type="hidden" name="page" value="evt_updateImagePrincipale" /></p>
    <p><input type="hidden" name="id_event" value="<?= $this->data['id_event'] ?>" /></p>
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
<!--    <table>-->
<!--        --><?php
//        foreach ($this->data['images'] as $image){
//            ?>
<!---->
<!--            <tr class="tr-effet-ligne-user tr-effet-une-ligne-sur-deux">-->
<!--                <td> <img src="--><?php //= $image->getImagePath() ?><!--" class="image-event-size"></td>-->
<!--                <td class="td-users">-->
<!--                    <div class="user-row-new-pres">-->
<!--                        <label>-->
<!--                            --><?php //if($image->getImageId() != $this->data['id_image_principale']) { ?>
<!--                                <input type="radio" name="idNouveau" value="--><?php //= $image->getImageId() ?><!--">-->
<!--                            --><?php //} ?>
<!--                        </label>-->
<!--                    </div>-->
<!--                </td>-->
<!--            </tr>-->
<!--        --><?php //} ?>
<!--    </table>-->

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
<?php require_once "Views/Admin/events/menuEventImages.php"?>

<table>
<?php
    $count = 0; // initialisation du compteur
    foreach ($this->data['images'] as $image){
        if($count % 4 == 0){ // si le compteur est un multiple de 4
            echo "<tr>"; // on commence une nouvelle ligne
        }
        ?>
        <td>
            <form action="index.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?')" style="display: inline-block;">
                <input type="hidden" name="id_event" value="<?= $this->data['id_event'] ?>" />
                <input type="hidden" name="id" value="<?= $image->getImageId() ?>" />
                <input type="hidden" name="page" value="evt_deleteImage" />
                <img src="<?= $image->getImagePath() ?>" class="image-event-size">
                <br>
                <input class="btn-delete-users" type="submit" value="Supprimer" />
            </form>
        </td>
        <?php
        $count++; // on incrémente le compteur
        if($count % 4 == 0){ // si le compteur est un multiple de 4
            echo "</tr>"; // on ferme la ligne
        }
    }
    if($count % 4 != 0){ // si le compteur n'est pas un multiple de 4
        echo "</tr>"; // on ferme la dernière ligne
    }
    ?>
</table>

    <?php if(!empty($this->data['messageAvertissement'])){
        echo '<p class="msg-error">'.$this->data['messageAvertissement'].'</p>';
    } ?>

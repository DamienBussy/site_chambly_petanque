<?php require_once "Views/Admin/ecole/menuEcoleImages.php"?>

    <div class="gallery">
        <?php foreach ($this->data['lesPhotos'] as $image) { ?>
            <div class="gallery-item">
                <a href="<?= $image->getGaleryecolePath() ?>" target="_blank">
                    <img src="<?= $image->getGaleryecolePath() ?>">
                </a>
            </div>
        <?php } ?>
    </div>

<?php if(empty($this->data['lesPhotos'])){ ?>
    <p class="msg-error">Vous n'avez aucune image pour cet évènement.</p>
<?php   } ?>
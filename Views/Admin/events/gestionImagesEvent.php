<?php require_once "Views/Admin/events/menuEventImages.php"?>

<div class="gallery">
    <?php foreach ($this->data['images'] as $image) { ?>
        <div class="gallery-item">
            <a href="<?= $image->getImagePath() ?>" target="_blank">
                <img src="<?= $image->getImagePath() ?>">
            </a>
        </div>
    <?php } ?>
</div>

<?php if(empty($this->data['images'])){ ?>
    <p class="msg-error">Vous n'avez aucune image pour cet évènement.</p>
<?php   } ?>
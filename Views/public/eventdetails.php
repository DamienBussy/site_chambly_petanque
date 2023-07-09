<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<?php $event = $this->data['theEvent'] ?>
<section class="s-content">
    <div class="row">
        <div class="column large-12">

            <article class="s-content__entry format-standard">
                <div class="s-content__media">
                    <style>
                        .img-evt-details {
                            text-align: center;
                        }

                        .img-evt-details img {
                            width: auto;
                            height: auto;
                        }
                    </style>
                    <div class="img-evt-details">
                        <img src="<?= $event->getPathImagePrincipale() ?>">
                    </div>
                </div> <!-- end s-content__media -->

                <div class="s-content__entry-header">
                    <h1 class="s-content__title s-content__title--post"><?= $event->getEventTitle() ?></h1>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>Lieu</th>
                                <th>Date (année/mois/jour)</th>
                                <th>Heure</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $event->getEventLieu() ?></td>
                                <td><?php echo $event->getEventDate() ?></td>
                                <td><?php if(!is_null($event->getEventHeureDebut())){
                                    echo $event->getEventHeureDebut();
                                    } else{
                                    echo 'Non renseigné';
                                    } ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end s-content__entry-header -->

                <div class="s-content__primary">

                    <div class="s-content__entry-content">

                        <p class="lead"><?= $event->getEventDescription() ?></p>

                    </div>
                </div> <!-- end s-content__primary -->
                <h2>Galerie</h2>
                <style>
                    .galleryresdtl {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                    }
                    .gallery-itemresdtl {
                        margin: 10px;
                        width: 200px;
                        height: 200px;
                        overflow: hidden;
                        border-radius: 5px;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
                        transition: all 0.3s ease;
                        border: 2px solid #ccc;
                    }

                    .gallery-itemresdtl:hover {
                        transform: scale(1.1);
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                        border: 2px solid #fff;
                    }
                </style>
                <div class="galleryresdtl">
                    <?php foreach ($this->data['images'] as $image) { ?>
                        <div class="gallery-itemresdtl">
                            <a href="<?= $image->getImagePath() ?>" target="_blank">
                                <img src="<?= $image->getImagePath() ?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <?php if(empty($this->data['images'])){ ?>
                    <p class="msg-error">Vous n'avez aucune image pour ce résultat.</p>
                <?php   } ?>
            </article> <!-- end entry -->

        </div> <!-- end column -->
    </div> <!-- end row -->


    </div> <!-- end comments-wrap -->


</section> <!-- end s-content -->


<?php require_once "Views/public/footer.php" ?>

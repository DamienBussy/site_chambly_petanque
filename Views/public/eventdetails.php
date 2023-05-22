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
            </article> <!-- end entry -->

        </div> <!-- end column -->
    </div> <!-- end row -->


    </div> <!-- end comments-wrap -->


</section> <!-- end s-content -->


<?php require_once "Views/public/footer.php" ?>


<!-- Java Script
================================================== -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>

<!DOCTYPE html>
<html class="no-js" lang="en">
<?php require_once "Views/public/menu.php"?>
<?php $licencie = $this->data['theLicencie'] ?>
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
                        <img src="<?= $licencie->getLicenciePhoto() ?>">
                    </div>
                </div> <!-- end s-content__media -->

                <div class="s-content__entry-header">
<!--                    <h1 class="s-content__title s-content__title--post">--><?php //= $licencie->getLicencieId() ?><!--</h1>-->
                    <br>
                    <table>
                        <thead>
                        <tr>
                            <th>Numéro de licence</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Catégorie</th>
                            <th>Classement</th>
                        </tr>
                        </thead>
                        <tbody>
                        <style>
                            img {
                                width: 150px; /* spécifiez la largeur souhaitée */
                                height: auto; /* permet de conserver les proportions de l'image */
                            }
                        </style>

                        <tr>
                            <td><?php echo $licencie->getLicencieId() ?></td>
                            <td><?php echo $licencie->getLicencieNom() ?></td>
                            <td><?php echo $licencie->getLicenciePrenom() ?></td>
                            <td><?php echo $licencie->getLicencieCategorie() ?></td>
                            <td><?php echo $licencie->getLicencieClasse(); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div> <!-- end s-content__entry-header -->
            </article> <!-- end entry -->

        </div> <!-- end column -->
    </div> <!-- end row -->


    </div> <!-- end comments-wrap -->


</section> <!-- end s-content -->


<?php require_once "Views/public/footer.php" ?>

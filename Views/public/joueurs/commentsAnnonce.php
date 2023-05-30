<?php require_once "Views/public/joueurs/sousmenuconnect.php" ?>

<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="column large-12">

            <h3><?= $this->data['titre'] ?></h3>

            <!-- START commentlist -->
            <ol class="commentlist">

                <?php foreach ($this->data['lesComments'] as $comment){ ?>
                    <li class="depth-1 comment">
                        <div class="comment__avatar">
                            <img class="avatar" src="<?= $comment->getJoueurPhoto() ?>" alt="" width="50" height="50">
                        </div>
                        <div class="comment__content">
                            <div class="comment__info">
                                <div class="comment__author"><?= $comment->getJoueurPrenomNom() ?></div>

                                <div class="comment__meta">
                                    <?php $annonce_date_obj = DateTime::createFromFormat('Y-m-d H:i:s', $comment->getCommentDate()) ?>
                                    <div class="comment__time"><?= $annonce_date_obj->format('M d Y, H\hi') ?></div>
                                </div>
                            </div>
                            <div class="comment__text">
                                <p><?= $comment->getCommentText() ?></p>
                            </div>
                        </div>
                    </li>
                <?php } ?>

            </ol>
            <!-- END commentlist -->

        </div> <!-- end col-full -->
    </div> <!-- end comments -->


    <div class="row comment-respond">

        <!-- START respond -->
        <div id="respond" class="column">

            <h3>
                Parler
                <span>Cet espace de discussion à été réalisé pour trouver des coéquipiers pour des concours, championnats...</span>
            </h3>

            <form name="contactForm" id="contactForm" method="post" action="indexpublic?page=jou_ajoutercomment" autocomplete="off">
                <fieldset>
                    <input type="hidden" id="idAnnonce" name="idAnnonce" value="<?= $this->data['idAnnonce'] ?>">
                    <input type="hidden" id="titleAnnonce" name="titleAnnonce" value="<?= $this->data['titre'] ?>">
                    <input type="hidden" id="idJoueur" name="idJoueur" value="<?= $_SESSION['joueurs']->getJoueurId() ?>">
                    <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Ecrivez votre message"></textarea>
                    </div>

                    <br>
                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Envoyer" type="submit">
                </fieldset>
            </form> <!-- end form -->

        </div>
        <!-- END respond-->

    </div> <!-- end comment-respond -->

<?php require_once "Views/public/footer.php" ?>
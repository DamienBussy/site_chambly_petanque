<?php require_once "Views/public/joueurs/sousmenuconnect.php"?>
<style>
    .form-ajout-event {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        max-width: 400px; /* Ajustez la largeur maximale selon vos besoins */
    }

    .form-ajout-event fieldset {
        border: none;
        margin: 0;
        padding: 0;
    }
</style>

<form class="form-ajout-event" method="POST" action="indexpublic.php?page=jou_modifier" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" required value="<?= $this->data['id']; ?>">

    <label class="label-ajout-event" for="nom">Nom :
        <input type="text" name="nom" value="<?php echo $this->data['nom']; ?>"></label>

    <label class="label-ajout-event" for="prenom">Prénom :
        <input type="text" name="prenom" value="<?php echo $this->data['prenom']; ?>"></label>

    <label class="label-ajout-event" for="login">Login :
        <input type="text" name="login" value="<?php echo $this->data['login']; ?>"></label>

    <?php
    if (!is_null($this->data['photo'])) { ?>
        <a href="indexpublic.php?page=jou_deletePhoto&id=<?= $this->data['id']; ?>">Supprimer la photo actuelle</a>
        <input type="hidden" name="image_path_identique" id="image_path_identique" value="<?= $this->data['photo']; ?>"><br>
        <br>
    <?php } else { ?>
        <label class="label-ajout-event" for="photo">Photo de profil :</label>
        <input type="file" name="joueur_photo" id="joueur_photo"><br>
    <?php }
    ?>

    <fieldset>
        <label>Facultatif</label><br>
        <label class="label-ajout-event" for="passwordActuel">Mot de passe Actuel :
            <input type="password" name="passwordActuel" id="passwordActuel"></label>
        <label class="label-ajout-event" for="password">Nouveau mot de passe :
            <input type="password" name="password" id="password"></label>
        <label class="label-ajout-event" for="passwordConfirm">Confirmation du nouveau mot de passe :
            <input type="password" name="passwordConfirm" id="passwordConfirm"></label>
    </fieldset>




    <input class="input-btn-ajouter center" type="submit" value="Modifier mon compte">
    <?php
    if(!empty($this->data['error'])){ ?>
        <p><?= $this->data['error'] ?></p>
   <?php }
    ?>

</form>
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
    img {
        max-width: 200px; /* Remplacez la valeur par celle souhaitée */
        height: auto; /* Maintient le ratio de l'image */
    }
</style>

<form class="form-ajout-event" method="POST" action="indexpublic.php?page=jou_saisiemodifier" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" required value="<?= $this->data['id']; ?>">

    <label class="label-ajout-event" for="nom">Nom : <?php echo $this->data['nom']; ?></label>

    <label class="label-ajout-event" for="prenom">Prénom : <?php echo $this->data['prenom']; ?></label>

    <label class="label-ajout-event" for="id">Login : <?php echo $this->data['login']; ?></label>

    <?php if(!is_null($this->data['photo'])){ ?>
        <label class="label-ajout-event" for="photo">Photo de profil :</label>
        <img src="<?= $this->data['photo'] ?>" alt="logo">
    <br>
    <?php } else{ ?>
    <label class="label-ajout-event" for="photo">Photo de profil : Pas de photo</label>
    <?php }
    ?>

    <input class="input-btn-ajouter center" type="submit" value="Modifier mon compte">

</form>
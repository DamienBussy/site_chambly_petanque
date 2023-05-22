<?php require_once "utils/protection.php";?>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <form class="form-ajout-event" method="POST" action="index.php?page=lic_modifier" enctype="multipart/form-data">
    <input type="hidden" name="idCourant" id="idCourant" required value="<?= $this->data['id']; ?>">

    <label class="label-ajout-event" for="id">Numéro de licence :</label>
    <input type="text" name="id" id="id" required value="<?php echo $this->data['id']; ?>"><br>

    <label class="label-ajout-event" for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required value="<?php echo $this->data['nom']; ?>"><br>

    <label class="label-ajout-event" for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required value="<?php echo $this->data['prenom']; ?>"><br>

    <label class="label-ajout-event" for="statut">Statut (ce statut n'est que pour les membres du bureau) :</label>
    <select name="statut" id="statut">
    <option value="">-- Sélectionner un statut --</option>
    <option value="Président"<?php if ($this->data['statut'] == 'Président') echo ' selected'; ?>>Président</option>
    <option value="Vice-Président"<?php if ($this->data['statut'] == 'Vice-Président') echo ' selected'; ?>>Vice-Président</option>
    <option value="Secrétaire Générale"<?php if ($this->data['statut'] == 'Secrétaire Générale') echo ' selected'; ?>>Secrétaire Générale</option>
    <option value="Trésorier Générale"<?php if ($this->data['statut'] == 'Trésorier Générale') echo ' selected'; ?>>Trésorier Générale</option>
    <option value="Trésorier Adjoint"<?php if ($this->data['statut'] == 'Trésorier Adjoint') echo ' selected'; ?>>Trésorier Adjoint</option>
    <option value="Secrétaire Adjoint"<?php if ($this->data['statut'] == 'Secrétaire Adjoint') echo ' selected'; ?>>Secrétaire Adjoint</option>
    <option value="Directeur Sportif"<?php if ($this->data['statut'] == 'Directeur Sportif') echo ' selected'; ?>>Directeur Sportif</option>
    <option value="Directeur Sportif Adjoint"<?php if ($this->data['statut'] == 'Directeur Sportif Adjoint') echo ' selected'; ?>>Directeur Sportif Adjoint</option>
    <option value="Initiateur école de pétanque"<?php if ($this->data['statut'] == 'Initiateur école de pétanque') echo ' selected'; ?>>Initiateur école de pétanque</option>
    <option value="Correspondant Vétérans"<?php if ($this->data['statut'] == 'Correspondant Vétérans') echo ' selected'; ?>>Correspondant Vétérans</option>
    <option value="Membre bénévole"<?php if ($this->data['statut'] == 'Membre bénévole') echo ' selected'; ?>>Membre bénévole</option>
    </select><br>
        <label class="label-modif-licencie" for="categ">Catégorie :</label>
        <select name="categ" id="categ" required>
            <option value="">-- Sélectionner la catégorie --</option>
            <option value="Benjamin" <?php if($this->data['categ'] == 'Benjamin') echo 'selected'; ?>>Benjamin</option>
            <option value="Minime" <?php if($this->data['categ'] == 'Minime') echo 'selected'; ?>>Minime</option>
            <option value="Cadet" <?php if($this->data['categ'] == 'Cadet') echo 'selected'; ?>>Cadet</option>
            <option value="Junior" <?php if($this->data['categ'] == 'Junior') echo 'selected'; ?>>Junior</option>
            <option value="Sénior" <?php if($this->data['categ'] == 'Sénior') echo 'selected'; ?>>Sénior</option>
            <option value="Vétéran" <?php if($this->data['categ'] == 'Vétéran') echo 'selected'; ?>>Vétéran</option>
        </select><br>

        <label class="label-modif-licencie" for="classe">Classement :</label>
        <select name="classe" id="classe" required>
            <option value="">-- Sélectionner le classement --</option>
            <option value="Non classé" <?php if($this->data['classe'] == 'Non classé') echo 'selected'; ?>>Non classé</option>
            <option value="Promotion" <?php if($this->data['classe'] == 'Promotion') echo 'selected'; ?>>Promotion</option>
            <option value="Honneur" <?php if($this->data['classe'] == 'Honneur') echo 'selected'; ?>>Honneur</option>
            <option value="Elite" <?php if($this->data['classe'] == 'Elite') echo 'selected'; ?>>Elite</option>
        </select><br>

        <?php
        if(!is_null($this->data['photo'])){ ?>
            <a href="index.php?page=lic_deletePhoto&idCourant=<?= $this->data['id']; ?>">Supprimer la photo actuelle</a>
            <input type="hidden" name="image_path_identique" id="image_path_identique" value="<?= $this->data['photo']; ?>"><br>
            <br>
        <?php } else{ ?>
            <label class="label-ajout-event" for="image_path">Photo :</label>
            <input type="file" name="image_path" id="image_path"><br>
        <?php }
        ?>


        <input class="input-btn-ajouter center" type="submit" value="Modifier le licencié">
    </form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="lic_gestion">Retour</button>
</form>


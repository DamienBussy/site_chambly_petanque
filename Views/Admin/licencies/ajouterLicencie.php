<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=lic_ajouter" enctype="multipart/form-data">
    <label class="label-ajout-event" for="id">Numéro de licence :</label>
    <input type="text" name="id" id="id" required><br>

    <label class="label-ajout-event" for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required><br>

    <label class="label-ajout-event" for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required><br>

    <label class="label-ajout-event" for="statut">Statut (ce statut n'est que pour les membres du bureau) :</label>
    <select name="statut" id="statut">
        <option value="">-- Sélectionner un statut --</option>
        <option value="Président">Président</option>
        <option value="Vice-Président">Vice-Président</option>
        <option value="Secrétaire Générale">Secrétaire Générale</option>
        <option value="Trésorier Générale">Trésorier Générale</option>
        <option value="Trésorier Adjoint">Trésorier Adjoint</option>
        <option value="Secrétaire Adjoint">Secrétaire Adjoint</option>
        <option value="Directeur Sportif">Directeur Sportif</option>
        <option value="Directeur Sportif Adjoint">Directeur Sportif Adjoint</option>
        <option value="Initiateur école de pétanque">Initiateur école de pétanque</option>
        <option value="Correspondant Vétérans">Correspondant Vétérans</option>
        <option value="Membre bénévole">Membre bénévole</option>
    </select><br>

    <label class="label-ajout-event" for="categ">Catégorie :</label>
    <select name="categ" id="categ" required>
        <option value="">-- Sélectionner la catégorie --</option>
        <option value="Benjamin">Benjamin</option>
        <option value="Minime">Minime</option>
        <option value="Cadet">Cadet</option>
        <option value="Junior">Junior</option>
        <option value="Sénior">Sénior</option>
        <option value="Vétéran">Vétéran</option>
    </select><br>

    <label class="label-ajout-event" for="classe">Classement :</label>
    <select name="classe" id="classe" required>
        <option value="">-- Sélectionner le classemeny --</option>
        <option value="Non classé">Non classé</option>
        <option value="Promotion">Promotion</option>
        <option value="Honneur">Honneur</option>
        <option value="Elite">Elite</option>
    </select><br>

    <label class="label-ajout-event" for="image_path">Photo :</label>
    <input type="file" name="image_path" id="image_path" required><br>

    <input class="input-btn-ajouter" type="submit" value="Ajouter le licencié">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="lic_gestion">Retour</button>
</form>
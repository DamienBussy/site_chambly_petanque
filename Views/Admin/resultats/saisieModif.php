<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=res_modifier" enctype="multipart/form-data">
    <input type="hidden" name="id_resultat" value="<?= $this->data['id_resultat'] ?>">
    <h1>Ajouter un résultat</h1>
    <label class="label-ajout-event" for="title">Titre du résultat :</label>
    <input type="text" name="title" id="title" value="<?= $this->data['title'] ?>" required><br><br>

    <label class="label-ajout-event" for="desc">Description du résultat :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="14" cols="65"><?= $this->data['desc'] ?></textarea><br><br>

    <label class="label-ajout-event" for="date">Date du résultat :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" value="<?= $this->data['date'] ?>" required><br><br>

    <label class="label-ajout-event" for="categ">Catégorie :</label>
    <select name="categ" id="categ">
        <option value="0" <?php if ($this->data['categ'] == 0) { echo "selected"; } ?>></option>
        <option value="1" <?php if ($this->data['categ'] == 1) { echo "selected"; } ?>>Coupe de France Pétanque</option>
        <option value="2" <?php if ($this->data['categ'] == 2) { echo "selected"; } ?>>Coupe de France Jeu Provencal</option>
        <option value="3" <?php if ($this->data['categ'] == 3) { echo "selected"; } ?>>Championnat des clubs Pétanque</option>
        <option value="4" <?php if ($this->data['categ'] == 4) { echo "selected"; } ?>>Championnat des clubs Jeu Provencal</option>
        <option value="5" <?php if ($this->data['categ'] == 5) { echo "selected"; } ?>>Championnat de l'Oise Tête à tête</option>
        <option value="6" <?php if ($this->data['categ'] == 6) { echo "selected"; } ?>>Championnat de l'Oise Doublette</option>
        <option value="7" <?php if ($this->data['categ'] == 7) { echo "selected"; } ?>>Championnat de l'Oise Triplette</option>
        <option value="8" <?php if ($this->data['categ'] == 8) { echo "selected"; } ?>>Championnat de l'Oise Doublette mixte</option>
        <option value="9" <?php if ($this->data['categ'] == 9) { echo "selected"; } ?>>Championnat de l'Oise Triplette mixte</option>
        <option value="10" <?php if ($this->data['categ'] == 10) { echo "selected"; } ?>>Championnat de l'Oise Doublette Jeu provencal</option>
        <option value="11" <?php if ($this->data['categ'] == 11) { echo "selected"; } ?>>Championnat de l'Oise Triplette Jeu provencal</option>
        <option value="12" <?php if ($this->data['categ'] == 12) { echo "selected"; } ?>>Championnat de l'Oise Tir de précision</option>
        <option value="13" <?php if ($this->data['categ'] == 13) { echo "selected"; } ?>>National</option>
        <option value="14" <?php if ($this->data['categ'] == 14) { echo "selected"; } ?>>Concours</option>
    </select><br><br>

    <label class="label-ajout-event" for="annee">Année :</label>
    <input type="text" name="annee" id="annee" value="<?= $this->data['annee'] ?>"><br><br>

    <input class="input-btn-ajouter" type="submit" value="Modifier le résultat">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="res_getAllResultats">Retour</button>
</form>

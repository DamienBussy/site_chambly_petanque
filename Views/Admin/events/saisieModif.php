<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=evt_modifier" enctype="multipart/form-data">
    <input type="hidden" name="id_event" value="<?= $this->data['id_event'] ?>">
    <h1>Modifier l'évènement</h1>
    <label class="label-ajout-event" for="title">Titre de l'évènement :</label>
    <input type="text" name="title" id="title" value="<?= $this->data['title'] ?>" required><br><br>

    <label class="label-ajout-event" for="desc">Description :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="14" cols="65"><?= $this->data['desc'] ?></textarea><br><br>

    <label class="label-ajout-event" for="date">Date :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" value="<?= $this->data['date'] ?>"><br><br>

    <label class="label-ajout-event" for="lieu">Lieu de l'évènement :</label>
    <input class="input-ajout-event" type="text" name="lieu" id="lieu" value="<?= $this->data['lieu'] ?>"><br><br>

    <label class="label-ajout-event" for="heureDebut">Heure de début :</label>
    <input class="input-ajout-event" type="time" name="heureDebut" id="heureDebut" value="<?= $this->data['heureDebut'] ?>"><br><br>

    <label class="label-ajout-event" for="heureFin">Heure de fin :</label>
    <input class="input-ajout-event" type="time" name="heureFin" id="heureFin" value="<?= $this->data['heureFin'] ?>"><br><br>

    <label class="label-ajout-event" for="categ">Catégorie :</label>
    <select name="categ" id="categ">
        <option value="0" <?php if ($this->data['categ'] == 0) { echo "selected"; } ?>></option>
        <option value="1" <?php if ($this->data['categ'] == 1) { echo "selected"; } ?>>Coupe de France Pétanque</option>
        <option value="2" <?php if ($this->data['categ'] == 2) { echo "selected"; } ?>>Coupe de France Jeu Provencal</option>
        <option value="3" <?php if ($this->data['categ'] == 3) { echo "selected"; } ?>>Championnat des clubs Pétanque</option>
        <option value="4" <?php if ($this->data['categ'] == 4) { echo "selected"; } ?>>Championnat des clubs Jeu Provencal</option>
    </select><br><br>

    <input class="input-btn-ajouter" type="submit" value="Modifier le résultat">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="evt_getAllEvents">Retour</button>
</form>

<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=eco_modifier" enctype="multipart/form-data">
    <input type="hidden" name="id_ecole" value="<?= $this->data['id_ecole'] ?>">
    <h1>Modifier le cours</h1>
    <label class="label-ajout-event" for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $this->data['title'] ?>"  size="50"><br><br>

    <label class="label-ajout-event" for="desc">Description :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="14" cols="65"><?= $this->data['desc'] ?></textarea><br><br>

    <label class="label-ajout-event" for="date">Date :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" value="<?= $this->data['date'] ?>"><br><br>

    <input class="input-btn-ajouter" type="submit" value="Modifier le cours">
</form>

<form method="post" action="index.php?page=eco_afficher">
    <button type="submit" class="btn-back">Retour</button>
</form>

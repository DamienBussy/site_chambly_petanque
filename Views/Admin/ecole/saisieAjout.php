<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=eco_ajouter" enctype="multipart/form-data">
    <h1>Ajouter un école</h1>
    <label class="label-ajout-event" for="title">Titre :</label>
    <input type="text" name="title" id="title" size="50" required><br><br>

    <label class="label-ajout-event" for="desc">Description :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="4" cols="50"></textarea><br><br>

    <label class="label-ajout-event" for="date">Date de l'évènement :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" required><br>

    <input class="input-btn-ajouter" type="submit" value="Ajouter l'école">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="eco_afficher">Retour</button>
</form>
<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=evt_ajouter" enctype="multipart/form-data">
    <h1>Ajouter un évènement</h1>
    <label class="label-ajout-event" for="title">Titre de l'évènement :</label>
    <input type="text" name="title" id="title" required><br><br>

    <label class="label-ajout-event" for="desc">Description de l'évènement :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="4" cols="50"></textarea><br><br>

    <label class="label-ajout-event" for="date">Date de l'évènement :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" required><br><br>

    <label class="label-ajout-event" for="lieu">Lieu de l'évènement :</label>
    <input class="input-ajout-event" type="text" name="lieu" id="lieu" required><br><br>

    <label class="label-ajout-event" for="heureDebut">Heure de début :</label>
    <input class="input-ajout-event" type="time" name="heureDebut" id="heureDebut"><br><br>

    <label class="label-ajout-event" for="heureFin">Heure de fin :</label>
    <input class="input-ajout-event" type="time" name="heureFin" id="heureFin"><br><br>

    <label class="label-ajout-event" for="categ">Catégorie :</label>
    <input type="text" name="categ" id="categ"><br><br>

    <input class="input-btn-ajouter" type="submit" value="Ajouter l'évènement">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="evt_getAllEvents">Retour</button>
</form>
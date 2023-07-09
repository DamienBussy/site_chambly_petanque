<?php require_once "utils/protection.php";?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<form class="form-ajout-event" method="POST" action="index.php?page=res_ajouter" enctype="multipart/form-data">
    <h1>Ajouter un résultat</h1>
    <label class="label-ajout-event" for="title">Titre du résultat :</label>
    <input type="text" name="title" id="title" size="65" required><br><br>

    <label class="label-ajout-event" for="desc">Description du résultat :</label>
    <textarea class="textarea-ajout-event" name="desc" id="desc" rows="4" cols="50"></textarea><br><br>

    <label class="label-ajout-event" for="date">Date du résultat :</label>
    <input class="input-ajout-event" type="date" name="date" id="date" required><br><br>


    <label class="label-ajout-event" for="categ">Catégorie :</label>
    <select name="categ" id="categ">
        <option value="0"></option>
        <option value="1">Coupe de France Pétanque</option>
        <option value="2">Coupe de France Jeu Provencal</option>
        <option value="3">Championnat des clubs Pétanque</option>
        <option value="4">Championnat des clubs Jeu Provencal</option>
        <option value="5">Championnat de l'Oise Tête à tête</option>
        <option value="6">Championnat de l'Oise Doublette</option>
        <option value="7">Championnat de l'Oise Triplette</option>
        <option value="8">Championnat de l'Oise Doublette mixte</option>
        <option value="9">Championnat de l'Oise Triplette mixte</option>
        <option value="10">Championnat de l'Oise Doublette Jeu provencal</option>
        <option value="11">Championnat de l'Oise Triplette Jeu provencal</option>
        <option value="12">Championnat de l'Oise Tir de précision</option>
        <option value="13">National</option>
        <option value="14">Concours</option>
        <option value="15">Championnats de Ligue</option>
        <option value="16">Championnats de France</option>
    </select><br><br>
    <label class="label-ajout-event" for="date">Année :</label>
    <input class="input-ajout-event" type="text" name="annee" id="annee" required><br><br>

    <input class="input-btn-ajouter" type="submit" value="Ajouter le résultat">
</form>

<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="res_getAllResultats">Retour</button>
</form>
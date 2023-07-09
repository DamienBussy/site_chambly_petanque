<?php require_once "Views/public/joueurs/sousmenuconnect.php" ?>
<style>
    .bodycreatecompte {
        font-family: Arial, sans-serif;
    }

    .h2createcompte {
        text-align: center;
    }

    .formcreatecompte {
        width: 400px;
        margin: 0 auto;
    }

    .labelcreatecompte {
        display: block;
        margin-bottom: 10px;
    }

    .inputcreatecompte[type="text"],
    .inputcreatecompte[type="password"],
    .inputcreatecompte[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .inputcreatecompte[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .inputcreatecompte[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<form class="formcreatecompte" method="POST" action="indexpublic.php?page=jou_createannonce" enctype="multipart/form-data">
    <input type="hidden" id="joueur" name="joueur" value="<?= $_SESSION['joueurs']->getJoueurId() ?>">
    <label class="labelcreatecompte" for="title">Titre :</label>
    <input class="inputcreatecompte" type="text" id="title" name="title" required><br><br>

    <label class="labelcreatecompte" for="date">Date :</label>
    <input class="inputcreatecompte" type="date" id="date" name="date" required><br><br>

    <input class="inputcreatecompte" type="submit" value="Publier l'annonce">
</form>
<?php require_once "Views/public/footer.php" ?>
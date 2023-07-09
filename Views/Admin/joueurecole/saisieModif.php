<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
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

<head>
    <title>Modifier le joueur</title>
</head>
<body class="bodycreatecompte">
<h2 class="h2createcompte">Modifier le joueur</h2>
<form class="formcreatecompte" method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" id="page" name="page" value="jcl_modifier">
    <input type="hidden" id="id_joueurecole" name="id_joueurecole" value="<?= $this->data['id_joueurecole'] ?>">
    <label class="labelcreatecompte" for="joueurecole_nom">Titre :</label>
    <input class="inputcreatecompte" type="text" id="joueurecole_nom" name="joueurecole_nom" value="<?= $this->data['nom'] ?>" required><br><br>

    <label class="labelcreatecompte" for="joueurecole_prenom">Prénom :</label>
    <input class="inputcreatecompte" type="text" id="joueurecole_prenom" name="joueurecole_prenom" value="<?= $this->data['prenom'] ?>" required><br>
    <p>Si vous souhaiter modifier la photo de profil du joueur il faut que vous supprimer le joueur et que vous le recréer avec la nouvelle photo.</p><br><br>

    <input class="inputcreatecompte" type="submit" value="Modifier">
    <?php if(isset($this->data['messageError'])){?>
        <p class="error-message"><?= $this->data['messageError'] ?></p>
    <?php }   ?>
</form>
</body>
</html>
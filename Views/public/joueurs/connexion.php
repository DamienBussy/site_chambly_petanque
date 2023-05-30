<?php require_once "Views/public/joueurs/sousmenubase.php" ?>
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
    <title>Créer mon compte</title>
</head>
<body class="bodycreatecompte">
<h2 class="h2createcompte">Créer un compte</h2>
<form class="formcreatecompte" method="POST" action="indexpublic.php" enctype="multipart/form-data">
    <input type="hidden" id="page" name="page" value="jou_connexion">

    <label class="labelcreatecompte" for="joueur_login">Login:</label>
    <input class="inputcreatecompte" type="text" id="joueur_login" name="joueur_login" required><br><br>

    <label class="labelcreatecompte" for="joueur_password">Mot de passe:</label>
    <input class="inputcreatecompte" type="password" id="joueur_password" name="joueur_password" required><br><br>

    <input class="inputcreatecompte" type="submit" value="Se Connecter">
    <?php if(!is_null($this->data['messageError'])){?>
        <p class="error-message"><?= $this->data['messageError'] ?></p>
    <?php }   ?>
</form>
</body>

<?php require_once "Views/public/footer.php" ?>
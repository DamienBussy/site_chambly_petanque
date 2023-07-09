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
    <title>Créer un sponsor</title>
</head>
<body class="bodycreatecompte">
<h2 class="h2createcompte">Créer un sponsor</h2>
<form class="formcreatecompte" method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" id="page" name="page" value="par_ajouter">
        <label class="labelcreatecompte" for="partner_titre">Titre :</label>
    <input class="inputcreatecompte" type="text" id="partner_titre" name="partner_titre" required><br><br>

    <label class="labelcreatecompte" for="partner_link">Lien vers le site du sponsor :</label>
    <input class="inputcreatecompte" type="text" id="partner_link" name="partner_link" required><br><br>

    <label class="labelcreatecompte" for="partner_picture">Photo :</label>
    <input class="inputcreatecompte" type="file" id="partner_picture" name="partner_picture" accept="image/*" required><br><br>

    <input class="inputcreatecompte" type="submit" value="Créer">
    <?php if(isset($this->data['messageError'])){?>
        <p class="error-message"><?= $this->data['messageError'] ?></p>
    <?php }   ?>
</form>
</body>
</html>
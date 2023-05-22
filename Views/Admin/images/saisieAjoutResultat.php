<link rel="stylesheet" type="text/css" href="./css/style.css">
<?php require_once "Views/Admin/resultats/menuResultatImages.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
<h2>Ajouter une image pour le résultat</h2>
<form method="post" action="index.php" enctype="multipart/form-data">
    <p><input type="hidden" name="page" value="res_ajouterImage"/></p>
    <label for="image_path">Image :</label>
    <input type="file" name="image_path"><br><br>
    <input type="hidden" name="id" value="<?= $this->data['id_resultat'] ?>" ><br><br>
    <input type="submit" value="Ajouter">
    <?php
    if(!empty($this->data['leMessageSucces'])){
        echo '<p class="msg-succes">'.$this->data['leMessageSucces'].'</p>';
    }
    if(!empty($this->data['leMessageError'])){
        echo '<p class="msg-error">'.$this->data['leMessageError'].'</p>';
    }
    ?>
</form>
</body>
</html>

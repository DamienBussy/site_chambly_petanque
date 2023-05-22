<link rel="stylesheet" type="text/css" href="./css/style.css">
<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
    <body>
        <h2>Renouveler les licenciés à partir d'un fichier Exel</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="page" value="lic_renouveler"/>
            <label for="file">Sélectionnez un fichier CSV à uploader :</label>
            <input type="file" name="file" id="file"><br><br>
<!--            <input type="file" name="excel_file" id="excel_file"><br><br>-->
            <input type="submit" name="submit" value="Upload">
        </form>
    </body>
</html>

<?php
if(!empty($this->data['leMessageSucces'])){
    echo '<p class="msg-succes">'.$this->data['leMessageSucces'].'</p>';
}
if(!empty($this->data['leMessageError'])){
    echo '<p class="msg-error">'.$this->data['leMessageError'].'</p>';
} ?>


<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="lic_gestion">Retour</button>
</form>

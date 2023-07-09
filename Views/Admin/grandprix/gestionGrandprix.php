<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>

<?php
if(!is_null($this->data['laAffiche'])){ ?>
    <div class="button-container">
        <form action="index.php" method="post" target="_blank">
            <button class="button-ajout-users button-espace" type="submit" name="page" value="grp_affiche">
                <span>Voir l'affiche</span>
            </button>
        </form>
    </div>
<?php }
else{ ?>
    <p class="msg-error">Aucune Affiche n'est renseignée</p>
<?php }
?>
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
    Sélectionnez un fichier PDF à télécharger :
    <p><input type="hidden" name="page" value="grp_upload" /></p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Enregistrer" name="submit">
</form>
<?php if(!empty($this->data['messsageSucces'])){ ?>
    <p class="msg-succes"><?php echo $this->data['messsageSucces'] ?></p>
<?php } ?>
<?php if(!empty($this->data['messsageError'])){ ?>
    <p class="msg-error"><?php echo $this->data['messsageError'] ?></p>
<?php } ?>

</body>
</html>

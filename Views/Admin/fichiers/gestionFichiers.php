<?php require_once "utils/protection.php";?>
<?php require_once "Views/Admin/menuAdminView.php";?>
<style>
    p.msg-error {
        color: red;
        font-weight: bold;
        margin-top: 10px;
    }
    p.msg-avertissement {
        color: orange;
        font-weight: bold;
        margin-top: 10px;
    }
    p.msg-succes {
        color: green;
        font-weight: bold;
        margin-top: 10px;
    }
</style>
<fieldset>
    <h3>Fichier inscription</h3>
    <?php
    if(!is_null($this->data['leFichierFICHEINSCRIPTION'])){ ?>
        <div class="button-container">
            <form action="index.php" method="post">
                <button class="button-ajout-users button-espace" type="submit" name="page" value="adh_afficherFichierInscription"><span>Voir le fichier</span></button>
            </form>
        </div>
    <?php }
    else{ ?>
        <p class="msg-avertissement">Aucun Fichier n'est renseigné</p>
    <?php } ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Sélectionnez un fichier PDF à télécharger :
        <p><input type="hidden" name="page" value="adh_upload" /></p>
        <input type="hidden" name="id" value="1" />
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    <?php if(isset($this->data['messsageSucces1'])){ ?>
        <p class="msg-succes"><?php echo $this->data['messsageSucces1'] ?></p>
    <?php } ?>
    <?php if(!is_null($this->data['messsageError1'])){ ?>
        <p class="msg-error"><?php echo $this->data['messsageError1'] ?></p>
    <?php } ?>
</fieldset>
<br>
<fieldset>
    <h3>Fichier Autorisation parental</h3>
    <?php if(!is_null($this->data['leFichierAUTORISATIONPARENTAl'])){ ?>
        <div class="button-container">
            <form action="index.php" method="post">
                <button class="button-ajout-users button-espace" type="submit" name="page" value="adh_afficherFichierAutorisationParental"><span>Voir le fichier</span></button>
            </form>
        </div>
    <?php }
    else{ ?>
        <p class="msg-avertissement">Aucun Fichier n'est renseigné</p>
    <?php } ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Sélectionnez un fichier PDF à télécharger :
        <p><input type="hidden" name="page" value="adh_upload" /></p>
        <input type="hidden" name="id" value="2" />
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    <?php if(isset($this->data['messsageSucces2'])){ ?>
        <p class="msg-succes"><?php echo $this->data['messsageSucces2'] ?></p>
    <?php } ?>
    <?php if(!is_null($this->data['messsageError2'])){ ?>
        <p class="msg-error"><?php echo $this->data['messsageError2'] ?></p>
    <?php } ?>
</fieldset>
<br>
<fieldset>
    <h3>Fichier Certificat médical</h3>
    <?php if(!is_null($this->data['leFichierCERTIFICATMEDICAL'])){ ?>
        <div class="button-container">
            <form action="index.php" method="post">
                <button class="button-ajout-users button-espace" type="submit" name="page" value="adh_afficherFichierCertifMedical"><span>Voir le fichier</span></button>
            </form>
        </div>
    <?php }
    else{ ?>
        <p class="msg-avertissement">Aucun Fichier n'est renseigné</p>
    <?php } ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Sélectionnez un fichier PDF à télécharger :
        <p><input type="hidden" name="page" value="adh_upload" /></p>
        <input type="hidden" name="id" value="3" />
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    <?php if(isset($this->data['messsageSucces3'])){ ?>
        <p class="msg-succes"><?php echo $this->data['messsageSucces3'] ?></p>
    <?php } ?>
    <?php if(!is_null($this->data['messsageError3'])){ ?>
        <p class="msg-error"><?php echo $this->data['messsageError3'] ?></p>
    <?php } ?>
</fieldset>
<br>
<fieldset>
    <h3>Fichier Tarif licencié</h3>
    <?php if(!is_null($this->data['leFichierTARIF'])){ ?>
        <div class="button-container">
            <form action="index.php" method="post">
                <button class="button-ajout-users button-espace" type="submit" name="page" value="adh_afficherFichierTarifLicencie"><span>Voir le fichier</span></button>
            </form>
        </div>
    <?php }
    else{ ?>
        <p class="msg-avertissement">Aucun Fichier n'est renseigné</p>
    <?php } ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Sélectionnez un fichier PDF à télécharger :
        <p><input type="hidden" name="page" value="adh_upload" /></p>
        <input type="hidden" name="id" value="4" />
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Enregistrer" name="submit">
    </form>
    <?php if(isset($this->data['messsageSucces4'])){ ?>
        <p class="msg-succes"><?php echo $this->data['messsageSucces4'] ?></p>
    <?php } ?>
    <?php if(!is_null($this->data['messsageError4'])){ ?>
        <p class="msg-error"><?php echo $this->data['messsageError4'] ?></p>
    <?php } ?>
</fieldset>


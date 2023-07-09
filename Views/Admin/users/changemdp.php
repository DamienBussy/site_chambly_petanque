<?php require_once "Views/Admin/menuAdminView.php";?>
<form action="index.php" method="post" id="changePasswordForm" class="form-changemdp">
    <p class="form-p-changermdp"><strong>Mot de passe actuel : </strong><br>
        <input class="form-input-mdp" type="password" name="passwordactuel" maxlength="20" size="20">
    </p>
    <p class="form-p-changermdp">Nouveau mot de passe : <br>
        <input class="form-input-mdp" type="password" name="newpassword" maxlength="20" size="20">
    </p>
    <p class="form-p-changermdp">Confirmer le nouveau mot de passe : <br>
        <input class="form-input-mdp" type="password" name="newpasswordconfirme" maxlength="20" size="20">
    </p>
    <button type="submit" name="page" value="cnx_changePassword" class="form-valider-button" id="submitBtn">
        <span>Valider</span>
    </button>
    <?php
    if(!empty($this->data['leMessage'])){
        echo '<p class="msg-succes">'.$this->data['leMessage'].'</p>';
    }
    if(!empty($this->data['leMessageError'])){
        echo '<p class="msg-error">'.$this->data['leMessageError'].'</p>';
    }
    ?>
    <p><input type="hidden" name="idUserConnect" value="<?= $this->data['idUserConnect'] ?>" /></p>
</form>

<!--<script>-->
<!--    function validatePassword() {-->
<!--        var password = document.getElementsByName("newpassword")[0].value;-->
<!--        var regex = /^(?=.*[0-9])[a-zA-Z0-9]{6,}$/;-->
<!--        if(!regex.test(password)) {-->
<!--            alert("Le mot de passe doit contenir au minimum 6 caractères et au moins un chiffre.");-->
<!--            return false;-->
<!--        }-->
<!--        return true;-->
<!--    }-->
<!---->
<!--    document.getElementById("changePasswordForm").addEventListener("submit", function(event) {-->
<!--        if(!validatePassword()) {-->
<!--            event.preventDefault();-->
<!--        }-->
<!--    });-->
<!--</script>-->

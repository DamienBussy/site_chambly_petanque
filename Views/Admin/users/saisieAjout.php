<link rel="stylesheet" type="text/css" href="./css/users/styleSaisieAjout.css">
<form action="index.php" method="POST">
<!--    <input type="hidden" name="page" value="add_user">-->
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" required>
    <br>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <br>
    <label for="login">Identifiant :</label>
    <input type="text" name="login" required>
    <?php if ($this->data['loginEstDoublon']): ?>
        <p class="error-message">Ce login est déjà utilisé.</p>
    <?php endif; ?>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    <br>
    <label for="statut">Statut :</label>
    <select name="statut" required>
        <option value="Admin">Admin</option>
        <option value="President">Président</option>
    </select>
    <p><input type="hidden" name="page" value="usr_add" size="30" /></p>
    <br>
    <input type="submit" value="Ajouter">
</form>
<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="usr_getAllUsers">Retour</button>
</form>

<link rel="stylesheet" type="text/css" href="./css/users/styleSaisieUpdate.css">
<form action="index.php" method="POST">
    <input type="hidden" name="page" value="usr_update">
    <?php $user = $this->data['leUser']; ?>
    <input type="hidden" name="id" value="<?= $user->getUserId() ?>">
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" value="<?= $user->getUserLastname() ?>" required>
    <br>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" value="<?= $user->getUserFirstName() ?>" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" value="<?= $user->getUserEmail() ?>" required>
    <br>
    <label for="login">Identifiant :</label>
    <input type="text" name="login" value="<?= $user->getUserLogin() ?>" required>
    <?php if ($this->data['loginEstDoublon']): ?>
        <p class="error-message">Ce login est déjà utilisé.</p>
    <?php endif; ?>
    <input type="hidden" name="statut" value="<?= $user->getUserStatut() ?>">
    <br><br>
    <input type="submit" value="Modifier">
</form>
<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="usr_getAllUsers">Retour</button>
</form>


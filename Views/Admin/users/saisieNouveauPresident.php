<link rel="stylesheet" type="text/css" href="./css/style.css">
<form action="index.php" method="POST">
    <input type="hidden" name="page" value="usr_degrader">
    <?php foreach ($this->data['lesAdmin'] as $user): ?>
        <div class="user-row-new-pres">
            <label class="user-liste-new-president user-liste-new-president-effet">
                <input type="radio" name="idNouveau" value="<?= $user->getUserId() ?>">
                <?= $user->getUserLastname() ?> <?= $user->getUserFirstName() ?>
            </label>
        </div>
    <?php endforeach; ?>
    <br>
    <?php
        if($this->data['leMessageError'] != null){
    ?>
            <p><?php echo $this->data['leMessageError']; ?><</p>
    <?php
        }
    ?>
    <br>
    <input class="input-btn-confirmer-new-pres input-btn-confirmer-new-president-effet" type="submit" value="Confirmer">
</form>
<form method="post" action="index.php">
    <button type="submit" name="page" class="btn-back" value="usr_getAllUsers">Retour</button>
</form>

<link rel="stylesheet" type="text/css" href="css/styleErrorConnexion.css">
<p><?php echo $this->data['message']; ?></p>
<hr/>
<div>
    <form action="index.php" method="post">
        <p><input type="hidden" name="page" size="20" value="cnx_pageCnx" /></p>
        <p><input type="submit" value = "Revenir à la page de connexion" /></p>
    </form>
</div>
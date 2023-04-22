<?php
// Si aucune session utilisateur n'est chargé il est impossible de se rendre sur la page
if (!isset($_SESSION['users'])) header("Location: accueil.php");?>
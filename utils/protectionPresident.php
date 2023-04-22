<?php
if (!isset($_SESSION['users'])) if($_SESSION['users']->getUserStatut() == "Président") header("Location: accueil.php");?>
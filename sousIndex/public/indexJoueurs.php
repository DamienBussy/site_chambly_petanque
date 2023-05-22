<?php

use Controllers\Admin\JoueurController;
require_once "Entities/Joueur.php";
use Controllers\Admin\AnnonceController;
require_once "Entities/Annonce.php";
use Controllers\Admin\CommentController;
require_once "Entities/Comment.php";
session_start();
switch ($action){
    case "trouverjoueur":
        require_once "Views/public/joueurs/trouverunjoueur-noncnnecte.php";
    break;
    case "trouverjoueur-connecte":
        require_once "Controllers/Admin/AnnonceController.php";
        $controleur=new AnnonceController();
        $controleur->AfficherToutesLesAnnonces();
    break;
    case "saisiecreateaccount":
        require_once "Views/public/joueurs/createAccount.php";
    break;
    case "createaccount":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->CreateAccount($_POST['joueur_nom'], $_POST['joueur_prenom'],$_POST['joueur_login'],$_POST['joueur_password']);
    break;
    case "saisieconnexion":
        require_once "Views/public/joueurs/connexion.php";
    break;
    case "connexion":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->SeConnecter($_POST['joueur_login'],$_POST['joueur_password']);
    break;
    case "joueurconnecte":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->AfficherTableauBordJoueurConnecte($_GET['session']);
    break;
    case "moncompte":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->AfficherMonCompte($_POST['id']);
    break;
    case "saisiemodifier":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->AfficherSaisieModifierJoueur($_POST['id']);
    break;
    case "modifier":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        if(isset($_POST['image_path_identique'])){
            $controleur->ModifierJoueurSansModifPhoto($_POST['id'],$_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['passwordActuel'], $_POST['password'], $_POST['passwordConfirm']);
        }else{
            $controleur->ModifierJoueur($_POST['id'],$_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['passwordActuel'], $_POST['password'], $_POST['passwordConfirm']);
        }
    break;
    case "deletePhoto":
        require_once "Controllers/Admin/JoueurController.php";
        $controleur=new JoueurController();
        $controleur->SupprimerPhoto($_GET['id']);
    break;

    case "saisiecreateannonce":
        require_once "Views/public/joueurs/createAnnonce.php";
    break;
    case "createannonce":
        require_once "Controllers/Admin/AnnonceController.php";
        $controleur=new AnnonceController();
        $controleur->PublierAnnonce($_POST['title'], $_POST['date'], $_POST['joueur']);
    break;
    case "deleteannonce":
        require_once "Controllers/Admin/AnnonceController.php";
        $controleur=new AnnonceController();
        $controleur->DeleteAnnonce($_GET['idAnnonce']);
    break;
    case "saisieupdateannonce":
        require_once "Controllers/Admin/AnnonceController.php";
        $controleur=new AnnonceController();
        $controleur->SaisieModifierAnnonce($_GET['idAnnonce']);
    break;
    case "updateannonce":
        require_once "Controllers/Admin/AnnonceController.php";
        $controleur=new AnnonceController();
        $controleur->ModifierAnnonce($_GET['idAnnonce'], $_GET['title'], $_GET['date']);
    break;
    case "affichercomments":
        require_once "Controllers/Admin/CommentController.php";
        $controleur=new CommentController();
        $controleur->AfficherCommentsOfAnnonce($_GET['idAnnonce'], $_GET['title']);
    break;

    case "ajoutercomment":
        require_once "Controllers/Admin/CommentController.php";
        $controleur=new CommentController();
        $controleur->PublierComment($_POST['cMessage'], $_POST['idAnnonce'], $_POST['idJoueur'], $_POST['titleAnnonce']);
    break;
}
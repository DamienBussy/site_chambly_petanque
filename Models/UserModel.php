<?php

namespace Models;

use ExceptionConnexion;
use PDO;
use User;
require_once "DatabaseModel.php";
class UserModel extends DatabaseModel
{
    public function GetUsers(){
        $listeUsers=array();
        $this->Connexion();
        $req="select * from users order by user_statut asc"; // Le tri pour afficher le président en premier
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $user){
            $theUser = new User($user['user_id'], $user['user_lastname'], $user['user_firstname'], $user['user_email'], $user['user_login'], $user['user_statut']);
            $listeUsers[] = $theUser;
        }
        $this->Deconnexion();
        return $listeUsers;
    }

    public function GetUser($id){
        $user=null;
        $this->Connexion();
        $req="select * from users where user_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetch();
        if($line){
            $user=new User($line['user_id'], $line['user_lastname'], $line['user_firstname'], $line['user_email'], $line['user_login'], $line['user_statut']);
        }
        $this->Deconnexion();
        return $user;
    }

    public function GetUserByLogin($login){
        $user = null;
        $this->Connexion();
        $req="select * from users where user_login=:login";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':login', $login);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetch();
        if($line){
            $user=new User($line['user_id'], $line['user_lastname'], $line['user_firstname'], $line['user_login'], $line['user_email'], $line['user_statut']);
        }
        $this->Deconnexion();
        return $user;
    }

    public function Ajouter($user, $password){
        // On hash le mode de passe avant de l'insérer en bdd
        $hash=password_hash($password, PASSWORD_BCRYPT);
        $this->Connexion();
        $req="insert into users (user_lastname, user_firstname, user_email, user_login, user_password, user_statut) values (:lastname, :firstname, :email, :login, :password, :statut)";
        $stmt = $this->GetDb()->prepare($req);
        $lastname=$user->getUserLastname();
        $stmt->bindParam(':lastname', $lastname);
        $firstname=$user->getUserFirstname();
        $stmt->bindParam(':firstname', $firstname);
        $email=$user->getUserEmail();
        $stmt->bindParam(':email', $email);
        $login=$user->getUserLogin();
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hash);
        $statut=$user->getUserStatut();
        $stmt->bindParam(':statut', $statut);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($user){
        $this->Connexion();
        $req="update users set user_lastname=:lastname, user_firstname=:firstname, user_email=:email, user_login=:login, user_statut=:statut where user_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        $lastname=$user->getUserLastname();
        $stmt->bindParam(':lastname', $lastname);
        $firstname=$user->getUserFirstname();
        $stmt->bindParam(':firstname', $firstname);
        $email=$user->getUserEmail();
        $stmt->bindParam(':email', $email);
        $login=$user->getUserLogin();
        $stmt->bindParam(':login', $login);
        $statut=$user->getUserStatut();
        $stmt->bindParam(':statut', $statut);
        $id=$user->getUserId();
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function GetHashPassword($login){
        $hash=null;
        $this->Connexion();
        $req="select user_password from users where user_login=:login";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':login', $login);
        $res->execute();
        $ligne=$res->fetch();
        if($ligne){
            $hash=$ligne['user_password'];
        }
        $this->Deconnexion();
        return $hash;
    }

    public function GetHashPasswordById($id){
        $hash=null;
        $this->Connexion();
        $req="select user_password from users where user_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        $ligne=$res->fetch();
        if($ligne){
            $hash=$ligne['user_password'];
        }
        $this->Deconnexion();
        return $hash;
    }

    public function loginEstUnDoublonAjout($login){
        $resultat=false;
        $this->Connexion();
        $req="select user_login from users";
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $loginCurrent){
            if($login == $loginCurrent['user_login']){
                $resultat=true;
                break;
            }
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function loginEstUnDoublonModif($login, $id){
        $resultat=false;
        $this->Connexion();
        $req="select user_login from users where not user_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $loginCurrent){
            if($login == $loginCurrent['user_login']){
                $resultat=true;
            }
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from users where user_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        $this->Deconnexion();
    }

    //Cette fonction permet de reconnaitre si l'users est président, elle sera utilisé pour ne pas supprimer le président
    public function estPresident($id){
        $resultat= true;
        $this->Connexion();
        $req="select user_statut from users where user_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        $line=$res->fetch();
//        die(var_dump($line));
        if($line['user_statut'] == 'Admin'){
            $resultat = false;
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function getIdPresident(){
        $id = 0;
        $this->Connexion();
        $req="select user_id from users where user_statut=:statut";
        $res=$this->GetDb()->prepare($req);
        $president = "Président";
        $res->bindParam(':statut', $president);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetch();
        if($line){
            $id =$line['user_id'];
        }
        $this->Deconnexion();
        return $id;
    }
    public function Degrader($idPresidentCourrant, $idNouveauPresident){
        $this->Connexion();
        $reqPresidentNouveau="update users set user_statut=:statutPresidentNouveau where user_id=:idNouveau";
        $stmtPresidentNouveau = $this->GetDb()->prepare($reqPresidentNouveau);
        $president = "Président";
        $stmtPresidentNouveau->bindParam(':statutPresidentNouveau', $president);
        $stmtPresidentNouveau->bindParam(':idNouveau', $idNouveauPresident);
        $stmtPresidentNouveau->execute();

        $reqPresidentCourrant="update users set user_statut=:statutPresidentCourrant where user_id=:idCourrant";
        $stmtPresidentCourrant = $this->GetDb()->prepare($reqPresidentCourrant);
        $admin = "Admin";
        $stmtPresidentCourrant->bindParam(':statutPresidentCourrant', $admin);
        $stmtPresidentCourrant->bindParam(':idCourrant', $idPresidentCourrant);
        $stmtPresidentCourrant->execute();
        $this->Deconnexion();
    }

    public function ChangerPassword($password, $id){
        $this->Connexion();
        $req="update users set user_password=:password where user_id=:id";
        $stmt = $this->GetDb()->prepare($req);
        // Le password à déja été aché lors de son insertion dans la table confirmation_email
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function ConfirmerByEmail($user_id, $code, $password){
        $hash=password_hash($password, PASSWORD_BCRYPT);
        $this->Connexion();
        // Il ne doit pas y avoir une autre ligne dans la table 'cofirmation_emails' pour que le select dans GetPasswordWithEmail($id) fonctionne
        $reqDelete="delete from confirmation_emails where user_id=:id";
        $stmtDelete=$this->GetDb()->prepare($reqDelete);
        $stmtDelete->bindParam('id', $user_id);
        $stmtDelete->execute();
        // Insertion du code de confirmation dans la base de données
        $req = "INSERT INTO confirmation_emails (user_id, code, expiration_date, password) VALUES (:user_id, :code, :expiration_date, :password)";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam("user_id", $user_id);
        $stmt->bindParam("code", $code);
        $stmt->bindParam("password", $hash);
        $date=date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt->bindParam("expiration_date", $date);

        $stmt->execute();
    }

    public function GetPasswordWithEmail($id){
        $password=null;
        $this->Connexion();
        $req="select password from confirmation_emails where user_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $line=$stmt->fetch();
        if($line){
            $password =$line['password'];
        }
        $this->Deconnexion();
        return $password;
    }

    public function GetConfirmationEmailByUserId($id) {
        $this->Connexion();
        $req = "SELECT * FROM confirmation_emails WHERE user_id = :id";
        $stmt = $this->GetDb()->prepare($req);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $confirmationEmail = $stmt->fetch();
        $this->Deconnexion();
        return $confirmationEmail;
    }

}
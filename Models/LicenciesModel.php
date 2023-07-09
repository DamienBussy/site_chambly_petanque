<?php

namespace Models;
use PDO;
use Licencie;
require_once "Entities/Licencie.php";
require_once "DatabaseModel.php";
class LicenciesModel extends DatabaseModel
{
    public function GetLicencies(){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies order by licencie_nom"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }
    public function GetLicencieByStatut($statut){
        $theLicencie=null;
        $this->Connexion();
        $req="select * from licencies where licencie_statut=:statut order by licencie_nom desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':statut' ,$statut);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
        }
        $this->Deconnexion();
        return $theLicencie;
    }
    public function GetLicenciesByStatut($statut){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where licencie_statut=:statut order by licencie_nom desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':statut' ,$statut);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function GetLicencie($id){
        $theLicencie=null;
        $this->Connexion();
        $req="select * from licencies where licencie_id=:id";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':id', $id);
        $res->execute();
        // On récupère le résultat de la requête
        $licencie=$res->fetch();
        if($licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
        }
        $this->Deconnexion();
        return $theLicencie;
    }

    public function Ajouter($licencie){
        $this->Connexion();
        $req="insert into licencies (licencie_id ,licencie_nom, licencie_prenom, licencie_statut, licencie_categorie, licencie_classe, licencie_photo) values (:id, :nom, :prenom, :statut, :categ, :classe, :photo)";
        $stmt=$this->GetDb()->prepare($req);
        $id = $licencie->getLicencieId();
        $nom = $licencie->getLicencieNom();
        $prenom = $licencie->getLicenciePrenom();
        $statut = $licencie->getLicencieStatut();
        $categ = $licencie->getLicencieCategorie();
        $classe = $licencie->getLicencieClasse();
        $photo = $licencie->getLicenciePhoto();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':categ', $categ);
        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':photo', $photo);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Modifier($idCourant, $licencie){
        $this->Connexion();
        $req="update licencies set licencie_id=:id, licencie_nom=:nom, licencie_prenom=:prenom, licencie_statut=:statut, licencie_categorie=:categ, licencie_classe=:classe, licencie_photo=:photo  where licencie_id=:idCourant";
        $stmt=$this->GetDb()->prepare($req);
        $id = $licencie->getLicencieId();
        $nom = $licencie->getLicencieNom();
        $prenom = $licencie->getLicenciePrenom();
        $statut = $licencie->getLicencieStatut();
        $categ = $licencie->getLicencieCategorie();
        $classe = $licencie->getLicencieClasse();
        $photo = $licencie->getLicenciePhoto();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':categ', $categ);
        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':idCourant', $idCourant);
        $stmt->execute();
        $this->Deconnexion();
    }
    public function ModifierSansModifPhoto($idCourant, $licencie){
        $this->Connexion();
        $req="update licencies set licencie_id=:id, licencie_nom=:nom, licencie_prenom=:prenom, licencie_statut=:statut, licencie_categorie=:categ, licencie_classe=:classe where licencie_id=:idCourant";
        $stmt=$this->GetDb()->prepare($req);
        $id = $licencie->getLicencieId();
        $nom = $licencie->getLicencieNom();
        $prenom = $licencie->getLicenciePrenom();
        $statut = $licencie->getLicencieStatut();
        $categ = $licencie->getLicencieCategorie();
        $classe = $licencie->getLicencieClasse();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':categ', $categ);
        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':idCourant', $idCourant);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function Supprimer($id){
        $this->Connexion();
        $req="delete from licencies where licencie_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function SupprimerPhoto($licencie){
        $this->Connexion();
        $req="update licencies set licencie_photo=:photo  where licencie_id=:id";
        $stmt=$this->GetDb()->prepare($req);
        $id = $licencie->getLicencieId();
        $photo=null;
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->Deconnexion();
    }

    public function RechercheByText($search){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where licencie_id like :search OR licencie_nom like :search OR licencie_prenom like :search";
        $res=$this->GetDb()->prepare($req);
        $param= "%".$search."%";
        $res->bindParam(':search', $param);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextWithSeparate($search) {
        $listeLicencies = array();
        $this->Connexion();

        // Séparation du nom et du prénom
        $searchParts = explode(" ", $search);
        $nom = isset($searchParts[0]) ? $searchParts[0] : "";
        $prenom = isset($searchParts[1]) ? $searchParts[1] : "";
        $req = "SELECT * FROM licencies WHERE (licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $res->bindParam(':nom', $paramNom);
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':prenom', $paramPrenom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $searchParts = explode(" ", $search);
        $nom = isset($searchParts[0]) ? $searchParts[0] : "";
        $prenom = isset($searchParts[1]) ? $searchParts[1] : "";
        $req = "SELECT * FROM licencies WHERE (licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom)";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':nom', $paramPrenom);
        $res->bindParam(':prenom', $paramNom);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercherLicencieByClasse($classe){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where licencie_classe=:classe";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':classe', $classe);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextWithSeparateAndClasse($search, $classe){
        $listeLicencies = array();
        $this->Connexion();

        // Séparation du nom et du prénom
        $searchParts = explode(" ", $search);
        $nom = isset($searchParts[0]) ? $searchParts[0] : "";
        $prenom = isset($searchParts[1]) ? $searchParts[1] : "";

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_classe=:classe";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $res->bindParam(':nom', $paramNom);
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':prenom', $paramPrenom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':classe', $classe);
        $res->execute();
        // Récupération des résultats
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_classe=:classe";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':nom', $paramPrenom);
        $res->bindParam(':prenom', $paramNom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':classe', $classe);
        $res->execute();
        // Récupération des résultats
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextAndClasse($search, $classe){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where (licencie_id like :search OR licencie_nom like :search OR licencie_prenom like :search) AND licencie_classe=:classe";
        $res=$this->GetDb()->prepare($req);
        $param= "%".$search."%";
        $res->bindParam(':search', $param);
        $res->bindParam(':classe', $classe);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercherLicencieByCateg($categ){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where licencie_categorie=:categ";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':categ', $categ);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextWithSeparateAndCateg($search, $categ){
        $listeLicencies = array();
        $this->Connexion();

        // Séparation du nom et du prénom
        $searchParts = explode(" ", $search);
        $nom = isset($searchParts[0]) ? $searchParts[0] : "";
        $prenom = isset($searchParts[1]) ? $searchParts[1] : "";

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_categorie=:categ";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $res->bindParam(':nom', $paramNom);
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':prenom', $paramPrenom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_categorie=:categ";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':nom', $paramPrenom);
        $res->bindParam(':prenom', $paramNom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextAndCateg($search, $categ){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where (licencie_id like :search OR licencie_nom like :search OR licencie_prenom like :search) AND licencie_categorie=:categ";
        $res=$this->GetDb()->prepare($req);
        $param= "%".$search."%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercherLicencieByClasseAndCateg($classe, $categ){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where licencie_categorie=:categ AND licencie_classe=:classe";
        $res=$this->GetDb()->prepare($req);
        $res->bindParam(':classe', $classe);
        $res->bindParam(':categ', $categ);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextWithSeparateAndClasseAndCateg($search, $classe, $categ){
        $listeLicencies = array();
        $this->Connexion();

        // Séparation du nom et du prénom
        $searchParts = explode(" ", $search);
        $nom = isset($searchParts[0]) ? $searchParts[0] : "";
        $prenom = isset($searchParts[1]) ? $searchParts[1] : "";

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_categorie=:categ AND licencie_classe=:classe";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $res->bindParam(':nom', $paramNom);
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':prenom', $paramPrenom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->bindParam(':classe', classe);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $req = "SELECT * FROM licencies WHERE ((licencie_nom LIKE :nom AND licencie_prenom LIKE :prenom) OR licencie_id LIKE :search) AND licencie_categorie=:categ AND licencie_classe=:classe";
        $res = $this->GetDb()->prepare($req);
        $paramNom = "%" . $nom . "%";
        $paramPrenom = "%" . $prenom . "%";
        $res->bindParam(':nom', $paramPrenom);
        $res->bindParam(':prenom', $paramNom);
        $param = "%" . $search . "%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->bindParam(':classe', classe);
        $res->execute();
        $line = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($line as $licencie) {
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }

        $this->Deconnexion();
        return $listeLicencies;
    }

    public function RechercheByTextAndClasseAndCateg($search, $classe, $categ){
        $listeLicencies=array();
        $this->Connexion();
        $req="select * from licencies where (licencie_id like :search OR licencie_nom like :search OR licencie_prenom like :search) AND licencie_categorie=:categ AND licencie_classe=:classe";
        $res=$this->GetDb()->prepare($req);
        $param= "%".$search."%";
        $res->bindParam(':search', $param);
        $res->bindParam(':categ', $categ);
        $res->bindParam(':classe', $classe);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $licencie){
            $theLicencie = new Licencie($licencie['licencie_id'], $licencie['licencie_nom'], $licencie['licencie_prenom'], $licencie['licencie_statut'], $licencie['licencie_categorie'], $licencie['licencie_classe'], $licencie['licencie_photo']);
            $listeLicencies[] = $theLicencie;
        }
        $this->Deconnexion();
        return $listeLicencies;
    }


}
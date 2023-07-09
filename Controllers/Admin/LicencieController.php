<?php

namespace Controllers\Admin;

use Licencie;
use Models\LicenciesModel;

require_once "Models/LicenciesModel.php";
require_once "Controllers/Admin/LogController.php";

class LicencieController
{
    private $data;
    private $licencie_model;
    private $log;

    public function __construct(){
        $this->data=array();
        $this->licencie_model=new LicenciesModel();
        $this->log=new LogController();
    }

    public function AfficherTousLesLicencies(){
        $licencies = $this->licencie_model->GetLicencies();

        $this->data['lesLicencies']=$licencies;

        require_once "Views/Admin/licencies/gestionLicencies.php";
    }

    public function AjouterLicencie($id, $nom, $prenom, $statut, $categ, $classe){
        if($_FILES['image_path']['name'] != ''){
            $image_path = "resources/joueurs/" . $_FILES['image_path']['name'];
        }else{
            $image_path=null;
        }

        $theLicencie=new Licencie($id, $nom, $prenom, $statut, $categ, $classe, $image_path);
        $this->uploadImageLicencie();
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Ajout du licencié : ". $id. ", ". $nom. ", ". $prenom . ", ". $statut. ", ". $categ. ", ". $classe);
        $this->licencie_model->Ajouter($theLicencie);
        $this->AfficherTousLesLicencies();
    }

    public function uploadImageLicencie(){
        if(isset($_FILES['image_path']['name'])) {
            $image_name = $_FILES['image_path']['name'];
            $image_tmp_name = $_FILES['image_path']['tmp_name'];
            $image_path = "resources/joueurs/" . $image_name;

            if(move_uploaded_file($image_tmp_name, $image_path)) {
                // Appel de la fonction AjouterImageForEvent() pour ajouter l'image à la base de données
                $this->data['leMessageSucces']= "L'image a été ajoutée avec succès.";
            }
        }
    }

    public function AfficherSaisieModifierLicencie($id_licencie){
        $theLicencie=$this->licencie_model->GetLicencie($id_licencie);
        $this->data['id']=$id_licencie;
        $this->data['nom']=$theLicencie->getLicencieNom();
        $this->data['prenom']=$theLicencie->getLicenciePrenom();
        $this->data['statut']=$theLicencie->getLicencieStatut();
        $this->data['categ']=$theLicencie->getLicencieCategorie();
        $this->data['classe']=$theLicencie->getLicencieClasse();
        if(is_null($theLicencie->getLicenciePhoto())){
            $this->data['photo']=null;
        } else{
            $this->data['photo']=$theLicencie->getLicenciePhoto();
        }

        require_once "Views/Admin/licencies/saisieModifLicencie.php";
    }

    public function ModifierLicencie($idCourant, $id, $nom, $prenom, $statut, $categ, $classe){
        if($_FILES['image_path']['name'] != ''){
            $image_path = "resources/joueurs/" . $_FILES['image_path']['name'];
        }else{
            $image_path=null;
        }
        $theLicencie=new Licencie($id, $nom, $prenom, $statut, $categ, $classe, $image_path);
        $this->uploadImageLicencie();
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Modification du licencié : ". $id. ", ". $nom. ", ". $prenom . ", ". $statut. ", ". $categ. ", ". $classe);
        $this->licencie_model->Modifier($idCourant, $theLicencie);
        $this->AfficherTousLesLicencies();
    }

    public function ModifierLicencieSansModifPhoto($idCourant, $id, $nom, $prenom, $statut, $categ, $classe){
        $theLicencie=new Licencie($id, $nom, $prenom, $statut, $categ, $classe, null);
        $this->licencie_model->ModifierSansModifPhoto($idCourant, $theLicencie);
        $this->AfficherTousLesLicencies();
    }

    public function SupprimerPhoto($idCourant){
        $theLicencie=$this->licencie_model->GetLicencie($idCourant);
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Suppression de la photo du licencié : ". $theLicencie->getLicenciePrenom(). ", ". $theLicencie->getLicenciePrenom());
        $this->licencie_model->SupprimerPhoto($theLicencie);
        $this->AfficherSaisieModifierLicencie($idCourant);
    }

    public function SupprimerLicencie($id_licencie){
        $theLicencie=$this->licencie_model->GetLicencie($id_licencie);
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Suppression du licencié : ". $theLicencie->getLicenciePrenom(). ", ". $theLicencie->getLicenciePrenom());
        $this->licencie_model->Supprimer($id_licencie);
        $this->AfficherTousLesLicencies();
    }

    public function SaisieUpload(){
        require_once "Views/Admin/licencies/saisieUploadLicencies.php";
    }

    public function RenouvelerLicencies(){
        require_once  "utils/PHPExcel/Classes/PHPExcel/Autoloader.php";
        if(isset($_POST['submit'])){
            $file = $_FILES['file']['name'];
            $temp_file = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];

            $target_dir = "resources/joueurs/csv/";
            $target_file = $target_dir . $file;

            // Vérifiez si le fichier est bien un fichier Excel
            if($file_type == "application/vnd.ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){

                // Vérifiez si le fichier est bien inférieur à 5 Mo
                if($file_size < 5000000){
                    $this->viderRepertoire();

                    // Déplacez le fichier vers le répertoire cible
                    $excel = PHPExcel_IOFactory::load($_FILES['excel_file']['tmp_name']);
                    $writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
                    $csv_file = "uploads/" . basename($_FILES["excel_file"]["name"], $file_type) . "csv";
                    $writer->save($csv_file);
//                    move_uploaded_file($temp_file, $target_file);
                    $this->traiterCsv($csv_file);
                    $this->data['leMessageSucces']= "Le fichier a été téléchargé avec succès.";

                }else{
                    $this->data['leMessageError']= "Le fichier doit être inférieur à 5 Mo.";
                }

            }else{
                $this->data['leMessageError']= "Le fichier doit être un fichier Excel.";
            }
        }
        require_once "Views/Admin/licencies/saisieUploadLicencies.php";
    }

    public function traiterCsv($target_file){


        echo "Excel file has been converted to CSV format and saved in uploads/ folder.";


//        $cpt = 0;
//        if (($handle = fopen($inputFileName, "r")) !== FALSE){
//            while (($arrData = fgetcsv($handle, 0, ";")) !== FALSE){
//                if($cpt == 0){
//                    $cpt = 1;
//                }else{
//                    var_dump($arrData);
//                }
//            }
//        }
    }

    public function viderRepertoire(){
        $directory = 'resources/joueurs/csv/'; // Répertoire à nettoyer

        // Vérifiez si le répertoire existe et est un répertoire
        if (is_dir($directory)) {

            // Ouvrez le répertoire
            if ($dh = opendir($directory)) {

                // Boucle à travers les fichiers dans le répertoire
                while (($file = readdir($dh)) !== false) {

                    // Vérifiez si le fichier est un fichier (et pas un dossier ou "." ou "..")
                    if (is_file($directory . $file)) {

                        // Supprimez le fichier
                        unlink($directory . $file);
                    }
                }

                // Fermez le répertoire
                closedir($dh);
            }
        }
    }


//    ------------------------------------------------------------------ PUBLIC -----------------------------------------------------------

    public function AfficherTousLesLicenciesPublic(){
        $licencies = $this->licencie_model->GetLicencies();

        $this->data['lesLicencies']=$licencies;

        require_once "Views/public/licencies.php";
    }

    public function AfficherCompositionBureauPublic(){
        $this->data['president']=$this->licencie_model->GetLicencieByStatut("Président");
        $this->data['vicepresident']=$this->licencie_model->GetLicencieByStatut("Vice-Président");
        $this->data['sercrgene']=$this->licencie_model->GetLicencieByStatut("Secrétaire Générale");
        $this->data['tresgen']=$this->licencie_model->GetLicencieByStatut("Trésorier Générale");
        $this->data['tresadj']=$this->licencie_model->GetLicencieByStatut("Trésorier Adjointe");
        $this->data['secradj']=$this->licencie_model->GetLicencieByStatut("Secrétaire Adjoint");
        $this->data['dirsport']=$this->licencie_model->GetLicencieByStatut("Directeur Sportif");
        $this->data['dirsportadj']=$this->licencie_model->GetLicencieByStatut("Directeur Sportif Adjoint");
        $this->data['ecole']=$this->licencie_model->GetLicencieByStatut("Initiateur école de pétanque");
        $this->data['veteran']=$this->licencie_model->GetLicencieByStatut("Correspondant Vétérans");
        $this->data['benevoles']=$this->licencie_model->GetLicenciesByStatut("Membre bénévole");

        require_once "Views/public/compobureau.php";
    }

    public function RechercherLicencie($categ, $search, $classe){
        if(empty($categ)){
            if(empty($classe)){
                if(empty($search)){
                    $this->AfficherTousLesLicenciesPublic();
                }
                else{
                    if (strpos($search, " ") !== false) {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextWithSeparate($search);
                    } else {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByText($search);
                    }
                }
            } else{
                if(empty($search)){
                    $this->data['lesLicencies']=$this->licencie_model->RechercherLicencieByClasse($classe);
                }
                else{
                    if (strpos($search, " ") !== false) {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextWithSeparateAndClasse($search, $classe);
                    } else {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextAndClasse($search, $classe);
                    }
                }
            }
        }else{
            if(empty($classe)){
                if(empty($search)){
                    $this->data['lesLicencies']=$this->licencie_model->RechercherLicencieByCateg($categ);
                }
                else{
                    if (strpos($search, " ") !== false) {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextWithSeparateAndCateg($search, $categ);
                    } else {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextAndCateg($search, $categ);
                    }
                }
            } else{
                if(empty($search)){
                    $this->data['lesLicencies']=$this->licencie_model->RechercherLicencieByClasseAndCateg($classe, $categ);
                }
                else{
                    if (strpos($search, " ") !== false) {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextWithSeparateAndClasseAndCateg($search, $classe, $categ);
                    } else {
                        $this->data['lesLicencies']=$this->licencie_model->RechercheByTextAndClasseAndCateg($search, $classe, $categ);
                    }
                }
            }
        }

        require_once "Views/public/licencies.php";
    }

    public function AfficherLicencieDetails($id){
        $this->data['theLicencie']=$this->licencie_model->GetLicencie($id);
        require_once "Views/public/licencieDetails.php";
    }


}
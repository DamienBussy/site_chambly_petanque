<?php

namespace Controllers\Admin;

use Resultat;
use Models\ResultatModel;
use Models\EventModel;
use Models\ImageModel;
require_once "Models/ImageModel.php";
require_once "Models/ResultatModel.php";
require_once "Models/EventModel.php";
require_once "Controllers/Admin/LogController.php";

/**
 * @property array $lesAnnees
 */
class ResultatController
{
    private $data;
    private $resultat_model;
    private $image_model;

    private $event_model;
    private $log;

    public function __construct(){
        $this->data=array();
        $this->resultat_model=new ResultatModel();
        $this->image_model=new ImageModel();
        $this->event_model=new EventModel();
        $this->log=new LogController();
    }

    public function AfficherTousLesResultats(){
        $theResultat = $this->resultat_model->GetResultats();

        $this->data['lesAnnees']=$this->resultat_model->GetAnnees();
        $this->data['lesResultats']=$theResultat;

        $this->data['pathsImagePrincipale']=null;
        // On bind les paths dans les objet Event
        foreach ($theResultat as $res){
            if(!is_null($res->getResultatImagePrincipale())){
                $res->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($res->getResultatImagePrincipale())->getImagePath());
            }
        }

        require_once "Views/Admin/resultats/gestionResultatsView.php";
    }

    public function SupprimerResultat($id){
        $res=$this->resultat_model->GetResultat($id);
        $titre=$res->getResultatTitle();
        $this->resultat_model->Supprimer($id);
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Suppression du résultat : ".$titre);
        header("Location: index.php?page=res_getAllResultats");
    }

    public function AfficherAjoutView(){
        $this->data['eventEstDoublon'] = false;
        require_once "Views/Admin/resultats/saisieAjout.php";
    }

    public function AjouterResultat($resultat_title, $resultat_description, $resultat_date, $event_categorie, $resultat_annee){
        $theResultat = new Resultat(0, $resultat_title, $resultat_description, $resultat_date, null, $event_categorie, $resultat_annee);
        $this->resultat_model->Ajouter($theResultat);
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Ajout du résultat : ".$resultat_title);
        $this->AfficherTousLesResultats();
    }

    public function AfficherSaisieModifierResultat($id){
        $resultat = $this->resultat_model->GetResultat($id);
        $this->data['title']=$resultat->getResultatTitle();
        $this->data['desc']=$resultat->getResultatDescription();
        $this->data['date']=$resultat->getResultatDate();
        $this->data['categ']=$resultat->getResultatCategorie();
        $this->data['annee']=$resultat->getResultatAnnee();

        $this->data['id_resultat']=$id;

        require_once "Views/Admin/resultats/saisieModif.php";
    }

    public function ModifierResultat($id, $resultat_title, $resultat_description, $resultat_date, $resultat_categorie, $resultat_annee){
        $theResultat = new Resultat($id, $resultat_title, $resultat_description, $resultat_date, null, $resultat_categorie, $resultat_annee);
        $this->resultat_model->Modifier($theResultat);
        $this->log->AjouterLogs($_SESSION['users']->getUserEmail(), "Modification du résultat : ".$resultat_title);
        $this->AfficherTousLesResultats();
    }

    public function AfficherGestionImagesView($id){
        $this->data['images']=$this->image_model->getImagesByResultat($id);
        $this->data['id_resultat']=$id;
        require_once "Views/Admin/resultats/gestionImagesResultat.php";
    }

    public function AfficherDeleteImagePrincipale($id){
        $this->data['images']=$this->image_model->getImagesByResultat($id);
        $this->data['id_resultat']=$id;
        $this->data['id_image_principale']=$this->resultat_model->GetImagePrincipale($id);
        require_once "Views/Admin/resultats/deleteImage.php";
    }
    public function SupprimerImage($id, $id_resultat){
        $imgPrincipale = $this->image_model->getIdImagePrincipaleResultatByEventId($id_resultat);
//        var_dump($imgPrincipale);
//        var_dump($id);
        if(!is_null($imgPrincipale)){
            if($imgPrincipale == $id){
                $this->resultat_model->UpdateImagePrincipale(null, $id_resultat);
                $this->data['messageAvertissement']="Vous venez de supprimer votre premiere image.";
            }
        }
        $this->image_model->Supprimer($id);
        $this->AfficherDeleteImagePrincipale($id_resultat);
    }

    public function AfficherUpdateImagePrincipale($id){
        $this->data['images']=$this->image_model->getImagesByResultat($id);
        $this->data['id_resultat']=$id;
        $this->data['id_image_principale']=$this->resultat_model->GetImagePrincipale($id);
        require_once "Views/Admin/resultats/changeImagePrincipale.php";
    }
    public function UpdateImagePrincipale($id, $id_resultat){
        $this->resultat_model->UpdateImagePrincipale($id, $id_resultat);
        $this->AfficherGestionImagesView($id_resultat);
    }

//    ------------------------------------------------------- PUBLIC ---------------------------------------------------

    public function AfficherResultatsPublic(){
        $resultats=$this->resultat_model->GetResultats();

        $resultats_par_annee_et_categorie = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            if($res->getResultatCategorie() > 4){
                $annee = $res->getResultatAnnee();
                $categorie = $res->getResultatCategorie();
                if (!isset($resultats_par_annee_et_categorie[$annee])){
                    $resultats_par_annee_et_categorie[$annee] = [];
                    $this->lesAnnees[] = $annee;
                }
                if (!isset($resultats_par_annee_et_categorie[$annee][$categorie])) {
                    $resultats_par_annee_et_categorie[$annee][$categorie] = [];
                }
                // Ajouter le résultat à l'élément approprié du tableau associatif
                $resultats_par_annee_et_categorie[$annee][$categorie][] = $res;

                if(!is_null($res->getResultatImagePrincipale())){
                    $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
                }
            }

        }
        $this->data['lesAnnees']=$this->lesAnnees;
        $this->data['lesResultats']=$resultats_par_annee_et_categorie;
        require_once "Views/public/resultats.php";
    }


    public function AfficherResultatsCPFJPPublic(){
        $resultats=$this->resultat_model->GetResultatsByCategorie(2);

        $resultats_par_annee = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            $annee = $res->getResultatAnnee();
            if (!isset($resultats_par_annee[$annee])){
                $resultats_par_annee[$annee] = [];
            }
            // Ajouter le résultat à l'élément approprié du tableau associatif
            $resultats_par_annee[$annee][] = $res;

            if(!is_null($res->getResultatImagePrincipale())){
                $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
            }
        }
        $events = $this->event_model->GetEventFuturByCategorie(2);
        foreach ($events as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }
        $this->data['lesEvents']=$events;
        $this->data['lesResultats']=$resultats_par_annee;
        require_once "Views/public/cpfJeuProv.php";
    }

    public function AfficherResultatsCPFPetanquePublic(){
        $resultats=$this->resultat_model->GetResultatsByCategorie(1);

        $resultats_par_annee = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            $annee = $res->getResultatAnnee();
            if (!isset($resultats_par_annee[$annee])){
                $resultats_par_annee[$annee] = [];
            }
            // Ajouter le résultat à l'élément approprié du tableau associatif
            $resultats_par_annee[$annee][] = $res;

            if(!is_null($res->getResultatImagePrincipale())){
                $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
            }
        }
        $events = $this->event_model->GetEventFuturByCategorie(1);
        foreach ($events as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }
        $this->data['lesEvents']=$events;
        $this->data['lesResultats']=$resultats_par_annee;
        require_once "Views/public/cpfPetanque.php";
    }
    public function AfficherResultatsChampClubPetanquePublic(){
        $resultats=$this->resultat_model->GetResultatsByCategorie(3);

        $resultats_par_annee = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            $annee = $res->getResultatAnnee();
            if (!isset($resultats_par_annee[$annee])){
                $resultats_par_annee[$annee] = [];
            }
            // Ajouter le résultat à l'élément approprié du tableau associatif
            $resultats_par_annee[$annee][] = $res;

            if(!is_null($res->getResultatImagePrincipale())){
                $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
            }
        }
        $events = $this->event_model->GetEventFuturByCategorie(3);
        foreach ($events as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }
        $this->data['lesEvents']=$events;
        $this->data['lesResultats']=$resultats_par_annee;
        require_once "Views/public/champClubPetanque.php";
    }

    public function AfficherResultatsChampClubJPPublic(){
        $resultats=$this->resultat_model->GetResultatsByCategorie(4);

        $resultats_par_annee = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            $annee = $res->getResultatAnnee();
            if (!isset($resultats_par_annee[$annee])){
                $resultats_par_annee[$annee] = [];
            }
            // Ajouter le résultat à l'élément approprié du tableau associatif
            $resultats_par_annee[$annee][] = $res;

            if(!is_null($res->getResultatImagePrincipale())){
                $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
            }
        }
        $events = $this->event_model->GetEventFuturByCategorie(4);
        foreach ($events as $evt){
            if(!is_null($evt->getEventImagePrincipale())){
                $evt->setPathImagePrincipale($this->image_model->getImagePrincipaleEvent($evt->getEventImagePrincipale())->getImagePath());
            }
        }
        $this->data['lesEvents']=$events;
        $this->data['lesResultats']=$resultats_par_annee;
        require_once "Views/public/champClubJP.php";
    }

    public function AfficherResultatDetailsPublic($id){
        $resultat=$this->resultat_model->GetResultat($id);
        if(!is_null($resultat->getResultatImagePrincipale())){
            $resultat->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($resultat->getResultatImagePrincipale())->getImagePath());
        }
        $this->data['images']=$this->image_model->getImagesByResultat($id);
        $this->data['leResultat']=$resultat;
        require_once "Views/public/resultatdetails.php";
    }

    public function AfficherResultatRecherchePublic($categ, $annee, $souscateg){
        if(empty($categ)){
            if(empty($souscateg)){
                $categorie=null;
            } else{
                if($souscateg==1){
                    $categorie=[12, 5];
                }
                elseif ($souscateg==2){
                    $categorie=[6, 8, 10];
                }
                else{
                    $categorie=[7, 9, 11];
                }
            }
        }
        elseif ($categ==5){
            if($souscateg == 1){
                $categorie = [5];
            }
            elseif ($souscateg==2){
                $categorie = array(6, 8);
            }
            elseif ($souscateg==3){
                $categorie=[7, 9];
            }
            else{
                $categorie=[5, 6, 7, 8, 9];
            }
        }
        elseif ($categ==10){
            if($souscateg==2){
                $categorie=[10];
            }
            elseif ($souscateg==3){
                $categorie=[11];
            }
            else{
                $categorie=[10, 11];
            }
        }
        else{
            $categorie=[$categ];
        }

        if(empty($annee)){
            $anneeParam=null;
        }else{
            $anneeParam=$annee;
        }
        $resultats = $this->resultat_model->Recherche($categorie, $anneeParam);
        $resultats_par_annee_et_categorie = [];

        // On bind les paths dans les objet Event
        foreach ($resultats as $res){
            if($res->getResultatCategorie() > 4){
                $annee = $res->getResultatAnnee();
                $categorie = $res->getResultatCategorie();
                if (!isset($resultats_par_annee_et_categorie[$annee])){
                    $resultats_par_annee_et_categorie[$annee] = [];
                    $this->lesAnnees[] = $annee;
                }
                if (!isset($resultats_par_annee_et_categorie[$annee][$categorie])) {
                    $resultats_par_annee_et_categorie[$annee][$categorie] = [];
                }
                // Ajouter le résultat à l'élément approprié du tableau associatif
                $resultats_par_annee_et_categorie[$annee][$categorie][] = $res;

                if(!is_null($res->getResultatImagePrincipale())){
                    $res->setPathImagePrincipale($this->image_model->getImagePrincipaleResultat($res->getResultatImagePrincipale())->getImagePath());
                }
            }

        }

        $resultats_arr_annee=$this->resultat_model->GetResultats();
        $resultats_par_annee = [];
        $lesAnnees=array();
        // On bind les paths dans les objet Event
        foreach ($resultats_arr_annee as $res){
            if($res->getResultatCategorie() > 4){
                $annee = $res->getResultatAnnee();
                if (!isset($resultats_par_annee[$annee])){
                    $resultats_par_annee[$annee] = [];
                    $lesAnnees[] = $annee;
                }
                $resultats_par_annee[$annee][] =$res;
            }

        }
        $this->data['lesAnnees']=$lesAnnees;
        $this->data['lesResultats']=$resultats_par_annee_et_categorie;
        require_once "Views/public/resultats.php";
    }


}
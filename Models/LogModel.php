<?php

namespace Models;
use PDO;
use Log;
require_once "Entities/Log.php";
require_once "DatabaseModel.php";
class LogModel extends DatabaseModel
{
    public function GetLogs(){
        $listeLogs=array();
        $this->Connexion();
        $req="select * from logs order by log_dateHeure desc"; // Le tri : du plus récent au plus ancien
        $res=$this->GetDb()->prepare($req);
        $res->execute();
        // On récupère le résultat de la requête
        $line=$res->fetchAll(PDO::FETCH_ASSOC);
        foreach($line as $log){
            $theLog = new Log($log['log_id'], $log['log_dateHeure'], $log['log_admin'], $log['log_title']);
            $listeLogs[] = $theLog;
        }
        $this->Deconnexion();
        return $listeLogs;
    }

    public function Ajouter($log){
        $this->Connexion();
        $req="insert into logs (log_dateHeure, log_admin, log_title) values (:dateHeure, :admin, :title)";
        $stmt=$this->GetDb()->prepare($req);
        $dateHeure = $log->getLogDateHeure();
        $dateHeure = $dateHeure->format('Y-m-d H:i:s');
        $admin = $log->getLogAdmin();
        $title = $log->getLogTitle();
        $stmt->bindParam(':dateHeure', $dateHeure);
        $stmt->bindParam(':admin', $admin);
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $this->Deconnexion();
    }
}
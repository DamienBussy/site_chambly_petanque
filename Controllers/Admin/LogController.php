<?php

namespace Controllers\Admin;
use DateTime;
use Log;
use Models\LogModel;

require_once "Models/LogModel.php";
class LogController
{
    private $data;
    private $log_model;

    public function __construct(){
        $this->data=array();
        $this->log_model=new LogModel();
    }

    public function AfficherTousLesLogs(){
        $logs = $this->log_model->GetLogs();

        $this->data['lesLogs']=$logs;

        require_once "Views/Admin/logs/logs.php";
    }

    public function AjouterLogs($admin, $title){
        $date=new DateTime();
        $log = new Log(0, $date, $admin, $title);

        $this->log_model->Ajouter($log);
    }
}
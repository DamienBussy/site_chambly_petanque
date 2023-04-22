<?php

namespace Models;

use PDO;
use PDOException;

class DatabaseModel
{
    private $db;
    public function Connexion(){
//        $conn = "mysql:host=127.0.0.1;port=3306;dbname=chambly_petanque;charset=utf8";
//        $this->db=new PDO($conn, "root", "");
//        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=chambly_petanque", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Si la connexion réussit, on peut exécuter des requêtes SQL en utilisant la variable $pdo
        } catch (PDOException $e) {
            // Si la connexion échoue, on affiche un message d'erreur
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }
    public function GetDb(){
        return $this->db;
    }
    public function Deconnexion(){
        $this->db=null;
    }
    public function DernierId()
    {
        return $this->db->lastInsertId();
    }
}
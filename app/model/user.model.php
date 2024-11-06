<?php

require_once './config.php'; 
require_once './app/models/DB.Model.php';

class UserModel {
    private $db;

    function connect(){
        $dbModel = new DBModel();
        $this->db = $dbModel->db; 
    }
 
    function getUser($usuario) {   
        $this->connect(); 
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuario]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}
<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){

    }
    function recup(){ 
        return $this->query("SELECT * FROM `user` WHERE id = ".$_SESSION['user']['id']);
    }
 
}
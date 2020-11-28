<?php
namespace App\Model;
use Core\Database;

class recupModel extends Database{
    function recup(){ 
            return $this->query("SELECT * FROM `user` WHERE id = ".$_SESSION['user']['id']);
    }
}
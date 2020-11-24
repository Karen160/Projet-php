<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        if(!isset($_SESSION['connect'])){
            $_SESSION['connect'] = false;
        }
        
      
    }
}
<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        var_dump($_SESSION);
    }
}
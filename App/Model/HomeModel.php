<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        return $sond = $this->query("SELECT question, pseudo, image, date_fin FROM user INNER JOIN question WHERE date_fin >= CURDATE() AND id = user_id_author ORDER BY date_fin ASC");
        return $sondPerso = $this->query("SELECT question, image, date_fin FROM user INNER JOIN question WHERE date_fin >= CURDATE() AND $membre_id = id = user_id_author");    
    }
}
<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
       return $allSondage = $this->query(" SELECT q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() ORDER BY date_fin ASC limit 3");
    }
    function homeConnect(){
        $membre_id = $_SESSION['user']['id'];
        $sond = $this->query(" SELECT q.`question_id` q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() ORDER BY date_fin ASC");
        
        $sondPerso = $this->query("SELECT question, image, date_fin FROM question WHERE date_fin >= CURDATE() and `user_id_author` = '$membre_id' ");    
        return $requete = array($sond, $sondPerso);
    }
}
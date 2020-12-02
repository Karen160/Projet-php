<?php namespace App\Model;
use Core\Database;

class ResultModel extends Database {
    function resultat(){
        $this->pdo->exec('SET time_zone = "+01:00"');
        $membre_id = $_SESSION['user']['id'];
        $sondFin = $this->query(" SELECT q.`question_id`, q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin < NOW() AND q.`user_id_author` <> ' $membre_id'  ORDER BY date_fin ASC");
        
        $sondPersoFin = $this->query("SELECT question, `image`, date_fin FROM question WHERE date_fin < CURDATE() and `user_id_author` = '$membre_id' ");   
       return array($sondFin, $sondPersoFin);
    }   
}
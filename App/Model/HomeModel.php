<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
        $_SESSION['connect'] == true;
       return $allSondage = $this->query(" SELECT q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() ORDER BY date_fin ASC limit 3");
    }
    function homeConnect(){
        $membre_id = $_SESSION['user']['id'];
        $sond = $this->query(" SELECT q.`question_id`, q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() AND q.`user_id_author` <> ' $membre_id'  ORDER BY date_fin ASC");
        
        $sondPerso = $this->query("SELECT question, `image`, date_fin FROM question WHERE date_fin >= CURDATE() and `user_id_author` = '$membre_id' "); 
        
        $sondFin = $this->query(" SELECT q.`question_id`, q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin < CURDATE() AND q.`user_id_author` <> ' $membre_id'  ORDER BY date_fin ASC");
        
        $sondPersoFin = $this->query("SELECT question, `image`, date_fin FROM question WHERE date_fin < CURDATE() and `user_id_author` = '$membre_id' ");   
       
        return $requete = array($sond, $sondPerso, $sondFin, $sondPersoFin);
    }

    function statut(){
        if($_SESSION['connect'])
        {
            $co =$this->pdo->prepare("UPDATE user SET statut= 1 WHERE id =" . $_SESSION['user']['id']);
            $co->execute();
        }
        else
        {
            $co =$this->pdo->prepare("UPDATE user SET statut = 0 WHERE id =" . $_SESSION['user']['id']);
            $co->execute();
        }

        return $co;
    }
    
}   
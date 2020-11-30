<?php namespace App\Model;
use Core\Database;

class FriendModel extends Database {
    function friend() {
        $msg="";
        if( !empty($_POST['recherche'])) {
            $recherche=htmlspecialchars($_POST['recherche']);
            $searchresult=$this->pdo->query("SELECT pseudo FROM user WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY id DESC ");
        }
        $idUser=$_SESSION['user']['id'];
        $colA=$this->pdo->query("SELECT u.`pseudo` as pseudo, f.`user_id_A` as id FROM friend as f INNER JOIN user as u  on f.`user_id_A` = u.`id` WHERE f.`user_id_B` = '$idUser'");
        $colB=$this->pdo->query("SELECT u.`pseudo` as pseudo, f.`user_id_B` as id FROM friend as f INNER JOIN user as u  on f.`user_id_B` = u.`id` WHERE f.`user_id_A` = '$idUser'");

        if($colA->rowCount()==1 || $colB->rowCount()==1) {
            $colA=$colA->fetchAll(\PDO::FETCH_ASSOC);
            $colB=$colB->fetchAll(\PDO::FETCH_ASSOC);
           
        }else {
            $msg="vous n'avez aucun amis";
        }


      
        return $var = array($msg, $colA, $colB);
        
    }
}
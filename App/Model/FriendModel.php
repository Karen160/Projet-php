<?php
namespace App\Model;
use Core\Database;

class FriendModel extends Database{
    function friend(){

        $idUser=$_SESSION['user']['id'];
        $colA=$this->pdo->query("SELECT user_id_A FROM friend WHERE user_id_B = '$idUser'");
        $colB=$this->pdo->query("SELECT user_id_B FROM friend WHERE user_id_A = '$idUser'");

        if($colA->rowCount()==1 || $colB->rowCount()==1) {
            var_dump($colA);
            var_dump($colB);
        }else{
            $msg = "vous n'avez aucun amis";
        }


    if(!empty($_POST['recherche'])) {     
        $recherche = htmlspecialchars($_POST['recherche']);
        $searchresult = $this->pdo->query("SELECT pseudo FROM user WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY id DESC ");
    }
    }
}
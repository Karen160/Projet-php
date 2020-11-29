<?php namespace App\Model;
use Core\Database;

class NewFriendModel extends Database {
    function friend() {

        $Result=$this->query("SELECT pseudo FROM user WHERE id <>".$_SESSION['user']['id']);
        $msg="";

        if(isset($_POST['button'])) {
            if( !empty($_POST['recherche'])) {
                $recherche=htmlspecialchars(trim($_POST['recherche']));
                $Result=$this->query("SELECT pseudo FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");
                $rowCount = $this->pdo->query("SELECT pseudo FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");
                if( $rowCount->rowCount() < 1) {
                    $msg='0 amis pour toi magueule';
                }
            }
        }
        return $var = array($Result, $msg);
    }
}
<?php namespace App\Model;
use Core\Database;

class NewFriendModel extends Database {
    function NewFriend() {

        $Result=$this->query("SELECT * FROM user WHERE id <>".$_SESSION['user']['id']);
        $msg="";

        if(isset($_POST['button'])) {
            if( !empty($_POST['recherche'])) {
                $recherche=htmlspecialchars(trim($_POST['recherche']));
                $Result=$this->query("SELECT * FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");
                $rowCount = $this->pdo->query("SELECT * FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");
                if( $rowCount->rowCount() < 1) {
                    $msg='0 amis pour toi magueule';
                }
            }
        }
        if(isset($_GET['id'])) {
        $test = $_GET['id'];
        $idB = $_GET['id'];
        $idA = $_SESSION['user']['id'];

        $FriendAdd =$this->pdo->prepare("INSERT INTO friend (user_id_A, user_id_B) VALUES ('$idA', '$idB')");
        $FriendAdd->execute();
        }else{
            $idA = $_SESSION['user']['id'];
            $test = 8;
            $idB = NULL;
        }
        return $var = array($Result, $msg, $test, $idA, $idB);

    }


    
}
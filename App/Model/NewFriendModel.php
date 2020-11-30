<?php namespace App\Model;
use Core\Database;

class NewFriendModel extends Database {
    function NewFriend() {

        $Result=$this->query("SELECT * FROM user WHERE id <>".$_SESSION['user']['id']);
        $msg="";
        $msg2="";

        if(isset($_POST['button'])) {
            if( !empty($_POST['recherche'])) {
                $recherche=htmlspecialchars(trim($_POST['recherche']));
                $Result=$this->query("SELECT * FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");
                $rowCount=$this->pdo->query("SELECT * FROM user WHERE pseudo LIKE '$recherche%' ORDER BY id DESC ");

                if($rowCount->rowCount() < 1) {
                    $msg='0 amis pour toi magueule';
                }
            }
        }

        if(isset($_GET['id'])) {
            $idFriend=$_GET['id'];
            $idUser=$_SESSION['user']['id'];
            //verif présence amis dans col A 
            $colA=$this->pdo->query("SELECT user_id_A FROM friend where user_id_A = '$idFriend'  AND user_id_B = '$idUser' ");
            $colB=$this->pdo->query("SELECT user_id_B FROM friend where user_id_A = '$idUser'  AND user_id_B = '$idFriend' ");

            if($colA->rowCount()==0 && $colB->rowCount()==0) {
                $FriendAdd=$this->pdo->prepare("INSERT INTO friend (user_id_A, user_id_B) VALUES ('$idUser', '$idFriend')");
                $FriendAdd->execute();
            }

            else {
               $msg2 = 'vous êtes déjà amis';
            }


        }

        return $var=array($Result, $msg, $msg2);

    }



}
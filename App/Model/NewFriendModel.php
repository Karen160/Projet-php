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

        return $var = array($Result, $msg);

        if(isset($_POST['add'])) {
            $idA = $_SESSION['user']['id'];
            $idB = $_GET['id'];
            $FriendAdd =$this->pdo->prepare("INSERT INTO friend (user_id_A, user_id_B) VALUES ('$idA', '$idB')");
            $FriendAdd->execute();
            // var_dump($idA);  
            // var_dump($idB);
            // var_dump($FriendAdd); 
            var_dump($_GET['id']);

            
        }

        

    }


    
}
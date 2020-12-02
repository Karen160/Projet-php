<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){

    }
    function recup(){ 
    $id = $_SESSION['user']['id'];
    $user =  $this->query("SELECT * FROM `user` WHERE id = '$id'");
    $friend =  $this->query("SELECT count(friend_id) as nb_ami from friend where user_id_A ='$id' OR user_id_B = '$id'");
    $sondage = $this->query("SELECT count(friend_id) as nb_ami from friend where user_id_A = '$id' OR user_id_B = '$id'");
    return array($user,$friend,$sondage);
    }
}
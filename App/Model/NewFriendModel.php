<?php
namespace App\Model;
use Core\Database;

class NewFriendModel extends Database{
    function friend(){

    $Result = $this->pdo->query("SELECT pseudo FROM user WHERE id <>".$_SESSION['user']['id']);
    // if(!empty($_POST['recherche'])) {     
    //     $recherche = htmlspecialchars($_POST['recherche']);
    //     $Result = $this->pdo->query("SELECT pseudo FROM user WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY id DESC ");
    // }
    
    // $bdd = $this->pdo->query("SELECT pseudo FROM user WHERE id <>".$_SESSION['user']['id']);
    return $Result;
}
}
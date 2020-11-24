<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){
        if(!isset($_SESSION['user'])) {
            // si c'est vide ou ça n'existe pas, alors l'utilisateur n'est pas connecté, on le redirige vers la page connexion
            header('location:index.php?page=sign');
        }
    }
}
<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){
        if(empty($_SESSION['membre'])) {
            // si c'est vide ou ça n'existe pas, alors l'utilisateur n'est pas connecté, on le redirige vers la page connexion
            header('location:signView.php');
            }
            
            $id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
            $afficher_profil = $this->pdo->query("SELECT * FROM membre WHERE id = $id");
            $afficher = $afficher_profil->fetch(\PDO::FETCH_ASSOC);
    }
     
}
<?php
namespace App\Model;
use Core\Database;

class ProfilModel extends Database{ 
    function profil(){
        if(!isset($_SESSION['user'])) {
            // si c'est vide ou ça n'existe pas, alors l'utilisateur n'est pas connecté, on le redirige vers la page connexion
            header('location:index.php?page=sign');
            }
            
            $id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
            // $afficher_profil = $this->pdo->query("SELECT * FROM membre WHERE id = $id");
            // $afficher = $afficher_profil->fetch(\PDO::FETCH_ASSOC);
            // $_SESSION['user']['id'] = $afficher['id'];
            // $_SESSION['user']['nom'] = $afficher['nom'];
            // $_SESSION['user']['prenom'] = $afficher['prenom'];
            // $_SESSION['user']['email'] = $afficher['email'];
            // $_SESSION['user']['pseudo'] = $afficher['pseudo'];
    }
     
}
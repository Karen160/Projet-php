<?php
namespace App\Model;
use Core\Database;

class ProfilModifModel extends Database{
function modifier(){


        $id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
        $afficher_profil = $this->pdo->query("SELECT * FROM membre WHERE id = $id");
        $afficher = $afficher_profil->fetch(\PDO::FETCH_ASSOC); 

    $msg = "";

    if(isset($_POST['bouton'])){
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {

        $mdp = trim($_POST['mdp']);
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $prenom = trim($_POST['prenom']);
        $nom = trim($_POST['nom']);
        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);

        $enregistrement = $this->pdo->prepare("UPDATE membre SET nom = :nom , prenom = :prenom, email = :email, mdp = :mdp, pseudo = :pseudo WHERE id = $id");
        
        $enregistrement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
        $enregistrement->bindParam(':email', $email, \PDO::PARAM_STR);
        $enregistrement->bindParam(':mdp', $mdp, \PDO::PARAM_STR);
        $enregistrement->execute();
        //rediriger
        header("refresh:0.5;url=profilView.php");
    } else {
        $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Veuiller remplir tous les champs</div>";
    }
    }
        }
    }

?>
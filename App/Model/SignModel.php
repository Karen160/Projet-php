<?php
namespace App\Model;
use Core\Database;

class SignModel extends Database{ 
    function inscription(){
        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
            $pseudo = trim($_POST['pseudo']);
            $recup_infos = $this->pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
            // on vérifie si le pseudo n'existe pas dans la BDD
            $email = trim($_POST['email']);
            $recup_infos = $this->pdo->query("SELECT * FROM membre WHERE email = '$email'");
            // // on vérifie si l'email n'existe pas dans la BDD
            if($recup_infos->rowCount() < 1) {
              $mdp = trim($_POST['mdp']);
              $mdp = password_hash($mdp, PASSWORD_DEFAULT);
              $prenom = trim($_POST['prenom']);
              $nom = trim($_POST['nom']);
        
          
              $enregistrement = $this->pdo->prepare("INSERT INTO membre (nom, prenom, pseudo, email, mdp) VALUES (?,?,?,?,?)");
              // on fourni les valeurs des marqueurs nominatifs
              $enregistrement->bindParam(':nom', $nom, \PDO::PARAM_STR);
              $enregistrement->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
              $enregistrement->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
              $enregistrement->bindParam(':email', $email, \PDO::PARAM_STR);
              $enregistrement->bindParam(':mdp', $mdp, \PDO::PARAM_STR);
            //   $enregistrement->execute(array($nom,$prenom,$pseudo,$email,$mdp));
              //rediriger au bout de x sec
              header("refresh:3;url=../../App/View/profilView.php");
          }
        }
    }
}
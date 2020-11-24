<?php
namespace App\Model;
use Core\Database;

class SignModel extends Database{ 
  function inscription(){    

    $msg = "";

    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
      $pseudo = trim($_POST['pseudo']);
      $recup_infos = $this->pdo->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
      // on vérifie si le pseudo n'existe pas dans la BDD
      $email = trim($_POST['email']);
      $recup_infos = $this->pdo->query("SELECT * FROM user WHERE email = '$email'");
      // // on vérifie si l'email n'existe pas dans la BDD
      if($recup_infos->rowCount() < 1) {
        $mdp = trim($_POST['mdp']);
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $prenom = trim($_POST['prenom']);
        $nom = trim($_POST['nom']);

    
        $enregistrement = $this->pdo->prepare("INSERT INTO user (nom, prenom, pseudo, email, mdp) VALUES (:nom, :prenom, :pseudo, :email, :mdp)");
        // on fourni les valeurs des marqueurs nominatifs
        $enregistrement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
        $enregistrement->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
        $enregistrement->bindParam(':email', $email, \PDO::PARAM_STR);
        $enregistrement->bindParam(':mdp', $mdp, \PDO::PARAM_STR);
        $enregistrement->execute();
        $_SESSION['connect'] = true;
        $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; color: white; text-align: center;'>Félicitation votre compte a été crée<br>Connecter-vous</div>";
        return;
      }else{
          $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Le pseudo/email existe déjà<br>Veuillez recommencer</div>";
         echo $msg;
         return;
        }
      header("refresh:0.5;url=?page=profil");
    }
  }
function connexion(){ 
    $msgCo = "";

    if(isset($_POST['pseudoCo']) && isset($_POST['mdpCo'])) {

      $pseudoCo = $_POST['pseudoCo'];
      $mdpCo = $_POST['mdpCo'];

      // on interroge la BDD pour récupérer les informations de l'utilisateur sur la base de son pseudo
      $recup_infosCo = $this->pdo->query("SELECT * FROM user WHERE pseudo = '$pseudoCo'");

      // on vérifie si on a récupéré une ligne.
      if($recup_infosCo->rowCount() > 0) {
        // le pseudo est bon

        // on vérifie le mdp avec un fetch
        $infos_membre = $recup_infosCo->fetch(\PDO::FETCH_ASSOC);
        if(password_verify($mdpCo, $infos_membre['mdp'])) {
          // le mdp est bon
          // Pour la connexion, on place les informations de l'utilisateur sauf son mdp dans la session pour pouvoir intéroger la session par la suite.
          $_SESSION['user']['id'] = $infos_membre['id'];
          $_SESSION['user']['nom'] = $infos_membre['nom'];
          $_SESSION['user']['prenom'] = $infos_membre['prenom'];
          $_SESSION['user']['email'] = $infos_membre['email'];
          $_SESSION['user']['pseudo'] = $infos_membre['pseudo'];
          $_SESSION['connect'] = true;
          $msgCo = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; color: white; text-align: center;'>Bienvenue <br> $pseudoCo </div>";
          //rediriger au bout de 2 sec
          header("refresh:0.5;url=?page=profil");
        } else {
          //mdp incorrect
          $msgCo = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; color: white; text-align: center;'>Mdp incorrect,<br>Veuillez recommencer</div>";
          return;
        }
      } else {
        // pseudo incorrect
        $msgCo = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Pseudo incorrect,<br>Veuillez recommencer</div>";
        return;
      }
    }
  }
}
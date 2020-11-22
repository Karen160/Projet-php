<?php
namespace App\Model;
use Core\Database;


<<<<<<< HEAD
class SignModel  extends Database{ 
    function inscription(){
        if(isset($_POST['valid'])){
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mdp = $_POST['mdp'];
            if(!empty($pseudo) && !empty($email) && !empty($nom) && !empty($prenom) && !empty($mdp)){
                $pseudo = trim($_POST['pseudo']);
                $email = trim($_POST['email']);

                $recup_pseudo = $this->pdo->prepare("SELECT Pseudo FROM user WHERE pseudo = ?");
                $recup_pseudo->execute(array($pseudo));

                $recup_email = $this->pdo->prepare("SELECT Email FROM user WHERE email = ?");
                $recup_email->execute(array($email));
                if($recup_pseudo->rowCount() < 1 ) {
                    if($recup_email->rowCount() <1){
                        $mdp = trim($_POST['mdp']);
                        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                        $prenom = trim($_POST['prenom']);
                        $nom = trim($_POST['nom']);
                        $statement = $this->pdo->prepare("INSERT INTO user ('Nom','Prenom','Pseudo','Email','mdp' VALUES (?,?,?,?,?);");
                        $statement->execute(array($nom,$prenom,$pseudo,$email,$mdp));
                    }else{
                        echo ('email déjà utilisé');
                    }
                }else{
                    echo ('pseudo déjà utilisé');
                }
            }else{
                echo ('un champs n\'est pas remplis ');
            }
         
            // on vérifie si le pseudo n'existe pas dans la BDD
        //rediriger au bout de x sec
        // header("refresh:3;url=../../App/View/profilView.php");
        }

    }
}



=======
class SignModel extends Database{ 
    function inscription(){
        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
            $pseudo = trim($_POST['pseudo']);
            $recup_infos = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
            // on vérifie si le pseudo n'existe pas dans la BDD
            $email = trim($_POST['email']);
            $recup_infos = $pdo->query("SELECT * FROM membre WHERE email = '$email'");
            // // on vérifie si l'email n'existe pas dans la BDD
            if($recup_infos->rowCount() < 1) {
              $mdp = trim($_POST['mdp']);
              $mdp = password_hash($mdp, PASSWORD_DEFAULT);
              $prenom = trim($_POST['prenom']);
              $nom = trim($_POST['nom']);
        
          
              $enregistrement = $pdo->prepare("INSERT INTO membre (nom, prenom, pseudo, email, mdp) VALUES (:nom, :prenom, :pseudo, :email, :mdp)");
              // on fourni les valeurs des marqueurs nominatifs
              $enregistrement->bindParam(':nom', $nom, PDO::PARAM_STR);
              $enregistrement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
              $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
              $enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
              $enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
              $enregistrement->execute();
              //rediriger au bout de x sec
              header("refresh:3;url=../../App/View/profilView.php");
          }
        }
    }
}
>>>>>>> ae398a31273e611b990c0b459512c2c4125fc319

<?php
namespace App\Model;
use Core\Database;


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




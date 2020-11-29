<?php namespace App\Model;
use Core\Database;

class ProfilModifModel extends Database {
    function recup() {
        return $this->query("SELECT * from user where id = ".$_SESSION['user']['id']);
    }

    function modifier() {
        $id=$_SESSION['user']['id']; //récup id 
        return $msg = "";
        
        

        if(isset($_POST['bouton'])) {

            if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
                $mdp = trim($_POST['mdp']);
                $recup_infos=$this->pdo->query("SELECT * FROM user WHERE id = '$id' ");
                $infos_membre=$recup_infos->fetch(\PDO::FETCH_ASSOC);

                if(password_verify($mdp, $infos_membre['mdp'])) {
                    // $Nmdp=trim($_POST['Nmdp']);
                    // $Nmdp=password_hash($Nmdp, PASSWORD_DEFAULT);
                    $prenom=trim($_POST['prenom']);
                    $nom=trim($_POST['nom']);
                    $pseudo=trim($_POST['pseudo']);
                    $email=trim($_POST['email']);


                    $enregistrement=$this->pdo->prepare("UPDATE user SET nom = :nom , prenom = :prenom, pseudo = :pseudo, email = :email, mdp = :Nmdp WHERE id = $id");

                    $enregistrement->bindParam(':nom', $nom, \PDO::PARAM_STR);
                    $enregistrement->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
                    $enregistrement->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
                    $enregistrement->bindParam(':email', $email, \PDO::PARAM_STR);
                    // $enregistrement->bindParam(':Nmdp', $Nmdp, \PDO::PARAM_STR);
                    $enregistrement->execute();

                    //rediriger
                    header("location:index.php?page=profil");
                }else{
                    return $msg="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>MDP incorrect</div>";
                }

                

            }else {
                return $msg="<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Veuiller remplir tous les champs</div>";

            }
        }
    }
}

?>
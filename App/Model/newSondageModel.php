<?php
namespace App\Model;
use Core\Database;

class newSondageModel extends Database{ 
  function newsondage(){  
      
    $msg = "";

    // Enregistrement des éléments du sondages
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['proposition1'])  && isset($_POST['date'])) {
        $question = trim($_POST['question']);
        $image = trim($_POST['image']);
        $date = trim($_POST['date']);

        // Défini id_membre de l'internaute connecté = membre_id de la table article en bdd
        $membre_id = $_SESSION['user']['id'];

        // Enregistrement de la question dans la bdd
        $enregistrementQuestion = $this->pdo->prepare("INSERT INTO question (user_id_author, question, image, date_fin) VALUES ( $membre_id, :question, :image, :date)");
        $enregistrementQuestion->bindParam(':question', $question, \PDO::PARAM_STR);
        $enregistrementQuestion->bindParam(':image', $image, \PDO::PARAM_STR);
        $enregistrementQuestion->bindParam(':date', $date, \PDO::PARAM_STR);
        $enregistrementQuestion->execute();
        }


        return  $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; text-transform: uppercase; color: white; text-align: center;'>Merci ! Votre sondage a bien été enregistré !</div>";
        
    }
  }
}
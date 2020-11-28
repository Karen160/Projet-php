<?php
namespace App\Model;
use Core\Database;

class SignModel extends Database{ 
  function newsondage(){  
      
    $msg = "";
    // Enregistrement des éléments du sondages
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['proposition1'])  && isset($_POST['date'])) {
        $titre = trim($_POST['question']);
        $image = trim($_POST['image']);
        $contenu = trim($_POST['proposition1']);
        $contenu = trim($_POST['date']);

        // Défini id de l'internaute connecté
        $membre_id = $_SESSION['user']['id'];

        // Enregistrement de la question dans la bdd
        $enregistrementQuestion = $pdo->prepare("INSERT INTO question (question_id, user_id_author, question, date_fin) VALUES (NULL, $membre_id, :question, :date)");
        $enregistrement->bindParam(':question', $question, \PDO::PARAM_STR);
        $enregistrement->bindParam(':date', $date, \PDO::PARAM_STR);
        $enregistrement->execute();

        // Défini id de la question
        $id_question = $_SESSION['question']['question_id'];

       
        for($k = 0; nbReponse>$k; $k++){
          // Enregistrement des proposition de réponse dans la bdd
          $enregistrementAnswer = $pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $id_question, :proposition)");
          $enregistrement->bindParam(':proposition', $proposition, \PDO::PARAM_STR);
          $enregistrement->execute();
        }
        
        $msg = "<div class='alertGlobal2'>Merci ! Votre sondage a bien été enregistré !</div>";
    }
  }
}
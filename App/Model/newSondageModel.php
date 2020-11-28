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
        $membre_id = $_SESSION['membre']['id_membre'];
        $pseudo_membre = $_SESSION['membre']['pseudo'];

        // Enregistrement de la question dans la bdd
        $enregistrementQuestion = $this->pdo->prepare("INSERT INTO question (question_id, user_id_author, question, date_fin) VALUES (NULL, $membre_id, :question, :date)");
        $enregistrementQuestion->bindParam(':question', $question, \PDO::PARAM_STR);
        $enregistrementQuestion->bindParam(':date', $date, \PDO::PARAM_STR);
        $enregistrementQuestion->execute();

        // Défini id de la question
        $id_question = $_SESSION['question']['question_id'];

       
        for($k = 0; nbReponse>$k; $k++){
          $proposition = trim($_POST['proposition'+ ($k+1) +'']);
          // Enregistrement des proposition de réponse dans la bdd
          $enregistrementAnswer = $this->pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $id_question, :proposition)");
          $enregistrementAnswer->bindParam(':proposition'+ ($k+1) +'', $proposition, \PDO::PARAM_STR);
          $enregistrementAnswer->execute();
        }
        
        $msg = "<div class='alertGlobal2'>Merci ! Votre sondage a bien été enregistré !</div>";
    }

    $articles = $this->pdo->query("SELECT id_article, titre, pseudo, image FROM article");
  }
}
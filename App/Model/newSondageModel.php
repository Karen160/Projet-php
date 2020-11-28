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
        $enregistrementQuestion = $this->pdo->prepare("INSERT INTO question (question_id, user_id_author, question, image, date_fin) VALUES (NULL, $membre_id, :question, :image, :date)");
        $enregistrementQuestion->bindParam(':question', $question, \PDO::PARAM_STR);
        $enregistrementQuestion->bindParam(':image', $image, \PDO::PARAM_STR);
        $enregistrementQuestion->bindParam(':date', $date, \PDO::PARAM_STR);
        $enregistrementQuestion->execute();

        // Défini id de la question
        $recup_question = $this->pdo->query("SELECT * FROM question");
        $recupQ = $recup_question->fetch(\PDO::FETCH_ASSOC);
        $id_question = $recupQ['question']['question_id'];
        var_dump($id_question);

        $nbRep = $_GET['nbReponse'];
        var_dump($nbRep);
       
        for($k = 0; $nbRep>$k; $k++){
          $proposition = trim($_POST['proposition'+ ($k+1) +'']);
          // Enregistrement des proposition de réponse dans la bdd
          $enregistrementAnswer = $this->pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $id_question, :proposition)");
          $enregistrementAnswer->bindParam(':proposition'+ ($k+1) +'', $proposition, \PDO::PARAM_STR);
          $enregistrementAnswer->execute();
        }

        return  $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; text-transform: uppercase; color: white; text-align: center;'>Merci ! Votre sondage a bien été enregistré !</div>";

    }

    $articles = $this->pdo->query("SELECT id_article, titre, pseudo, image FROM article");
  }
}
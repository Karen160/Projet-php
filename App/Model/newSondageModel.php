<?php
namespace App\Model;
use Core\Database;

class newSondageModel extends Database{ 
  function newsondage(){  
      
    $msg = "";
    // Enregistrement des éléments du sondages
<<<<<<< HEAD
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['reponse'])) {
        $titre = trim($_POST['titre']);
        $image = trim($_POST['image']);
        $contenu = trim($_POST['contenu']);
=======
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['proposition1'])  && isset($_POST['date'])) {
        $question = trim($_POST['question']);
        $image = trim($_POST['image']);
        $date = trim($_POST['date']);
>>>>>>> 0e9194fa573f5c02954d611363188f36655e1ab8

        // Défini id_membre de l'internaute connecté = membre_id de la table article en bdd
        $membre_id = $_SESSION['membre']['id_membre'];
        $pseudo_membre = $_SESSION['membre']['pseudo'];

        // Enregistrement de l'artcile dans la bdd
        $enregistrement = $this->pdo->prepare("INSERT INTO article (id_article, titre, membre_id, pseudo, image, date_publication, contenu) VALUES (NULL, :titre, $membre_id, :pseudo, :image, CURDATE(), :contenu)");
        $enregistrement->bindParam(':titre', $titre, \PDO::PARAM_STR);
        $enregistrement->bindParam(':image', $image, \PDO::PARAM_STR);
        $enregistrement->bindParam(':contenu', $contenu, \PDO::PARAM_STR);
        $enregistrement->bindParam(':pseudo', $pseudo_membre, \PDO::PARAM_STR);
        $enregistrement->execute();

<<<<<<< HEAD
        $msg = "<div class='alertGlobal2'>Merci ! Votre nouveau post a bien été enregistré !</div>";
=======
        // Défini id de la question
        $id_question = $_SESSION['question']['question_id'];

       
        for($k = 0; nbReponse>$k; $k++){
          $proposition = trim($_POST['proposition'+ ($k+1) +'']);
          // Enregistrement des proposition de réponse dans la bdd
          $enregistrementAnswer = $pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $id_question, :proposition)");
          $enregistrement->bindParam(':proposition'+ ($k+1) +'', $proposition, \PDO::PARAM_STR);
          $enregistrement->execute();
        }
        
        $msg = "<div class='alertGlobal2'>Merci ! Votre sondage a bien été enregistré !</div>";
>>>>>>> 0e9194fa573f5c02954d611363188f36655e1ab8
    }

    $articles = $this->pdo->query("SELECT id_article, titre, pseudo, image FROM article");
  }
}
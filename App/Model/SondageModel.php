<?php
namespace App\Model;
use Core\Database;

class SignModel extends Database{ 
  function newsondage(){  
      
    $msg = "";
    // Enregistrement des éléments du sondages
    if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['reponse'])) {
        $titre = trim($_POST['titre']);
        $image = trim($_POST['image']);
        $contenu = trim($_POST['contenu']);

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

        $msg = "<div class='alertGlobal2'>Merci ! Votre nouveau post a bien été enregistré !</div>";
    }

    $articles = $this->pdo->query("SELECT id_article, titre, pseudo, image FROM article");
  }
}
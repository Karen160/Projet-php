<?php
namespace App\Model;
use Core\Database;

class HomeModel extends Database{
    function home(){
       return $allSondage = $this->query(" SELECT q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() ORDER BY date_fin ASC limit 3");
    }
    function homeConnect(){
        $membre_id = $_SESSION['user']['id'];
        $sond = $this->query(" SELECT q.`question_id`, q.`question`, u.`pseudo`, q.`image`, q.`date_fin` FROM `question` as q INNER JOIN `user` as u on q.`user_id_author` = u.`id` WHERE date_fin >= CURDATE() ORDER BY date_fin ASC");
        
        $sondPerso = $this->query("SELECT question, `image`, date_fin FROM question WHERE date_fin >= CURDATE() and `user_id_author` = '$membre_id' ");    
             
        return $requete = array($sond, $sondPerso);
    }
    function share(){
       
            if(isset($_POST['question']) && isset($_POST['image']) && isset($_POST['proposition1'])  && isset($_POST['date'])) {
      
            // Défini id de la question
            $recup_question = $this->pdo->query("SELECT max(question_id) FROM question");
            $recupQ = $recup_question->fetch(\PDO::FETCH_ASSOC);
            
            return $nombre = ($_POST['nbquestion']);
      
            for($k = 1; $nombre>$k; $k++){
              $proposition = trim($_POST['proposition'.($k+1)]);
              // Enregistrement des proposition de réponse dans la bdd
              $enregistrementAnswer = $this->pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $recupQ, :proposition)");
              $enregistrementAnswer->bindParam(':proposition'. ($k+1), $proposition, \PDO::PARAM_STR);
              $enregistrementAnswer->execute();
            }
    }
}
}
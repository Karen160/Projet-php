<?php
namespace App\Model;
use Core\Database;

class SondageModel extends Database{ 
  function sondage(){  
      return $sondage = $this->query("SELECT q.`question`, a.`choix` FROM `question` as q INNER JOIN `answer` as a ON q.`question_id` = a.`id_question_id`");
      
      // $resultSondage = 
    }
}

?>
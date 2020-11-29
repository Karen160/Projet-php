<?php
namespace App\Model;
use Core\Database;

class SondageModel extends Database{ 
  function sondage(){  
      $sondage_id = $_GET['sondage'];
      return $sondage = $this->query("SELECT `question`, `question_id` FROM `question` where `question_id` = ' $sondage_id' ");
      
      // $resultSondage = 
    }
}

?>
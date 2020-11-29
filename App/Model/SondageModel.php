<?php
namespace App\Model;
use Core\Database;

class SondageModel extends Database{ 
  function verif(){
    $sondage_id = $_GET['sondage'];

    return $id = $this->query("SELECT `question_id` FROM `question` where  `question_id` =  '$sondage_id'  ");
  }
  function sondage(){  
      $sondage_id = $_GET['sondage'];

    //select tout les ids de sondage exitants
      
      
      //select info d'un sondage
      return $sondage = $this->query("SELECT `question`, `question_id` FROM `question` where `question_id` = ' $sondage_id' ");
      
       //return de variables
      
      // $resultSondage = 
    }
}

?>
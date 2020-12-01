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
      return $sondage = $this->query("SELECT q.`question`, q.`question_id`, a.`choix` FROM `question` as q INNER JOIN answer as a where `question_id` = `id_question_id` AND `question_id` = ' $sondage_id' ");
      
       
    }

    function share(){
      $membre_pseudo = $_SESSION['user']['email'];
      
      if(isset($_POST['send'])) {
          //Vérifier le message
          if(iconv_strlen(trim($_POST['msg'])) >= 20) { 
              var_dump('je suis 1');
            $i=0;
            while(isset($_POST['email'.($i+1)])) {
              // var_dump(isset($_POST['email'.($i+1)]));
              $i++;
              // var_dump($i);
              var_dump('je suis while');
            }
            
            for($k=1; $k<=$i; $k++) {
              var_dump('je suis for');
              //Vérifie l'email
              if(filter_var($_POST['email'. $k], FILTER_VALIDATE_EMAIL)){
                var_dump('je suis if email');
                //envoi de l'email
                $to = $_POST['email'.$k]; //le destinataire
                $subject = 'Le sondage 2Choose';
                $headers = 'From: ' . $membre_pseudo . "\r\n" . //de qui proviens l'email
                'Reply-To: ' . $membre_pseudo . "\r\n" . //répondre à l'envoyeur
                'X-Mailer: PHP/' . phpversion();

                if(mail($to, $subject, $_POST['msg'], $headers)){ //message d'envoi email
                  unset($_POST['email'.$k]);
                }
              }
            }
            
            if(mail($to, $subject, $_POST['msg'], $headers)){ //message d'envoi email
                unset($_POST['msg']);
                // header('Location:' . $_SERVER['REQUEST_URI']);
                // exit;
            }else{ //erreur envoi d'email
                return $msg ='<div class="alertGlobal">Problème lors de l\'envoi de l\'email. Merci de réessayer plus tard.</div>';
            }
          }else{
            return $msg ='<div class="alert"><i class="fas fa-exclamation-circle"></i> Le message doit avoir entre 20 et 500 caractères</div>';
        }
      }
    }
  }

?>
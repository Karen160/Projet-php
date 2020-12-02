<?php namespace App\Model;
use Core\Database;

class SondageModel extends Database {
  function verif() {
    $sondage_id=$_GET['sondage'];
    return $id=$this->query("SELECT `question_id` FROM `question` where  `question_id` =  '$sondage_id'  ");
  }

  function sondage() {
    $sondage_id=$_GET['sondage'];

    //select tout les ids de sondage exitants
    //select info d'un sondage
    $sondage=$this->query("SELECT q.`question`, q.`question_id`, a.`choix`, a.`answer_id` FROM `question` as q INNER JOIN answer as a where `question_id` = `id_question_id` AND `question_id` = ' $sondage_id' ");
    return $sondage;
  }
function addAnswer(){
 
  $sondage_id=$_GET['sondage'];
  $idUser=$_SESSION['user']['id'];
  $verif=$this->pdo->query("SELECT * FROM user_answer where `user_id` = '$idUser' AND id_question = '$sondage_id' ");
    if(isset($_GET['answer'])){
      $idAnswerHash = $_GET['answer'];
      $idAnswer = 0;
      while(password_verify($idAnswer, $idAnswerHash) == false){
        $idAnswer++;  
      }
      if($verif->rowCount() == 0){
        $addAnswer = $this->pdo->prepare("INSERT INTO user_answer (`user_id`,answer_id,id_question) VALUES ('$idUser','$idAnswer',' $sondage_id')");
        $addAnswer->execute();  
        $countAnswer= $this->pdo->prepare("UPDATE ANSWER SET nombre = nombre+1 WHERE answer_id = '$idAnswer' ");
        $countAnswer->execute();
        header('location:index.php?page=sondage&sondage='.$sondage_id); 
      }else{
       header('location:index.php?page=sondage&sondage='.$sondage_id); 
      }
     
    }
}

function result(){
  $sondage_id=$_GET['sondage'];
  $resultat = $this->pdo->query("SELECT q.`date_fin` as date_fin,q.`question` as question, a.`choix` as choix ,a.`nombre` as nombre from question as q INNER JOIN answer as a on q.`question_id` = a.`id_question_id` WHERE q.`question_id` = '$sondage_id' ");
  $resultat = $resultat->fetchAll(\PDO::FETCH_ASSOC);
  return $resultat;
}
  function comment() {
    $sondage_id=$_GET['sondage'];

    $commentaire =$this->query("SELECT u.`pseudo`, uc.`comment`, uc.`date` FROM user_comment as uc INNER JOIN user as u on uc.`user_id` = u.`id` WHERE id_question_id = '$sondage_id'");
    if(isset($_POST['sendcom'])) {
      if(!empty($_POST['commentaire'])) {
        $iduser=$_SESSION['user']['id'];
        $mess=$_POST['commentaire'];
        $enregistrementCom=$this->pdo->prepare("INSERT INTO user_comment (`user_id`, id_question_id, comment) VALUES ('$iduser', '$sondage_id', '$mess')");
        $enregistrementCom->execute();
      }

      else {
        //  return $msg = '<div class="alert"><i class="fas fa-exclamation-circle"></i>Merci de completer votre commentaire</div>';
      }
    }
    return $commentaire;
  }



  function share() {
    $membre_email=$_SESSION['user']['email'];
    $msg="";

    if(isset($_POST['send'])) {

      //Vérifier le message
      if(iconv_strlen(trim($_POST['textarea'])) >=20) {
        // var_dump('je suis 1');
        $i=0;

        while(isset($_POST['email'.($i+1)])) {
          // var_dump(isset($_POST['email'.($i+1)]));
          $i++;
          // var_dump($i);
          // var_dump('je suis while');
        }

        for($k=1; $k<=$i; $k++) {

          // var_dump('je suis for');
          //Vérifie l'email
          if(filter_var($_POST['email'. $k], FILTER_VALIDATE_EMAIL)) {
            // var_dump('je suis if email');
            //envoi de l'email
            $to=$_POST['email'.$k]; //le destinataire
            $subject='Le sondage 2Choose';
            $mail=$_POST['textarea'];
            $link=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $content="Tu as recu une invitation à un sondage, clique sur le message pour y accéder: <br> <br><a href='".$link."'>".$mail." </a>";



            $headers[]='MIME-Version: 1.0';
            $headers[]='Content-type: text/html; charset=utf-8 ';

            $headers[]='From: '. $membre_email; //de qui proviens l'email
            $headers[]='Reply-To: '. $membre_email; //répondre à l'envoyeur
            $headers[]='X-Mailer: PHP/'. phpversion();

            if(isset($to, $subject, $content, $headers)) {
              if(mail($to, $subject, $content, implode("\r\n", $headers))) {
                //message d'envoi email
                unset($content);
                unset($_POST['email'.$k]);
                // header('Location:' . $_SERVER['REQUEST_URI']);
                // exit;
              }

              else {
                //erreur envoi d'email
                $msg='<div class="alertGlobal">Problème lors de l\'envoi de l\'email. Merci de réessayer plus tard.</div>';
              }
            }

            else {
              $msg='<div class="alert"><i class="fas fa-exclamation-circle"></i>Merci de remplir tous les champs. Le message doit avoir au moin 20 caractèregi</div>';
            }

          }
        }
      }

      return $msg;
    }
  }

  // function ajax(){
  //     public function saveCom($data)
  //     {
  //         $com = $data["titre"].",".$data["desc"].",".$data["urgence"].",".$data["date"]."\n";
  //         $file = fopen("tasks.csv", 'a+');
  //         fwrite($file,$com);
  
  //         fclose($file);
  //     }
  
  //     public function getCom($return = false)
  //     {
  //         $filename = "tasks.csv";
  //         $file = fopen($filename, 'r');
  //         $data = array();
  //         while(true){
  //             $task = fgetcsv($file);
  //             if ($task == false) {
  //                 break;
  //             }else {
  //                 $data[] = $task;
  //             }
  //         }
  //         fclose($file);
  
  //         if ($return) {
  //           return $data;
  //         }
  //         echo json_encode($data);
  //     }
  //}
}

?>
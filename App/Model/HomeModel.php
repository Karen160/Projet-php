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
        $membre_pseudo = $_SESSION['user']['email'];

            if(isset($_POST['msg']) && isset($_POST['email1'])) {
                
                //Vérifier le message
                if(iconv_strlen(trim($_POST['msg'])) > 1 && iconv_strlen(trim($_POST['msg'])) <=500) { 
                    
                    //Vérifie l'email
                    if(filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL)){

                        //envoi de l'email
                        $to = $_POST['email1']; //le destinataire
                        $subject = 'Le sondage 2Choose';
                        $headers = 'From: ' . $membre_pseudo . "\r\n" . //de qui proviens l'email
                        'Reply-To: ' . $membre_pseudo . "\r\n" . //répondre à l'envoyeur
                        'X-Mailer: PHP/' . phpversion();
            
                        if(mail($to, $subject, $_POST['msg'], $headers)){ //message d'envoi email
                            return $msg = '<div class="alertGlobal"><i class="fas fa-envelope"></i> Ton partage a été effectué !</div>';	

                }else{
                    return $msg ='<div class="alert"><i class="fas fa-exclamation-circle"></i> Le message doit avoir entre 20 et 500 caractères</div>';
                }

                

      
    //         // // Défini id de la question
    //         // $recup_question = $this->pdo->query("SELECT max(question_id) FROM question");
    //         // $recupQ = $recup_question->fetch(\PDO::FETCH_ASSOC);
            
    //         // return $nombre = ($_POST['nbquestion']);
      
    //         // for($k = 1; $nombre>$k; $k++){
    //         //   $proposition = trim($_POST['proposition'.($k+1)]);
    //         //   // Enregistrement des proposition de réponse dans la bdd
    //         //   $enregistrementAnswer = $this->pdo->prepare("INSERT INTO answer (answer_id, id_question_id, choix) VALUES (NULL, $recupQ, :proposition)");
    //         //   $enregistrementAnswer->bindParam(':proposition'. ($k+1), $proposition, \PDO::PARAM_STR);
    //         //   $enregistrementAnswer->execute();
    //         // }

    }
    }
}   
}
}
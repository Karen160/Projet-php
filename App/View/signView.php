<?php 
<<<<<<< HEAD
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';
=======
// connexion à la base de données via la classe PDO
$host = 'mysql:host=localhost;dbname=projetphp';
$login = 'root';
$password = 'root';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);

// ouverture d'une $_SESSION  pour la connexion utilisateur
session_start();

include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {
    $pseudo = trim($_POST['pseudo']);
    $recup_infos = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    // on vérifie si le pseudo n'existe pas dans la BDD
    $email = trim($_POST['email']);
    $recup_infos = $pdo->query("SELECT * FROM membre WHERE email = '$email'");
    // // on vérifie si l'email n'existe pas dans la BDD
    if($recup_infos->rowCount() < 1) {
      $mdp = trim($_POST['mdp']);
      $mdp = password_hash($mdp, PASSWORD_DEFAULT);
      $prenom = trim($_POST['prenom']);
      $nom = trim($_POST['nom']);

  
      $enregistrement = $pdo->prepare("INSERT INTO membre (nom, prenom, pseudo, email, mdp) VALUES (:nom, :prenom, :pseudo, :email, :mdp)");
      // on fourni les valeurs des marqueurs nominatifs
      $enregistrement->bindParam(':nom', $nom, PDO::PARAM_STR);
      $enregistrement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
      $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
      $enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
      $enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
      $enregistrement->execute();
      //rediriger au bout de x sec
      header("refresh:3;url=../../App/View/profilView.php");
  }
}

>>>>>>> ae398a31273e611b990c0b459512c2c4125fc319
?>
<main id="signMain">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <section class="col-sm-5 position-static" id="inscription" >
            <form method="POST" id="signForm" class=" position-static">
                <div class="card form_group " >
                    <div class="card-body">
                        <h2 class="card-title">Inscription</h2>
                        <div class="row ">
                            <div class="col-sm-6 position-static">
                                <label for="form_name ">Nom</label>
                                <input id="form_name" type="text" name="nom" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le nom est requis.">
                            </div>
                            <div class="col-sm-6 position-static"> 
                                <label for="form_name ">Prénom</label>
                                <input id="form_name" type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom" required="required" data-error="Le prénom est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static">
                                <label for="form_name ">Pseudo</label>
                                <input id="form_name" type="text" name="pseudo" class="form-control" placeholder="Choisissez un pseudo" required="required" data-error="Le pseudo est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Mail</label>
                                <input id="form_name" type="text" name="email" class="form-control" placeholder="Entrez votre email"  data-error="Le mail est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Password</label>
                                <input id="form_name" type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static offset-ms-4"> 
                                <button name="valid" type="submit" class="btn btn-info btn-block active" >Envoyez</button>
                            </div>
                    </form>
                </div>
            </form>
            
        </section>
        <section class="col-sm-5 mx-auto mt-5 position-static"  >
            <form>
                <div class="card " >
                    <div  class="card-body  position-static " id="connexion">
                        <h2 class="card-title ">Connexion</h2>
                        <div class="row">
                            <div class="col-sm-12 position-static">
                                <label for="form_name ">Pseudo</label>
                                <input id="form_name" type="text" name="pseudo" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le Pseudo est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Password</label>
                                <input id="form_name" type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static offset-ms-4"> 
                                <button type="submit" action="signView.php" class="btn btn-info btn-block active" >Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </section>
    </div>
</main>
<?php
include '../../inc/footer.inc.php';
?>
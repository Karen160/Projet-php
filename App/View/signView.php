<?php 
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

$msg = "";

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

      $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; color: white; text-align: center;'>Félicitation votre compte a été crée<br>Connecter-vous</div>";
      
    } else {
      $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Le pseudo/email existe déjà<br>Veuillez recommencer</div>";
    }
}


$affichage = "";

if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {

  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['mdp'];

  // on interroge la BDD pour récupérer les informations de l'utilisateur sur la base de son pseudo
  $recup_infos = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");


  // on vérifie si on a récupéré une ligne.
  if($recup_infos->rowCount() > 0) {
    // le pseudo est bon

    // on vérifie le mdp avec un fetch
    $infos_membre = $recup_infos->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>'; print_r($infos_membre); echo '</pre>';
    if(password_verify($mdp, $infos_membre['mdp'])) {
      // le mdp est bon
      // Pour la connexion, on place les informations de l'utilisateur sauf son mdp dans la session pour pouvoir intéroger la session par la suite.
      $_SESSION['membre']['id_membre'] = $infos_membre['id_membre'];
      $_SESSION['membre']['pseudo'] = $infos_membre['pseudo'];
      $_SESSION['membre']['mail'] = $infos_membre['mail'];
      $_SESSION['membre']['statut'] = $infos_membre['statut'];
      $msg = "<div style='padding: 20px; background-color: green; color: white; text-align: center;'>Bienvenue <br> $pseudo </div>";
      //rediriger au bout de X sec
      header("refresh:2;url=");

    } else {
      //mdp incorrect
      $msg = "<div style='padding: 20px; background-color: red; color: white; text-align: center;'>Mdp incorrect,<br>Veuillez recommencer</div>";
    }
  } else {
    // pseudo incorrect
    $msg = "<div style='padding: 20px; background-color: red; color: white; text-align: center;'>Pseudo incorrect,<br>Veuillez recommencer</div>";
  }
}
?>
































?>
<main id="signMain">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <section class="col-sm-5 position-static" id="inscription" >
            <div class="card " >
                <div class="card-body">
                    <h2 class="card-title">Inscription</h2>
                    <form class="row " method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
                            <div class="col-sm-6">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le nom est requis.">
                            </div>
                            <div class="col-sm-6 position-static"> 
                                <label for="prenom ">Prénom</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom" required="required" data-error="Le prénom est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static">
                                <label for="pseudo">Pseudo</label>
                                <input type="text" name="pseudo" class="form-control" placeholder="Choisissez un pseudo" required="required" data-error="Le pseudo est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Entrez votre email" required="required" data-error="Le mail est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="mdp">Password</label>
                                <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static offset-ms-4"> 
                                <button type="submit" class="btn btn-info btn-block active" name="bouton">Envoyez</button>
                            </div>
                            <?php
                                echo $msg;
                            ?>  
                    </form>
                </div>
            </form>
            
        </section>
        <section class="col-sm-5 mx-auto mt-5 position-static"  >
            <div class="card " >
                <div  class="card-body  position-static " id="connexion">
                    <h2 class="card-title ">Connexion</h2>
                    <form class="row">
                        <div class="col-sm-12">
                            <label for="pseudoCo">Pseudo</label>
                            <input type="text" name="pseudoCo" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le Pseudo est requis.">
                        </div>
                        <div class="col-sm-12 mt-4"> 
                            <label for="mdpCo">Password</label>
                            <input type="password" name="mdpCo" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                        </div>
                        <div class="col-sm-12 mt-4 offset-ms-4"> 
                            <button type="submit" class="btn btn-info btn-block active" >Envoyez</button>
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
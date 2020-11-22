<?php 
// connexion à la base de données via la classe PDO
$host = 'mysql:host=localhost;dbname=projet_php';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);

// ouverture d'une $_SESSION  pour la connexion utilisateur
session_start();

$id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
$afficher_profil = $pdo->query("SELECT * FROM membre WHERE id = $id");
$afficher = $afficher_profil->fetch(PDO::FETCH_ASSOC); 

$msg = "";


if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {

    $mdp = trim($_POST['mdp']);
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $pseudo = trim($_POST['pseudo']);
    $email = trim($_POST['email']);

    $enregistrement = $pdo->prepare("UPDATE membre SET nom = :nom , prenom = :prenom, email = :email, mdp = :mdp, pseudo = :pseudo WHERE id = $id");
      
    $enregistrement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $enregistrement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
    $enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $enregistrement->execute();

    $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: green; color: white; text-align: center;'>Félicitation</div>";
} else {

    $msg = "<div style='margin: 10px auto; padding:10px 0; width: 90%; background-color: red; text-transform: uppercase; color: white; text-align: center;'>Veuiller remplir tous les champs</div>";
}





include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';
?>
<main id="profil">
    <section>
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?= $afficher['nom'] ?>">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" class="form-control" value="<?= $afficher['prenom'] ?>">

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" class="form-control" value="qsdsdqsd" value="<?= $afficher['pseudo'] ?>">

                <label for="mdp">Mot de passe :</label>
                <input type="text" name="mdp" class="form-control" value="">
            </div>
            <div>
                <p>Nombre d'amis : <?= $afficher['nom'] ?></p>
                <p>Nombre de mes sondages : <?= $afficher['nom'] ?></p>
                <label for="email">Email :</label>
                <input type="text" name="email" class="form-control" value="<?= $afficher['email'] ?>">
                <p>Date d'inscription : <?= $afficher['date'] ?></p>
            </div>

        </div>
        <button type="submit" class="btn btn-info btn-block active" name="bouton">Envoyez</button>
        <?php
            echo $msg;
        ?>  

    </section>
</main>
<?php  include '../../inc/footer.inc.php';?>
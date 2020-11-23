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

$id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
$afficher_profil = $pdo->query("SELECT * FROM membre WHERE id = $id");
$afficher = $afficher_profil->fetch(PDO::FETCH_ASSOC); 

include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';
?>
<main id="profil">
    <section>
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control" placeholder="<?= $afficher['nom'] ?>">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" class="form-control" placeholder="<?= $afficher['prenom'] ?>">

                <label for="nom">Pseudo :</label>
                <input type="text" name="pseudo" class="form-control" placeholder="<?= $afficher['pseudo'] ?>">

                <label for="mdp">Mot de passe :</label>
                <input type="text" name="nom" class="form-control" placeholder="<?= $afficher['mdp'] ?>">
            </div>
            <div>
                <p>Nombre d'amis : <?= $afficher['nom'] ?></p>
                <p>Nombre de mes sondages : <?= $afficher['nom'] ?></p>
                <label for="email">Email :</label>
                <input type="text" name="email" class="form-control" placeholder="<?= $afficher['email'] ?>">
                <p>Date d'inscription : <?= $afficher['date'] ?></p>
            </div>

        </div>
        <button type="submit" class="btn btn-info btn-block active" name="bouton">Envoyez</button>

    </section>
</main>
<?php  include '../../inc/footer.inc.php';?>
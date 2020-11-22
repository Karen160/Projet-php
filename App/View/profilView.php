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

if(empty($_SESSION['membre'])) {
// si c'est vide ou ça n'existe pas, alors l'utilisateur n'est pas connecté, on le redirige vers la page connexion
header('location:signView.php');
}

$id = $_SESSION['membre']['id']; //Charge les données bdd pour connaitre le pseudo de l'internaute
$afficher_profil = $pdo->query("SELECT * FROM membre WHERE id = $id");
$afficher = $afficher_profil->fetch(PDO::FETCH_ASSOC); 

include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';
?>
<main id="profil">
    <button onclick="window.location.href = 'profilModif.php'" class="btn btn-info active" style="float:right; margin-right:40px">Modifier mon profil</button><br><br>
    <button onclick="window.location.href = 'friendView.php'" class="btn btn-info active" style="float:right; margin-right:70px">Mes amis</button>

    <section>
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <div>
                <p>Nom :  <?= $afficher['nom'] ?></p>
                <p>Prénom : <?= $afficher['prenom'] ?></p>
                <p>Pseudo : <?= $afficher['pseudo'] ?></p>
                <p>Mot de passe : *******</p>
            </div>
            <div>
                <p>Nombre d'amis : <?= $afficher['nom'] ?></p>
                <p>Nombre de mes sondages : <?= $afficher['nom'] ?></p>
                <p>Email : <?= $afficher['email'] ?></p>
                <p>Date d'inscription : <?= $afficher['date'] ?></p>
            </div>
        </div>
    </section>
</main>
<?php  include '../../inc/footer.inc.php';?>
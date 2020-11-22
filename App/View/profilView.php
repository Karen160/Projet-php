<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';

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
header('location:../../App/View/signView.php');
// si la personne est connecté alors elle est redirigé sur le profil
}


?>
<main id="profil">
    <button class="btn btn-info active" style="float:right; margin-right:40px">Modifier mon profil</button><br><br>
    <button class="btn btn-info active" style="float:right; margin-right:70px">Mes amis</button>

    <section>
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <div>
                <p>Nom :</p>
                <p>Prénom :</p>
                <p>Pseudo :</p>
                <p>Mot de passe :</p>
            </div>
            <div>
                <p>Nombre d'amis :</p>
                <p>Nombre de mes sondages :</p>
                <p>Mail :</p>
                <p>Date d'inscription :</p>
            </div>
        </div>
    </section>
</main>
<?php  include '../../inc/footer.inc.php';?>
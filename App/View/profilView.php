<?php 
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
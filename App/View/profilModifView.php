<?php 
// ouverture d'une $_SESSION  pour la connexion utilisateur
// session_start();
include '../inc/head.inc.php'; 
include '../inc/header.inc.php';
?>
<main id="profil">

    <?php var_dump($_SESSION['membre']['id']) ?>
    
    <section>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?= $_SESSION['membre']['nom'] ?>">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" class="form-control" value="<?= $afficher['prenom'] ?>">

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" class="form-control" value="<?= $afficher['pseudo'] ?>">

                <label for="mdp">Mot de passe :</label>
                <input type="text" name="mdp" class="form-control" required>
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
          var_dump($test);
        ?> 
        </form> 

    </section>
</main>
<?php  include '../inc/footer.inc.php';?>
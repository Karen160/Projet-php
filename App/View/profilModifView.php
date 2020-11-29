<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php';
?>
<main id="profil">
    <section>
        <form method="post" >
            <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
            <div class="info">
                <?php foreach($user_infos as $userdata):?>
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" class="form-control" value="<?= $userdata->nom ?>">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" class="form-control" value="<?= $userdata->prenom?>">

                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" class="form-control" value="<?= $userdata->pseudo?>">

                <label for="Nmdp">Nouveau Mot de passe :</label>
                <input type="password" name="Nmdp" class="form-control">    
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="text" name="email" class="form-control" value="<?= $userdata->email ?>">
                <p style="margin-top: 10% ">Nombre d'amis : <?= $userdata->pseudo ?></p>
                <p>Nombre de mes sondages : <?= $userdata->pseudo ?></p>
                <p>Date d'inscription : <?= $userdata->date ?></p>
                <label style="margin-top: 7%;" for="mdp">Mdp actuel :</label>
                <input  type="password" class="form-control" name="mdp" required>
                    
            </div>
                    <?php endforeach ?>
        </div>
        <input type="submit" class="btn btn-info btn-block active" value="Envoyez" name="bouton">
        </form> 
    </section>
</main>
<?php  include '../inc/footer.inc.php';?>
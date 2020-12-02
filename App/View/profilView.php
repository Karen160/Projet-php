<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php';

?>
<main id="profil">
    <button onclick="window.location.href = 'index.php?page=profilModif'" class="btn btn-info active"
        style="float:right; margin-right:40px">Modifier mon profil</button><br><br>
    <button onclick="window.location.href = 'index.php?page=friend'" class="btn btn-info active"
        style="float:right; margin-right:70px">Mes amis</button>
        
    <section>
        <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
        <div class="info">
            <?php foreach($user_infos[0] as $userdata):
                foreach($user_infos[1] as $frienddata):
                foreach($user_infos[2] as $sondagedata):?>
            <div>
                <p>Nom : <?= $userdata->nom  ?></p>
                <p>Prénom : <?= $userdata->prenom  ?></p>
                <p>Pseudo : <?= $userdata->pseudo  ?></p>
                <p>Mot de passe : *******</p>
            </div>
            <div>
                <p>Nombre d'amis : <?= $frienddata->nb_ami  ?></p>
                <p>Nombre de mes sondages : <?= $sondagedata->nb_sond ?></p>
                <p>Email : <?= $userdata->email  ?></p>
                <p>Date d'inscription : <?= $userdata->date  ?></p>
            </div>
            <?php
            endforeach;
            endforeach;
            endforeach;?>
        </div>
        
    </section>
    <form method="POST">
        <button type="submit" name="delete" style="float:right;">Supprimer Mon Compte</button>
    </form>
</main>
<?php  include '../inc/footer.inc.php';?>
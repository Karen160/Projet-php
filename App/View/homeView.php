<?php 
include '../inc/head.inc.php'; 

include '../inc/header.inc.php'; ?>
<main id="accueil">
    <section>
        <h2>Sondages en cours</h2>
        <div class="conteneur">
        <?php 
         if($_SESSION['connect']){
            $sond =  $requete[0] ;
          }else{
            $sond = $allSondage;
          }
        foreach($sond as $sondage) :
           ?>
            <div class="boxsondage">
                <a href="index.php?page=sondageView<?= $sond->question_id ?>">
                    <img src="<?= $sondage->image ?>" alt="Image de la question ' + <?= $sondage->question ?> + '">
                    <span>Ecrit par : <?= $sondage->pseudo ?> <br> Date de fin : <?= $sondage->date_fin ?></span>
                    <p><?= $sondage->question ?></p>
                </a>
                <a href=""><i class="fas fa-share"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="btn btn-info active" style="margin:0 auto; display:block">Voir plus</button>
    </section>

    <section id="mesSond">
        <h2>Mes sondages</h2>
        <div class="conteneur">
            <?php foreach( $requete[1] as $sondagePerso) : ?>
                <div class="boxsondage">
                    <a href=>
                        <img src="<?= $sondagePerso->image ?>" alt="Image de la question ' + <?= $sondagePerso->question ?> + '">
                        <span>Date de fin : <?= $sondagePerso->date_fin ?></span>
                        <p><?= $sondagePerso->question ?></p>
                    </a>
                    <a href=""><i class="fas fa-share"></i></a>
                </div>
            <?php endforeach; ?> 
        </div>
    </section>
</main>

<?php include '../inc/footer.inc.php'; ?>

<script>
    
</script>
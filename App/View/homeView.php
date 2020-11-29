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
                    <img src="<?= $sondagePerso->image ?>"
                        alt="Image de la question ' + <?= $sondagePerso->question ?> + '">
                    <span>Date de fin : <?= $sondagePerso->date_fin ?></span>
                    <p><?= $sondagePerso->question ?></p>
                </a>
                <a href=""><i class="fas fa-share"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <article id="pop">
        <section class="col-sm-7 mx-auto" id="shareSondage">
            <div class="card position-static">
                <div class="card-body">
                    <h2 class="card-title">Partager le sondage<br>la question de folie</h2>
                    <div class="row ">
                        <div class="col-sm-12 mt-4">
                            <label for="nbPerson">Nombre de personne</label>
                            <select id="formNbPerson" type="text" name="nbpersonne" class="form-control"
                                placeholder="Choisissez le nombre de personne à qui partager" required="required"
                                data-error="Le nombre de personne est requis.">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div id="email">

                        </div>
                        <div class="col-sm-12 mt-4">
                            <label for="message">Message</label>
                            <textarea id="message" name="msg" class="form-control" placeholder="Votre message..."
                                rows="5"></textarea>
                        </div>
                        <div class="col-sm-12 mt-4 offset-ms-4">
                            <button class="btn btn-info btn-block active">Envoyez</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

<?php include '../inc/footer.inc.php'; ?>
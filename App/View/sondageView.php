<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php'; ?>
<main>
    <button class="btn btn-info active pop" style="float:right; margin-right:40px">Partager ce sondage</button><br><br>
    <section id="sondage">
        <h2><?=$sondage[0]->question?></h2>
        <br><br>
        <div class="sond">
        <?php foreach($sondage as $choix): ?>
            <button name="addAnswer">
                <a href="index.php?page=sondage&sondage=<?= $choix->question_id?>&answer=<?=$choix->answer_id?>"><h4><?=$choix->choix?></h4></a>
            </button>
            <br><br>
            <?php endforeach ?>
        </div>
    </section>
    <br>
    <section id="sondage">
        <h2>La question que tout le monde attend</h2>
        <br><br>
        <div class="sond">
            <h4>Oui</h4>
            <div class="bar">
                <div class="percentage" style="width: 70%">
                    <p>70%</p>
                </div>
            </div>
            <p>70 votes</p>
            <br><br>
            <h4>Non</h4>
            <div class="bar">
                <div class="percentage" style="width: 30%">
                    <p>30%</p>
                </div>
            </div>
            <p >30 votes</p>
        </div>
    </section>
    <br><br><br>
    <section id="com">
        <h2>Commentaire</h2>
        <br><br>
        <?php foreach($commentaire as $com): ?>
        <div class="msg">
            <div>
                <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
                <p><?= $com->pseudo ?></p>
                <p><?= $com->date ?></p>
            </div>
            <div>
                <p><?= $com->comment ?></p>
            </div>
        </div>
        <?php endforeach;?>
        <br>
        <button type="submit" class="btn btn-info com active" style="margin:0 auto; display:block">Ajouter un commentaire</button>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="monCom">
            <textarea name="commentaire" id="commentaire" class="form-control" placeholder="Mon commentaire..."></textarea>
            <br>            
            <button name="sendcom" class="btn btn-info com2 active" type="submit" style="margin:0 auto; display:block">Envoyez</button>
            <br>
            </form>
    </section>

        <section class="col-sm-7 mx-auto" id="shareSondage">
            <div class="card position-static">
                <form method="post" enctype="multipart/form-data" id="partage">
                <i class="fas fa-times"></i>
                <div class="card-body">
                    <h2 class="card-title">Partager le sondage<br>la question de folie</h2>
                    <div class="row ">
                        <div class="col-sm-12 mt-4">
                            <label  for="nbPerson">Nombre de personne</label>
                            <select id="formNbPerson" type="text" name="nbpersonne" class="form-control"
                                placeholder="Choisissez le nombre de personne à qui partager" required="required"
                                data-error="Le nombre de personne est requis.">
                                <option value="0" selected>Veuillez selectionner un nombre</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div id="email">

                        </div>
                        <div class="col-sm-12 mt-4">
                            <label  for="message">Message</label>
                            <textarea form="partage" for="textarea" name="textarea"   class="form-control">Salut c'est <?= $_SESSION['user']['pseudo']?>,<?="\n"?>Je te recommande ce sondage de 2Choose dont la question est : <?=$sondage[0]->question?><?="\n"?>Répond y vite et donne moi ton avis ! <?="\n"?>Ton ami(e) <?= $_SESSION['user']['pseudo']?></textarea>
                        </div>
                       
                        <div class="col-sm-12 mt-4 offset-ms-4">
                            
                            <button type="submit" name="send" class="btn btn-info btn-block active">Envoyez</button>
                            
                        </div>
                    </div>
                </div>
                </form> 
            </div>
        </section>

</main>
<?php include '../inc/footer.inc.php'?>
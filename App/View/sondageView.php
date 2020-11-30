<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php'; ?>
<main>
    <button class="btn btn-info active" style="float:right; margin-right:40px">Partager ce sondage</button><br><br>

    <section id="sondage">
        <h2><?=$sondage[0]->question?></h2>
        <br><br>
        <div class="sond">
            <button>
                <h4>Oui</h4>
            </button>
            <br><br>
            <button>
                <h4>Non</h4>
            </button>
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
            <p>30 votes</p>
        </div>
    </section>
    <br><br><br>
    <section id="com">
        <h2>Commentaire</h2>
        <br><br>
        <div class="msg">
            <div>
                <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
                <p>Pseudo</p>
                <p>27/10</p>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident voluptates quidem ab accusamus
                    modi cupiditate? Voluptas error ipsam repudiandae delectus amet consectetur impedit tempora neque
                    libero? Aliquid magnam dignissimos nemo.</p>
            </div>
        </div>
        <br>
        <button class="btn btn-info active" style="margin:0 auto; display:block">Ajouter un commentaire</button>
        <br>
    </section>

    <div id="fond"></div>
        <section class="col-sm-7 mx-auto" id="shareSondage">
            <div class="card position-static">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <i class="fas fa-times"></i>
                <div class="card-body">
                    <h2 class="card-title">Partager le sondage<br>la question de folie</h2>
                    <div class="row ">
                        <div class="col-sm-12 mt-4">
                            <label for="nbPerson">Nombre de personne</label>
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
                            <input id="message" name="msg" class="form-control" value="Salut, '<?php ?>'" rows="5">
                        </div>
                        <div class="col-sm-12 mt-4 offset-ms-4">
                            <button type="submit" class="btn btn-info btn-block active">Envoyez</button>
                        </div>
                        <?php echo $msg ?>
                    </div>
                </div>
                </form> 
            </div>
        </section>

</main>
<?php include '../inc/footer.inc.php'?>
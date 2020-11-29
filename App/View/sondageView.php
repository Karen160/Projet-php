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

</main>
<?php include '../inc/footer.inc.php'?>
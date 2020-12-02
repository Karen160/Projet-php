<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php'; ?>
<main>
    <form class="form-inline">
        <input class="form-control mr-sm-0" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="white"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                <path fill-rule="evenodd"
                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
            </svg>
        </button>
    </form>
    <section id="mesSond">
        <h2>Résultat global</h2>
        <div class="conteneur">
            <?php foreach( $requete[2] as $sondageResult) : ?>
            <div class="boxsondage">
                <a href="index.php?page=sondage&sondage=<?=$sondageResult->question_id?>">
                    <img src="<?= $sondageResult->image ?>"
                        alt="Image de la question <?= $sondageResult->question ?> ">
                    <span>Date de fin : Finit depuis le <?= $sondageResult->date_fin ?></span>
                    <p><?= $sondageResult->question ?></p>
                </a>
                <br>
            </div>
            <?php endforeach;?>
        </div>
    </section>
    <section id="mesSond">
        <h2>Les résultat de mes sondages</h2>
        <div class="conteneur">
            <?php foreach( $requete[3] as $sondageResultPerso) : ?>
            <div class="boxsondage">
                <a href="index.php?page=sondage&sondage=<?=$sondageResult->question_id?>">
                    <img src="<?= $sondageResultPerso->image ?>"
                        alt="Image de la question <?= $sondageResultPerso->question ?> ">
                    <span>Date de fin : Finit depuis le <?= $sondageResultPerso->date_fin ?></span>
                    <p><?= $sondageResultPerso->question ?></p>
                </a>
                <br>
            </div>
            <?php endforeach;?>
        </div>
    </section>
</main>
<?php include '../../inc/footer.inc.php' ?>
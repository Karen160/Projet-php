<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php'; ?>
<main>
    <section class="col-sm-7 mx-auto" id="newSondage">
        <div class="card position-static">
            <form class="card-body" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <h2 class="card-title">Créer un sondage</h2>
                <div class="  col-sm-12 mt-3">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" placeholder="Entrez votre question"
                        required="required" data-error="La question est requise.">
                </div>
                <div class="  col-sm-12 mt-3">
                    <label for="image">Lien de l'image</label>
                    <input type="text" name="image" class="form-control" placeholder="Entrez le lien de votre image"
                        required="required" data-error="L'image est requise.">
                </div>
                <div class="  col-sm-12 mt-3">
                    <label for="reponseNb ">Nombre de réponse</label>
                    <select id="reponseNb" type="text" name="nbquestion" class="form-control"
                        placeholder="Nombre de vos proposition de réponse" required="required"
                        data-error="Le nombre de réponse est requis.">
                        <option value="0" selected>Selectionnez un nombre</option>
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
                <div id="proposition" required="required">
                </div>
                <div class="col-sm-12 mt-3">
                    <label for="date">Date d'expiration</label>
                    <input type="date" name="date" class="form-control" placeholder="Choisissez la date d'expiration"
                        required="required" data-error="La date d'expiration est requise.">
                </div>
                <div class="  col-sm-12 mt-4 offset-ms-4">
                    <button id="boutonPropo" type="submit" class="btn btn-info btn-block active">Envoyez</button>
                </div>
            </form>
        </div>
        <?php  echo $msg; ?>
    </section>
</main>
<?php include '../inc/footer.inc.php'?>
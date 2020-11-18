<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php'; ?>
<main>
<section class="col-sm-7 " id="formSondage" >
            <div class="card position-static" >
                <div class="card-body">
                    <h2 class="card-title">Créer un sondage</h2>
                    <div class="row ">
                            <div class="col-sm-12 mt-4">
                                <label for="form_name ">Question</label>
                                <input id="form_name" type="text" name="question" class="form-control" placeholder="Entrez votre question" required="required" data-error="La question est requise.">
                            </div>
                            <div class="col-sm-12 mt-4"> 
                                <label for="form_name ">Lien de l'image</label>
                                <input id="form_name" type="text" name="image" class="form-control" placeholder="Entrez le lien de votre image" required="required" data-error="L'image est requise.">
                            </div>
                            <div class="col-sm-12 mt-4">
                                <label for="form_name ">Nombre de réponse</label>
                                <select id="form_name" type="text" name="nbquestion" class="form-control" placeholder="Choisissez le nombre de réponse" required="required" data-error="Le nombre de réponse est requis.">
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
                            </div>
                            <div class="col-sm-12 mt-4"> 
                                <label for="form_name ">Date d'expiration</label>
                                <input id="form_name" type="date" name="date" class="form-control" placeholder="Choisissez la date d'expiration" required="required" data-error="La date d'expiration est requise.">
                            </div>
                            <div class="col-sm-12 mt-4 offset-ms-4"> 
                                <button class="btn btn-info btn-block active" >Envoyez</button>
                            </div>
                    </div>
                </div>
            </div>
        </section>

</main>
<?php include '../../inc/footer.inc.php'?>
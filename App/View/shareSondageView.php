<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php'; ?>
<main>
    <section class="col-sm-7 mx-auto" id="shareSondage">
        <div class="card position-static">
            <div class="card-body">
                <h2 class="card-title">Partager le sondage</h2>
                <div class="row ">
                    <div class="col-sm-12 mt-4">
                        <label for="form_name ">Nombre de personne</label>
                        <select id="form_name" type="text" name="nbpersonne" class="form-control"
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
                    </div>
                    <div class="col-sm-12 mt-4">
                        <label for="form_name ">Message</label>
                        <textarea id="form_name" name="msg" class="form-control" placeholder="Votre message..."
                            rows="5"></textarea>
                    </div>
                    <div class="col-sm-12 mt-4 offset-ms-4">
                        <button class="btn btn-info btn-block active">Envoyez</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php include '../../inc/footer.inc.php'?>
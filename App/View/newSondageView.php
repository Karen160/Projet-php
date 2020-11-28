<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php'; ?>
<main>
    <section class="col-sm-7 mx-auto" id="newSondage">
        <div class="card position-static">
            <form class="card-body" method="post">
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
                    <button id="bouton" type="submit" class="btn btn-info btn-block active">Envoyez</button>
                </div>
            </form>
        </div>
        <?php  echo $msg;?>
    </section>
</main>
<?php include '../../inc/footer.inc.php'?>

<script>
    //Permet d'afficher le bon nombre de champ a remplir pour le choix de proposition de réponse que souhaite mettre l'internaute sur sa question
    var i = 0;
    $("#reponseNb").change(function () {
        let nbInput = $(this).val();

        $("#proposition").html("");
        
        while (i < nbInput) {
            $("#proposition").append("<div class='col-sm-12 mt-3'> <label for='proposition'>Proposition " + (i +
                    1) +
                "</label><input type='text' name='proposition" + (i+1) + "' class='form-control' placeholder='Entrez votre proposition' required='required'></div>"
                );
            i++;
        }
    });

    $("#bouton").click(function(){
        var nbReponse = i;
        console.log(nbReponse);
    })
    
    
</script>
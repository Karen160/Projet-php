<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php';
?>
<main id="signMain">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <section class="col-sm-5 position-static" id="inscription" >
            <form method="POST" id="signForm" class=" position-static">
                <div class="card form_group " >
                    <div class="card-body">
                        <h2 class="card-title">Inscription</h2>
                        <div class="row ">
                            <div class="col-sm-6 position-static">
                                <label for="form_name ">Nom</label>
                                <input id="form_name" type="text" name="nom" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le nom est requis.">
                            </div>
                            <div class="col-sm-6 position-static"> 
                                <label for="form_name ">Prénom</label>
                                <input id="form_name" type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom" required="required" data-error="Le prénom est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static">
                                <label for="form_name ">Pseudo</label>
                                <input id="form_name" type="text" name="pseudo" class="form-control" placeholder="Choisissez un pseudo" required="required" data-error="Le pseudo est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Mail</label>
                                <input id="form_name" type="text" name="email" class="form-control" placeholder="Entrez votre email" required="required" data-error="Le mail est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Password</label>
                                <input id="form_name" type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static offset-ms-4"> 
                                <button type="submit" class="btn btn-info btn-block active" >Envoyez</button>
                            </div>
                    </form>
                </div>
            </form>
            
        </section>
        <section class="col-sm-5 mx-auto mt-5 position-static"  >
            <form>
                <div class="card " >
                    <div  class="card-body  position-static " id="connexion">
                        <h2 class="card-title ">Connexion</h2>
                        <div class="row">
                            <div class="col-sm-12 position-static">
                                <label for="form_name ">Pseudo</label>
                                <input id="form_name" type="text" name="pseudo" class="form-control" placeholder="Entrez votre nom" required="required" data-error="Le Pseudo est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static"> 
                                <label for="form_name ">Password</label>
                                <input id="form_name" type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required="required" data-error="Le mot de passe est requis.">
                            </div>
                            <div class="col-sm-12 mt-4 position-static offset-ms-4"> 
                                <button type="submit" action="signView.php" class="btn btn-info btn-block active" >Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </section>
    </div>
</main>
<?php
include '../../inc/footer.inc.php';
?>
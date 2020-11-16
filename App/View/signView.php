<?php 
include '../../inc/head.inc.php'; 
include '../../inc/header.inc.php'; ?>
    <main>
            <div class="row">
                
                <section class="col-sm-5 ml-5 mt-4" >
                    <div class="card" >
                        <div class="card-body">
                            <h2 class="card-title">Inscription</h2>
                            <div class="row">
                                 <div class="col-sm">
                                    <label for="form_name ">Name *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name" required="required" data-error="name is required.">
                                 </div>
                                 <div class="col-sm-4">

                                 </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-sm-6 ml-4 mt-4">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Inscription</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </section>
            </div>
    </main>
<?php include '../../inc/footer.inc.php'; ?>
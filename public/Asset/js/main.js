//Menu burger
$('.fa-bars').click(function(){ //Ouvre le menu en appuyant sur les traits
    $('nav').show("slow");
    $('main').css('display', 'none');
});
                      
$('nav i').click(function(){ //Appuie sur la croix
   $('nav').hide("slow");
   $('main').css('display', 'block');
});

$('nav a').click(function(){ //Appuie sur le menu
   $('nav').hide("slow");
   $('main').css('display', 'block');
});


//Bouton ajout commentaire
$('#commentaire .combutton').click(function(){
   $('#commentaire .monCom').css('display', 'block');
   $(this).css('display', 'none');
});


//Rechargement de la page sondage pour mise à jour des commentaires
setInterval('load_commentaire()', 500);
   function load_commentaire(){
       $('#com').load('#com .msg')
};

//Rechargement de la page sondage pour mise à jour des résultats des sondages
setInterval('load_resultat()', 500);
   function load_resultat(){
       $('#sondage .sond .reload').load('#sondage .sond .reload')
};


//Pop up partage
$(".pop").click(function(){
   $("#shareSondage").show("slow");
});

$('#shareSondage i').click(function(){ //Appuie sur la croix
   $('#shareSondage').hide("slow");
});

//Nombre de reponse
//Permet d'afficher le bon nombre de champ a remplir pour le choix de proposition de réponse que souhaite mettre l'internaute sur sa question
$("#reponseNb").change(function () {
 
    let nbInput = $(this).val();

    var i = 0;
    
    $("#proposition").html("");
    while (i < nbInput) {
        $("#proposition").append("<div class='col-sm-12 mt-3'> <label for='proposition'>Proposition " + (i+1) + "</label><input type='text' name='proposition" + (i+1) + "' class='form-control' placeholder='Entrez votre proposition' required='required'></div>");
        i++;
        
    }
});

//Nombre email
$("#formNbPerson").change(function () {
    let nbPerson = $(this).val();
    var j = 0;
    $("#email").html("");
    while (j < nbPerson) {
        $("#email").append("<div class='col-sm-6  mt-3'> <label for='email'>Adresse email " + (j +1) + "</label><input type='text' name='email" + (j+1) + "' class='form-control' placeholder='Entrez email' required='required'></div>");
        j++;
    }
});
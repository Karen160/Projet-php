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



//Pop up partage
$(".share").click(function(){
    $("#shareSondage").show();
})


//Nombre de reponse / email
//Permet d'afficher le bon nombre de champ a remplir pour le choix de proposition de réponse que souhaite mettre l'internaute sur sa question
$("#reponseNb").change(function () {
    let nbInput = $(this).val();

    var i = 0;
    $("#proposition").html("");
    while (i < nbInput) {
        $("#proposition").append("<div class='col-sm-12 mt-3'> <label for='proposition'>Proposition " + (i +1) + "</label><input type='text' name='proposition" + (i+1) + "' class='form-control' placeholder='Entrez votre proposition' required='required'></div>");
        i++;
    }
});

$("#boutonPropo").click(function(){
    var nbReponse = i;
    console.log(nbReponse);
})

$.ajax({
    url: '../../../App/Model/newSondageModel.php',
    data: 'nbReponse='+ nbReponse,
    success: function(reponse) {
      alert(reponse); // reponse contient l'affichage du fichier PHP (soit echo)
    }
  });
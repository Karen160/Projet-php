//Menu burger
$('.fa-bars').click(function(){ //Ouvre le menu en appuyant sur les traits
     $('nav').show("slow");
});
                       
$('nav i').click(function(){ //Appuie sur la croix
    $('nav').hide("slow");
});

$('nav a').click(function(){ //Appuie sur le menu
    $('nav').hide("slow");
});



//Pop up partage
$(".share").click(function(){
    $("#shareSondage").show();
})


//Nombre de reponse / email
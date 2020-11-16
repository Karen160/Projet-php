//Menu burger


$('.fa-bars').click(function(){ //Ouvre le menu en appuyant sur les traits
     $('nav').show(3000);
});
                       
$('nav i').click(function(){ //Appuie sur la croix
    $('nav').css('display','none');
});

$('nav a').click(function(){ //Appuie sur le menu
    $('nav').css('display','none')
});
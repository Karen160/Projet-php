//Menu burger
// var tlmenu = new TimelineMax({paused:true});
// tlmenu.to('nav', 1, {opacity:0.9, autoAlpha:1});

// var tlmenuAnim = new TimelineMax({paused:false});//pour que mon animation démarre seulement lorsque mes fonctions sont actives et que ça n'impact pas ma nav normal

$("#menu").click(function(){ //Ouvre le menu en appuyant sur les traits
    // tlmenu.play(0);
    // tlmenuAnim.staggerFromTo('nav a', 0.7, {x:200, opacity:0}, {x:0, opacity:1}, 0.1); //animation a 
    // $(this).slideToggle('.boutonFermer') //Apparition de la croix pour fermer
     $("nav").css('display','block');
})
                       
// $('.boutonFermer p').click(function(){ //Appuie sur la croix
//     tlmenu.reverse(0);
//     tlmenuAnim.staggerFromTo('nav a', 0.2, {x:0, opacity:1}, {x:200, opacity:0}, 0.1); //animation a 
//     $(this).slideToggle('.click') //Apparition des traits
//     $('.fa-bars').css('display','block');
// });

// $('.menu').click(function(){ //Appuie sur le menu
//     tlmenu.reverse(0);
//     $('.fa-bars').css('display','block')
//     $('.boutonFermer p').css('display','none');
// });
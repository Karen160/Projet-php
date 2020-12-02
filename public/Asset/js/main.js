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

// var xhr = new XMLHttpRequest();

// xhr.onreadystatechange = function(){
//     console.log(this);
// };

// xhr.open("GET", "async/text", true); //requete
// xhr.send();


// $('#com .com2').click(function(e){
//     e.preventDefault();
//     let com = $(".monCom").serializeArray();

//     $.ajax({
//         url:"index.php?page=sondage",
//         method:"POST",
//         dataType:"json",
//         data:com,
//         error:function(response){
//             console.log(response.statusText);
//         }
//     })
//     getCom();  
    
//     // $('#com').load("load.php");
//     // setInterval(function(){
//     //     $('#com').load("load.php");
//     // }, 3000);
// });
    
// function getCom(){
//     $.ajax({
//         url:"index.php?page=sondage",
//         method:"GET",
//         dataType:"json",
//         success:function(response){
//             $(".msg").html("");
//             let i = 0
//             response.forEach(com => {
//                 $(".msg").append("<div><p>'" + com[0] + "'</p><p>'"+ com[1] +"'</p></div><div><p>'" + com[2] + "'</p></div>");
//                 i++;
//             });
//         },
//         error:function(response){
//             console.log(response.statusText);
//         }
//     })
// }



setInterval('load_messages()', 500);
    function load_messages(){
        $('#com').load('#com .msg')
};





//Pop up partage
$(".pop").click(function(){
    $("#shareSondage").show("slow");
});

$('#shareSondage i').click(function(){ //Appuie sur la croix
    $('#shareSondage').hide("slow");
});


//Nombre de reponse / email
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

$("#formNbPerson").change(function () {
    let nbPerson = $(this).val();
    var j = 0;
    $("#email").html("");
    while (j < nbPerson) {
        $("#email").append("<div class='col-sm-6  mt-3'> <label for='email'>Adresse email " + (j +1) + "</label><input type='text' name='email" + (j+1) + "' class='form-control' placeholder='Entrez email' required='required'></div>");
        j++;
    }
});

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
/**Retourne la valeur du select selectId*/
// function getSelectValue(selectId)
// {
// 	/**On récupère l'élement html <select>*/
// 	var selectElmt = document.getElementById(selectId);
// 	/**
// 	selectElmt.options correspond au tableau des balises <option> du select
// 	selectElmt.selectedIndex correspond à l'index du tableau options qui est actuellement sélectionné
// 	*/
// 	return selectElmt.options[selectElmt.selectedIndex].value;
// }

// var selectValue = getSelectValue('nb');
// var i = 0;

// while(i<selectValue){
//     $("#email").html("<div class='col-sm-12 mt-3'> <label for='form_name '>Lien de l'image</label><input type='text' name='image' class='form-control' placeholder='Entrez le lien de votre image' required='required'></div>");
//     i++;
// }

var selectElmt = document.getElementById("reponseNb");
var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

console.log(valeurselectionnee);
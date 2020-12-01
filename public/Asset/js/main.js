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
$('.com').click(function(){
    $('#com .monCom').css('display', 'block');
    $(this).css('display', 'none');
});

// var xhr = new XMLHttpRequest();

// xhr.onreadystatechange = function(){
//     console.log(this);
// };

// xhr.open("GET", "async/text", true); //requete
// xhr.send();


$('#com .com2').click(function(){
    /**
 * Il nous faut une fonction pour récupérer le JSON des
 * messages et les afficher correctement
 */
function getMessages(){
    // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "index.php?page=sondage");
  
    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    requeteAjax.onload = function(){
      const resultat = JSON.parse(requeteAjax.responseText);
      const html = resultat.reverse().map(function(commentaire){
        return `
            <textarea name="commentaire" id="commentaire" class="form-control" placeholder="Mon commentaire...">${commentaire.content}</textarea>
            <br>            
            <button name="sendcom" id="com2" class="btn btn-info com2 active" type="submit" style="margin:0 auto; display:block">Envoyez</button>
            <br>
        `
      }).join('');
  
      const commentaires = document.querySelector('.monCom');
  
      commentaires.innerHTML = html;
      commentaires.scrollTop = commentaires.scrollHeight;
    }
  
    // 3. On envoie la requête
    requeteAjax.send();
  }
  
  /**
   * Il nous faut une fonction pour envoyer le nouveau
   * message au serveur et rafraichir les messages
   */
  
  function postCommentaire(event){
    // 1. Elle doit stoper le submit du formulaire
    event.preventDefault();
  
    // 2. Elle doit récupérer les données du formulaire
    const com = document.querySelector('#commentaire');
  
    // 3. Elle doit conditionner les données
    const data = new FormData();
    data.append('com', com.value);
  
    // 4. Elle doit configurer une requête ajax en POST et envoyer les données
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'index.php?page=sondageCom');
    
    requeteAjax.onload = function(){
      com.value = '';
      com.focus();
      getCommentaire();
    }
  
    requeteAjax.send(data);
  }
  
  document.querySelector('form').addEventListener('submit', postCommentaire);
  
  /**
   * Il nous faut une intervale qui demande le rafraichissement
   * des messages toutes les 3 secondes et qui donne 
   * l'illusion du temps réel.
   */
  const interval = window.setInterval(getCommentaire, 3000);
  
  getMessages();
});








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

// var notre = {};
// notre.id = 5;
// $("#boutonPropo").click(function(){
    
    // console.log(notre);
// })

// $.ajax({
//     url:'../../index.php?page=newSondage',
//     method: "POST",
//     data: notre,
//     success: function(){
//         console.log("tu as géré")
//     }
// });

//'../../index.php?page=newSondage'
//'../../../root.php?function=newSondage'
//'../../../App/Model/newSondageModel.php'
//'../../../App/Controller/newSondageController.php'


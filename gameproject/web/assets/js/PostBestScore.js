//On récupérer le score du joueur à la fin du jeu pour l'envoyer dans la BDD via la méthode ajax 
function postScore(score){
        
    $.ajax({
           
        method : 'post',
        url: path2,//action de la route best-score 
        data: {scoreEnvoye:score}
               
    })
    .done(function(data){
        //route qui renvoie à la page de fin de partie
        window.location = path3;
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        console.log('problème envoi du score');
        return null;
    });
        
  
}
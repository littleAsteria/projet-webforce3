//On récupérer le score du joueur à la fin du jeu pour l'envoyer dans la BDD via la méthode ajax 
function postScore(score){
        
    $.ajax({
           
        method : 'post',
        url: path2,//action de la route best-score 
        
               
    })
    .done(function(data){
        //console.log('done');
        window.location = path3;
        //route qui renvoie à la page de fin de partie
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        return null;
    });
        
  
}
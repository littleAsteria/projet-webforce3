//Prend en paramètre une difficulté, un tableau d'id et une fonction callback
//Le PHP renverra une question aléatoire de la difficulté spécifiée, en excluant toutes les questions dont l'id est dans le tableau passé en deuxième paramètre
//La fonction callback passée en troisième paramètre sera appelée lorsque la requête aura réussi
function getRandomQuestion(difficulty, excluded, callback){
    $.ajax({
        method : 'get',
        url : path,
        data : {
            difficulty : difficulty,
            excluded : excluded 
        }
    })
    
    .done(function(data){
        if(callback != undefined) callback(data);
        
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        console.log('problème récupération de la question');
        return null;
    });
    
   
}


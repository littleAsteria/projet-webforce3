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
        console.log(excluded);
        
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        console.log(excluded);
        return null;
    });
    
   
}


function getRandomQuestion(difficulty, callback){
    $.ajax({
        method : 'get',
        url : path,
        data : {difficulty : difficulty}
    })
    
    .done(function(data){
        if(callback != undefined) callback(data);
        
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        return null;
    });
}


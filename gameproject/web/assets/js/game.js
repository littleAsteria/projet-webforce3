$(function(){
    
    var currentQuestion;
   
    $.ajax({
        method : 'get',
        url : path,
        data : {difficulty : 1},
    })
   
    .done(function(data){
        console.log(data);
        currentQuestion = data;

    })
    
    .fail(function(jqXHR, textStatus){
        console.log(textStatus);
    });
   
});


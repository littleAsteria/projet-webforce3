$(function(){
   console.log('hi');
   
    $.ajax({
        method : 'get',
        url : path,
        data : {difficulty : 1},
        //dataType : 'json'
       
    })
   
    .done(function(data){
        console.log(data);

    })
    
    .fail(function(jqXHR, textStatus){
        console.log(textStatus);
    });
   
});


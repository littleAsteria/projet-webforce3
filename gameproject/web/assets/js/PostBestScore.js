function postScore(score){
        
    $.ajax({
           
        method : 'post',
        url: path2,
        data:{scoreEnvoye:score}
        
               
    })
    .done(function(data){
        console.log('done');
        
    })
    
    .fail(function(jqXHR, textStatus){
        console.log(jqXHR);
        return null;
    });
        
  
}
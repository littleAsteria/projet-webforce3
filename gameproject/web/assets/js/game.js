$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    var chosenAnswer;
    
    var score = 0;
     
    getRandomQuestion(currentDifficulty, function(data){
        currentQuestion = data;
        //console.log(currentQuestion);
        affichageDonnees(currentQuestion, currentQuestionNumber);
        
    //en début de partie, le score commence à 0    
   
    
    });
    
    
    $('.reponseButton').on('click', function(e){
        chosenAnswer = $(this).attr('id').substr(-1).toLowerCase();
    });
    
    $('#valider').on('click', function(e){
        if(chosenAnswer != undefined){
            
            if(verificationReponse(chosenAnswer, currentQuestion)){
                
                
                score = scoreRequest(score, currentDifficulty);
                console.log(score);
            }
                
            else {
                
                console.log('mauvaise réponse !');
            }
        }

        else {
            
            console.log('aucune réponse donnée');
        }

    });
    
    

    
});


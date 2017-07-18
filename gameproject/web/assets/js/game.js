$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    

    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    getRandomQuestion(currentDifficulty, function(data){
        currentQuestion = data;
        //console.log(currentQuestion);
        affichageDonnees(currentQuestion, currentQuestionNumber);
    
    var chosenAnswer;
    
    
    $('.reponseButton').on('click', function(e){
        chosenAnswer = $(this).attr('id').substr(-1).toLowerCase();
    });
    
    $('#valider').on('click', function(e){
        if(chosenAnswer != undefined){
            if(verificationReponse(chosenAnswer, currentQuestion)){
                console.log('bonne réponse !')
            }
                
            else {
                console.log('mauvaise réponse !')
            }
        }

        else {
            console.log('aucune réponse donnée');
        }

    });
    
    

    
});


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
    });
    
    

    
});


$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    getRandomQuestion(currentDifficulty, function(data){
        currentQuestion = data;
        console.log(currentQuestion);
    });

    
});


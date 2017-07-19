$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    var chosenAnswer;
    var usedQuestions = [];
  
    //en début de partie, le score commence à 0
    var score = 0;
    
    var wrongAnswers = 0;

    
    getQuestion();
    
    $('#joker1').on('click', clickJokerQuestion);
    $('#joker2').on('click', clickJokerMoitie);
    
    $('.reponseButton').on('click', function(e){
        chosenAnswer = $(this).attr('id').substr(-1).toLowerCase();
        $('.reponseButton').removeClass('btn-success');
        $('.reponseButton').addClass('btn-primary');
        
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        
    });
    
    $('#valider').on('click', function(e){
        if(chosenAnswer != undefined){
            

            $('.reponseButton').removeClass('btn-success');
            $('.reponseButton').addClass('btn-primary');
            
            
            if(currentQuestionNumber < 10){
            
                if(verificationReponse(chosenAnswer, currentQuestion)){

                    score = scoreRequest(score, currentDifficulty);
                    currentDifficulty++;
                    currentQuestionNumber++;
                    usedQuestions = [];
                    getQuestion();
                }

                else {

                    currentQuestionNumber++;
                    wrongAnswers++;
                    getQuestion();
                    
                    if(wrongAnswers == 3) postScore(score);
                }
            }
            
            else if(currentQuestionNumber == 10) {
                
                if(verificationReponse(chosenAnswer, currentQuestion)){
                    score = scoreRequest(score, currentDifficulty);
                }
                
                postScore(score);
            }
        }

        else {
            
            console.log('aucune réponse donnée');
        }

    });
    
    function getQuestion(){
        getRandomQuestion(currentDifficulty, usedQuestions, function(data){
            currentQuestion = data;
            usedQuestions.push(currentQuestion.id_question);
            affichageDonnees(currentQuestion, currentQuestionNumber);
            $('.reponseButton').removeClass('barre');
        });
    }
    
    function clickJokerQuestion(){
    
        getQuestion();
        $(this).removeClass('btn-primary');
        $(this).addClass('disabled');
        $(this).off('click', clickJokerQuestion);
    
    }
    
    function clickJokerMoitie(){
    
        $(this).removeClass('btn-primary');
        $(this).addClass('disabled');
        $(this).off('click', clickJokerMoitie);
        removeTwoAnswers(currentQuestion)
    
    }

    
});


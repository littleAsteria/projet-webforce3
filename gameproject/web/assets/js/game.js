$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    var chosenAnswer;
    
    var usedQuestions = [];
    
    getQuestion();
    
    $('#joker1').on('click', function(e){
        getQuestion();
    });
    
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

                    currentDifficulty++;
                    currentQuestionNumber++;
                    usedQuestions = [];
                    getQuestion();

                }

                else {

                    currentQuestionNumber++;
                    getQuestion();
                }
            
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
        });
    }

    
});


$(function(){
    
    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    var chosenAnswer;
    
    
    getQuestion();
    
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
            
            if(verificationReponse(chosenAnswer, currentQuestion)){
                
                console.log('bonne réponse !');
                
                if(currentQuestionNumber < 10) {
                    currentDifficulty++;
                    currentQuestionNumber++;
                    getQuestion();
                }
            }
                
            else {
                console.log('mauvaise réponse !')
            }
        }

        else {
            console.log('aucune réponse donnée');
        }

    });
    
    function getQuestion(){
        getRandomQuestion(currentDifficulty, function(data){
            currentQuestion = data;
            affichageDonnees(currentQuestion, currentQuestionNumber);
        });
    }

    
});


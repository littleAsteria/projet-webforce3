$(function(){
    //pour afficher les infos-bulles des jokers
    $('[data-toggle="tooltip"]').tooltip()

    var currentQuestion;
    var startingDifficulty = 1;
    var currentDifficulty = startingDifficulty;
    
    var startingQuestionNumber = 1;
    var currentQuestionNumber = startingQuestionNumber;
    
    var chosenAnswer;
    var usedQuestions = [];
    
    var deactivatedButtons = [];
  
    //en début de partie, le score commence à 0
    var score = 0;
    
    //compteur de mauvaises réponses
    var wrongAnswers = 0;
    
    //compteur de bonnes réponses à la suite
    var goodAnswersInARow = 0;
    
    //nombre de bonnes réponses à la suite requises pour faire un combo
    var comboRequirement = 3;
    
    var nextQuestionTimer = 10000;
    var suspensTimer = 1000;
    
    var isFiftyUsed = false;
    var isSwapUsed = false;
    
    //console.log('réponses requises pour un combo : ' + comboRequirement);
    
    getQuestion();
    
    $('#joker1').on('click', clickJokerQuestion);
    $('#joker2').on('click', clickJokerMoitie);
    
    //
    $('.reponseButton').on('click', onClickReponse);

    //quand on valide la reponse à la question:
    $('#valider').on('click', onValidateClick);
    
    
    function onClickReponse(){
        
        //Récupère la lettre du bouton sur lequel on a cliqué et la stocke dans une variable
        chosenAnswer = $(this).attr('id').substr(-1).toLowerCase();
        
        //Repasse tous les boutons en bleu
        $('.reponseButton').removeClass('reponseButton-selected');
        $('.reponseButton').addClass('reponseButton-primary');
        
        //Passe le bouton cliqué en vert
        $(this).removeClass('reponseButton-primary');
        $(this).addClass('reponseButton-selected');
    }
    
    //fonction qui va chercher une nouvelle question via l'ajax, récupère son id,
    //et affiche la question à l'écran
    function getQuestion(){
        getRandomQuestion(currentDifficulty, usedQuestions, function(data){
            
            reactivateButton();
            currentQuestion = data;
            usedQuestions.push(currentQuestion.id_question);
            affichageDonnees(currentQuestion, currentQuestionNumber);
            
            //Si les deux jokers ont été utilisés pour cette question
            if(isFiftyUsed && isSwapUsed){
                
                deactivatedButtons = removeTwoAnswers(currentQuestion);
                deactivateButtons();
                isFiftyUsed = false;
                isSwapUsed = false;
            }
            
        });
    }
    
    //Va chercher une nouvelle question et désactive le joker
    function clickJokerQuestion(){
    
        getQuestion();
        $(this).removeClass('jokerButton-primary');
        $(this).addClass('disabled');
        $(this).off('click', clickJokerQuestion);
        isSwapUsed = true;
        
    }
    
    //Barre deux mauvaises réponses et désactive le joker
    function clickJokerMoitie(){
    
        $(this).removeClass('jokerButton-primary');
        $(this).addClass('disabled');
        $(this).off('click', clickJokerMoitie);
        
        //Stocke les deux boutons éliminés dans un tableau
        deactivatedButtons = removeTwoAnswers(currentQuestion);
        isFiftyUsed = true;
        deactivateButtons();
        
    }
    
    function deactivateButtons(){
        
        //Désactive tous les boutons stockés dans le tableau
        for (i = 0; i < deactivatedButtons.length; i++){
            
            $('#'+ deactivatedButtons[i]).removeClass('reponseButton-primary');
            $('#'+ deactivatedButtons[i]).addClass('disabled');
            $('#'+ deactivatedButtons[i]).off('click', onClickReponse);
        }
    }
    
    function reactivateButton(){
        
        //Résactive tous les boutons stockés dans le tableau
        for (i = 0; i < deactivatedButtons.length; i++){
            $('#'+ deactivatedButtons[i]).removeClass('disabled');
            $('#'+ deactivatedButtons[i]).addClass('reponseButton-primary');
            $('#'+ deactivatedButtons[i]).on('click', onClickReponse);
        }
        
        //Vide le tableau
        deactivatedButtons = [];
    }

    function onValidateClick(){
        
        if(chosenAnswer != undefined){
            
            //Désactive le bouton validation
            $(this).removeClass('validateButton-primary');
            $(this).addClass('disabled');
            $(this).off('click', onValidateClick);
            
            //Timer de suspens
            setTimeout(function(){
            
                /*$('.reponseButton').animate({
                    height: 'toggle'
                });*/
                
                showAnswers(currentQuestion, chosenAnswer);

                //Timer avant d'afficher la prochaine question
                setTimeout(function(){ 

                    //Si le numéro de la question actuelle est inférieur à 10
                    if(currentQuestionNumber < 10){

                        //Si le joueur a donné la bonne réponse
                        if(verificationReponse(chosenAnswer, currentQuestion)){

                            goodAnswersInARow++;

                            //Si le joueur a réussi à faire un combo
                            if(goodAnswersInARow == comboRequirement){
                                score = scoreRequest(score, currentDifficulty, true);
                                goodAnswersInARow = 0;
                            }

                            else score = scoreRequest(score, currentDifficulty, false);

                            //On augmente la difficulté, le numéro de la question actuelle,
                            //on reset le tableau d'id déjà passées et on va chercher une nouvelle question
                            currentDifficulty++;
                            currentQuestionNumber++;
                            usedQuestions = [];
                            getQuestion();
                        }

                        //Si le joueur donne une mauvaise réponse à la question alors
                        else {

                            currentQuestionNumber++;
                            wrongAnswers++;
                            goodAnswersInARow = 0;
                            getQuestion();
                            
                            //console.log(score);
                            //Si le joueur répond à 3 mauvaises réponses alors la partie s'arrête
                            if(wrongAnswers == 3) postScore(score);
                        }
                    }

                    //Si le joueur en est à la dernière question
                    else if(currentQuestionNumber == 10) {

                        if(verificationReponse(chosenAnswer, currentQuestion)){

                            goodAnswersInARow++;

                            if(goodAnswersInARow == comboRequirement){
                                score = scoreRequest(score, currentDifficulty, true);
                                goodAnswersInARow = 0;
                            }

                            else score = scoreRequest(score, currentDifficulty, false);
                        }

                        //Fin de la partie
                        postScore(score);
                    }

                    //évite que la couleur de la reponse validée reste verte
                    // en passant à la question suivante
                    $('.reponseButton').removeClass('reponseButton-selected');
                    $('.reponseButton').removeClass('reponseButton-right');
                    $('.reponseButton').removeClass('reponseButton-wrong');
                    $('.reponseButton').addClass('reponseButton-primary');

                    chosenAnswer = undefined;

                    //Réactive le bouton de validation
                    $('#valider').removeClass('disabled');
                    $('#valider').addClass('validateButton-primary');
                    $('#valider').on('click', onValidateClick);
                   

                }, nextQuestionTimer * (currentDifficulty/2));
            
            }, suspensTimer);
            
        }
        //si le joueur valide sans chosir de réponse:
        else {
            
            console.log('aucune réponse donnée');
        }
        
        

    }
    
});


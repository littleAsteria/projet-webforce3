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
    
    var nextQuestionTimer = 2800;
    var suspensTimer = 1000;
    
    var isFiftyUsed = false;
    var isSwapUsed = false;
    
    var comboUpTime = 1000;
    var comboFadeOutTime = 2000;
    
    //console.log('réponses requises pour un combo : ' + comboRequirement);
    
    getQuestion();
    
    $('button').on('click', function(){
        if(!$(this).hasClass('disabled')) gameButtonClickSound.play();
    });
    
    $('#combo').hide();
    
    $('#joker1').on('click', clickJokerQuestion);
    $('#joker2').on('click', clickJokerMoitie);
    
    //
    $('.reponseButton').on('click', onClickReponse);

    //quand on valide la reponse à la question:
    $('#valider').on('click', onValidateClick);
    
    
    gameMusic.play();
    
    console.log('width : ' + window.innerWidth);
    console.log('height : ' + window.innerHeight);
    
    function onClickReponse(){
        
        if(!$(this).hasClass('disabled')) {
        
            //Récupère la lettre du bouton sur lequel on a cliqué et la stocke dans une variable
            chosenAnswer = $(this).attr('id').substr(-1).toLowerCase();

            for (var i = 0; i < $('.reponseButton').length; i++) {

                if(!$('.reponseButton').eq(i).hasClass('disabled')){

                    $('.reponseButton').eq(i).removeClass('reponseButton-selected');
                    $('.reponseButton').eq(i).addClass('reponseButton-primary');
                }
            }


            //Passe le bouton cliqué en vert
            $(this).removeClass('reponseButton-primary');
            $(this).addClass('reponseButton-selected');
        
        }
    }
    
    //fonction qui va chercher une nouvelle question via l'ajax, récupère son id,
    //et affiche la question à l'écran
    function getQuestion(){
        getRandomQuestion(currentDifficulty, usedQuestions, function(data){
            
            reactivateButton();
            currentQuestion = data;
            usedQuestions.push(currentQuestion.id_question);
            affichageDonnees(currentQuestion, currentQuestionNumber);
            gameMusic.fade(0,0.4,2000);
            
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
        if(isFiftyUsed) isSwapUsed = true;
        
        
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
            //$('#'+ deactivatedButtons[i]).off('click', onClickReponse);
        }
    }
    
    function reactivateButton(){
        
        $('.reponseButton').removeClass('reponseButton-selected');
        $('.reponseButton').addClass('reponseButton-primary');
        
        //Résactive tous les boutons stockés dans le tableau
        for (i = 0; i < deactivatedButtons.length; i++){
            
            $('#'+ deactivatedButtons[i]).removeClass('disabled');
            $('#'+ deactivatedButtons[i]).addClass('reponseButton-primary');
            //$('#'+ deactivatedButtons[i]).on('click', onClickReponse);
        }
        
        //Vide le tableau
        deactivatedButtons = [];
    }
    
    function deactivateAllButtons() {
        $('.reponseButton').removeClass('reponseButton-primary');
        $('.reponseButton').addClass('disabled');
    }
    
    function activateAllButtons() {
        $('.reponseButton').removeClass('disabled');
        $('.reponseButton').addClass('reponseButton-primary');
    }

    function onValidateClick(){
        
        if(chosenAnswer != undefined){
            
            gameMusic.fade(0.4,0,2000);
            
            //Désactive le bouton validation
            $(this).removeClass('validateButton-primary');
            $(this).addClass('disabled');
            $(this).off('click', onValidateClick);
            
            deactivateAllButtons();
            
            //Timer de suspens
            setTimeout(function(){
            
                $('.reponseButton').css('padding','0');
                $('.reponseButton').animate({
                    height: 'toggle'
                });
                
                //Timer de fin d'animation précédente
                setTimeout(function(){
                    showAnswers(currentQuestion, chosenAnswer);
                    $('.reponseButton').animate({
                        height: 'toggle'
                    });
                    
                    //Vérification du combo uniquement pour l'affichage
                    if(verificationReponse(chosenAnswer, currentQuestion)) {
                        
                        goodAnswersInARow++;
                        if(goodAnswersInARow == comboRequirement){
                            displayCombo();
                            comboSound.play();
                        }
                        
                        else {
                           correctSound.play(); 
                        }
                    }
                    
                    //Si la réponse est fausse, lancement du son d'erreur
                    else {
                        errorSound.play();
                    }
                    
                }, 800);

                //Timer avant d'afficher la prochaine question
                setTimeout(function(){ 

                    //Si le numéro de la question actuelle est inférieur à 10
                    if(currentQuestionNumber < 10){

                        //Si le joueur a donné la bonne réponse
                        if(verificationReponse(chosenAnswer, currentQuestion)){

                            
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
                    //$('.reponseButton').addClass('reponseButton-primary');
                    
                    activateAllButtons();

                    chosenAnswer = undefined;

                    //Réactive le bouton de validation
                    $('#valider').removeClass('disabled');
                    $('#valider').addClass('validateButton-primary');
                    $('#valider').on('click', onValidateClick);
                   

                }, nextQuestionTimer);
            
            }, suspensTimer * (currentDifficulty / 2));
            
        }
        //si le joueur valide sans chosir de réponse:
        else {
            
            console.log('aucune réponse donnée');
        }

    }
    
    //Permet d'afficher le mot 'combo' et de le faire disparaitre plus tard
    function displayCombo(){
        $('#combo').show();
        setTimeout(function(){
            $('#combo').fadeOut(comboFadeOutTime);
        }, comboUpTime);
    }
    
});


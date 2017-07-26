/*cette fonction prend en paramétres:
 * 1-question (qui correpond à l'objet JSON question)
 * 2-questionNumber qui récupére le numéro de la question
 * */
function affichageDonnees(question, questionNumber){
    $('#questionNumber').html('Question n° ' + questionNumber);
    
    $('#questionText').html(question.question);
    
    $('#reponseA').html(question.reponseA);
    
    $('#reponseB').html(question.reponseB);
    
    $('#reponseC').html(question.reponseC);
    
    $('#reponseD').html(question.reponseD);
}



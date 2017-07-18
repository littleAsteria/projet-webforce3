/*cette fonction prend en paramétres:
 * 1-question (qui correpond à l'objet JSON question)
 * 2-questionNumber qui récupére le numéro de la question
 * */
function affichageDonnees(question, questionNumber){
    $('#questionNumber').html('Question n° ' + questionNumber);
    //console.log(question);
    
    $('#questionText').html(question.question);
    //console.log(question.question);
    
    $('#reponseA').html(question.reponseA);
    //console.log(question);
    
    $('#reponseB').html(question.reponseB);
    
    $('#reponseC').html(question.reponseC);
    
    $('#reponseD').html(question.reponseD);
}



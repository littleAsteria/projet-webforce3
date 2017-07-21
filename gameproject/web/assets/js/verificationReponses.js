//Compare la bonne réponse avec la réponse donné par le joueur
function verificationReponse(reponse, question){
    
    //La valeur de retour est un booléen
    return question.reponse == reponse;
    
    
}

function showAnswers(question, givenAnswer){
    //la lettre doit correspondre à la derniére présente dans le nom de l'id du bouton
    //une fois la réponse validée, le bouton de la bonne réponse devient vert
    $('#reponse'+ question.reponse.toUpperCase()).removeClass('reponseButton-primary');
    $('#reponse'+ question.reponse.toUpperCase()).removeClass('reponseButton-selected');
    $('#reponse'+ question.reponse.toUpperCase()).addClass('reponseButton-right');
    
    
    //Si la bonne reponse est différente de la réponse donnée par l'utilisateur 
    //alors la réponse le bouton de la réponse donnée devient rouge
    //et le bouton de la bonne réponse deveint vert.
    if(!verificationReponse(givenAnswer, question)){
        $('#reponse'+ givenAnswer.toUpperCase()).removeClass('reponseButton-primary');
        $('#reponse'+ givenAnswer.toUpperCase()).removeClass('reponseButton-selected');
        $('#reponse'+ givenAnswer.toUpperCase()).addClass('reponseButton-wrong');
    }
    
}


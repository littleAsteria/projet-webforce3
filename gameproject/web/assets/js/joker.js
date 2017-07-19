function removeTwoAnswers(question) {
    
    var falseAnswers = [question.reponseA, question.reponseB, question.reponseC, question.reponseD];
    
    var answerIndex = falseAnswers.indexOf(question['reponse'+question.reponse.toUpperCase()]);
    
    falseAnswers.splice(answerIndex, 1);
    falseAnswers.pop();
    
    $('#'+getKeyByValue(question, falseAnswers[0])).addClass('barre');
    $('#'+getKeyByValue(question, falseAnswers[1])).addClass('barre');
}

function getKeyByValue(object, value) {
  return Object.keys(object).find(key => object[key] === value);
}

function removeTwoAnswers(question) {
    
    //On créé un tableau qui contient toutes les réponses possibles (chaines de caractères)
    var falseAnswers = [question.reponseA, question.reponseB, question.reponseC, question.reponseD];
    
    //On récupère l'index de la bonne réponse dans ce tableau
    var answerIndex = falseAnswers.indexOf(question['reponse'+question.reponse.toUpperCase()]);
    
    //On enlève la bonne réponse du tableau
    falseAnswers.splice(answerIndex, 1);
    
    //On enlève une mauvaise réponse du tableau (le joker 50:50 élimine 2 mauvaises réponses, pas 3)
    falseAnswers.pop();
    
    //On récupère la clé dans l'objet question des deux mauvaises réponses du tableau pour récupérer l'id des boutons correspondants
    //En se servant de l'id, on leur ajoute la classe 'barre', qui barre le texte
    $('#'+getKeyByValue(question, falseAnswers[0])).addClass('barre');
    $('#'+getKeyByValue(question, falseAnswers[1])).addClass('barre');
    
    return [getKeyByValue(question, falseAnswers[0]), getKeyByValue(question, falseAnswers[1])];
}

function getKeyByValue(object, value) {
  return Object.keys(object).find(key => object[key] === value);
}

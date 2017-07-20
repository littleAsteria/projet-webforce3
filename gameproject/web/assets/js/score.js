//combo est un booléen
function scoreRequest(score, difficulty, combo){
    
    if(combo) score += (100 * difficulty) * 2;
    
    else score += 100 * difficulty;
    
    $('#score').html('Score : ' + score);
    
    return score;
    
    
}

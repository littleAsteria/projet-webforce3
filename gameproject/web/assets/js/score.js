function scoreRequest(score, difficulty){
    
    score += 100 * difficulty;
    
    $('#score').html('Score:' + score);
    
    return score;
    
    
}
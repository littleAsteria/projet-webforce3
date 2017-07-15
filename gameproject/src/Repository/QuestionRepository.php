<?php


namespace Repository;

use Entity\Question;


class QuestionRepository extends RepositoryAbstract{
    
    public function getTable(){
        return 'question';
    }
    
    public function buildFromArray(array $dbQuestion){
        
        $question = new Question();
        
        $question
                ->setId_question($dbQuestion['id_question'])
                ->setQuestion($dbQuestion['question'])
                ->setReponse_a($dbQuestion['reponse_a'])
                ->setReponse_b($dbQuestion['reponse_b'])
                ->setReponse_c($dbQuestion['reponse_c'])
                ->setReponse_d($dbQuestion['reponse_d'])
                ->setBonne_reponse($dbQuestion['bonne_reponse'])
                ->setNiveau($dbQuestion['bonne_reponse'])
                ->setStatut_question(1)
        ;
        
        return $question;
    }
    
}

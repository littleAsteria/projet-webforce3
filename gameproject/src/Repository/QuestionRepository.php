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
                ->setStatut_question($dbQuestion['statut_question'])
        ;
        
        return $question;
    }
    
    public function save (Question $question) {
        $data = [
            'question' => $question->getQuestion(),
            'reponse_a' => $question->getReponse_a(),
            'reponse_b' => $question->getReponse_b(),
            'reponse_c' => $question->getReponse_c(),
            'reponse_d' => $question->getReponse_d(),
            'bonne_reponse' => $question->getBonne_reponse(),
            'niveau' => $question->getNiveau(),
            'statut_question' => $question->getStatut_question()
        ];
        
        $this->persist($data);
    }
    
}

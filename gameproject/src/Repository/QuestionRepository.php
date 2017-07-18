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
                ->setNiveau($dbQuestion['niveau'])
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
        
        $where = !empty($question->getId_question())
                 ?['id_question' => $question->getId_question()]
                 : null
        ;
        
        $this->persist($data, $where);
    }
    
    
    public function findAll(){
        
        $query = "SELECT * FROM question WHERE statut_question = :statut_question";
        

        $questions =[];

        
        $dbQuestions = $this->db->fetchAll(
                
            $query,
            //selectionner les questions de la table question lorsque celle-ci on un statut 0   
            [':statut_question' => '0']
                
            );    
        
            foreach ($dbQuestions as $dbQuestion){
                $question = $this->buildFromArray($dbQuestion);
            
            
                $questions[] = $question;
            }
            
        return $questions;
     
         
    }
    
    public function find($id){
        
        $dbQuestion = $this->db->fetchAssoc(
            'SELECT * FROM question WHERE id_question =:id',
            [':id' => $id]
        );
        
        if(!empty($dbQuestion)){
            return $this->buildFromArray($dbQuestion);
        }
        return null;
        
    }
    
     public function delete($question){
        
        $this->db->delete('question', ['id_question' => $question->getId_question()]);
    
    }
    
 
    /**
     * 
     * @param type $id
     */
    public function accept($id){
        
        
        $data=['statut_question' => '1'];
        
        $where = ['id_question' => $id];
        
        $this->persist($data,$where);
                
    }
        

    public function getQuestionsByDifficulty($difficulty){
        $query = 'SELECT * FROM question WHERE niveau = '.$difficulty.' AND statut_question = "1"';
        
        $dbQuestions = $this->db->fetchAll($query);
        $questions = [];
        
        foreach ($dbQuestions as $dbquestion){
            $question = $this->buildFromArray($dbquestion);
            
            $questions[] = $question;
        }
        
        return $questions;

    }
    
}

<?php



namespace Controller;


class ControllerQuestionAjax extends ControllerAbstract{
   
    public function getRandomQuestion(){
        
        $difficulty = $_GET['difficulty'];
        
        $questions = $this->app['question.repository']->getQuestionsByDifficulty($difficulty);
        
        $randomQuestion = $questions[array_rand($questions)];

        return $this->app->json(
                [
                    'question' => $randomQuestion->getQuestion(),
                    'reponseA' => $randomQuestion->getReponse_a(),
                    'reponseB' => $randomQuestion->getReponse_b(),
                    'reponseC' => $randomQuestion->getReponse_c(),
                    'reponseD' => $randomQuestion->getReponse_d(),
                    'reponse' => $randomQuestion->getBonne_reponse()
                ]);
    }
    
}

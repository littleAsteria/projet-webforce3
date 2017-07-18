<?php



namespace Controller;


class ControllerQuestionAjax extends ControllerAbstract{
   
    public function getRandomQuestion(){
        
        //La difficulté voulue sera envoyée par le data de la requête ajax
        $difficulty = $_GET['difficulty'];
        
        //Va chercher toutes les question de la difficulté passée en paramètre qui ont un statut de 1
        $questions = $this->app['question.repository']->getQuestionsByDifficulty($difficulty);
        
        //Récupère une question au hasard dans le tableau $questions
        $randomQuestion = $questions[array_rand($questions)];

        //Retourne des données de cette question en json
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

<?php

namespace Controller\Admin;
use Controller\ControllerAbstract;
use Entity\Question;
use Entity\Membre;

class QuestionController extends ControllerAbstract {
  
     public function listAction()
    {  
      
        $questions = $this->app['question.repository']->findAll();
        
        return $this->render(
                'admin/validationQuestion.html.twig',
                ['questions' => $questions]
        );
  
    }
}

<?php

namespace Controller\Admin;
use Controller\ControllerAbstract;
use Entity\Question;
use Entity\Membre;

class QuestionController extends ControllerAbstract {
  
     public function listAction(){  
      
        $questions = $this->app['question.repository']->findAll();
        
        return $this->render(
                'admin/validationQuestion.html.twig',
                ['questions' => $questions]
        );
  
    }
    
    
    public function deleteAction($id){
        
        $question = $this->app['question.repository']->find($id);

        $this->app['question.repository']->delete($question);
        
        $this->addFlashMessage('La question a été supprimée');
        
        return $this->redirectRoute('admin_validation');
    }
    
    
}

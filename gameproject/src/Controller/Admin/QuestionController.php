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
    
    //Action pour valider la question posté par le joueur 
    public function acceptAction($id){
        
        $question = $this->app['question.repository']->find($id);
        
        $this->app['question.repository']->accept($question->getId_question());
        
        $this->addFlashMessage('La question a été validée');
        
        return $this->redirectRoute('admin_validation');
        
        
    }
    
    public function editAction($id){
        //instance de l'entité question
        $question = $this->app['question.repository']->find($id);
        
        if(!empty($_POST)){
            
            if(empty($_POST['question'])){
                $errors['question'] = 'Veuillez renseigner votre question';
            }
            
            if(empty($_POST['reponseA'])){
                $errors['reponseA'] = 'Veuillez renseigner votre réponse A';
            }
            
            if(empty($_POST['reponseB'])){
                $errors['reponseB'] = 'Veuillez renseigner votre réponse B';
            }
            
            if(empty($_POST['reponseC'])){
                $errors['reponseC'] = 'Veuillez renseigner votre réponse C';
            }
            
            if(empty($_POST['reponseD'])){
                $errors['reponseD'] = 'Veuillez renseigner votre réponse D';
            }
            
            if(empty($errors)){
            
                $question
                    ->setQuestion($_POST['question'])
                    ->setReponse_a($_POST['reponseA'])
                    ->setReponse_b($_POST['reponseB'])
                    ->setReponse_c($_POST['reponseC'])
                    ->setReponse_d($_POST['reponseD'])
                    ->setBonne_reponse($_POST['reponse'])
                    ->setNiveau($_POST['difficulte'])
                ;
                
                $this->app['question.repository']->save($question);
                
                $msg = '<strong>Merci d\'avoir soumi votre question !</strong>';
                $this->addFlashMessage($msg);
                
                return $this->redirectRoute('admin_validation');
            
            }
            
            else {
                $msg = '<strong>Le formulaire contient des erreurs</strong>';
                $msg .= '<br>' . implode('<br>', $errors);
                $this->addFlashMessage($msg, 'error');
            }
        }
        
        return $this->render('soumissionQuestion.html.twig', ['question' => $question]);
        
        
        
    }
}

<?php

namespace Controller;

use Entity\Question;


class QuestionController extends ControllerAbstract{
    
    
    public function submitAction(){
        
        $question = new Question();
        $emptyQuestion = new Question();
        //On créé une 2éme instance de question qui restera vide et sera passé en paramétre de la méthode render
        $errors = [];
        
        //Vérification des champs
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
                    ->setStatut_question(0)
                ;
                
                $this->app['question.repository']->save($question);
                
                $msg = '<strong>Merci d\'avoir soumi votre question !</strong>';
                $this->addFlashMessage($msg);
            
            }
            
            else {
                $msg = '<strong>Le formulaire contient des erreurs</strong>';
                $msg .= '<br>' . implode('<br>', $errors);
                $this->addFlashMessage($msg, 'error');
            }
        }
        
        return $this->render('soumissionQuestion.html.twig', ['question' => $emptyQuestion]);
        //Le paramétre permet d'afficher le formulaire avec des champs vides dans le cas d'un ajout
    }
    
    
}

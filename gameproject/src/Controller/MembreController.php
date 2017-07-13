<?php

namespace Controller;
use Entity\Membre;

class MembreController extends ControllerAbstract{
   
    public function registerAction(){
       
        $membre = new Membre();
        $errors = [];
        
        if(!empty($_POST)){
            
            $membre
                    ->setPseudo($_POST['pseudo'])
                    ->setMdp($_POST['mdp'])
            ;
            
            //contrôle du pseudo:
            
            if(empty($_POST['pseudo'])){
                
                $errors['pseudo'] = "Le pseudo est obligatoire";
                
            }elseif(!empty($this->app['membre.repository']->findByPseudo($_POST['pseudo']))){
                $errors['pseudo'] = "Ce pseudo est déja utilisé.<br> Veuillez réessayer.";
            }
            
            
            //contrôle du mot de passe:
            
            if(empty($_POST['mdp'])){
                
                $errors['mdp'] = "Le mot de passe est obligatoire";
            }elseif(!preg_match('/^[a-zA-Z0-9_-]{6,20}$/',$_POST['mdp'])){
                $errors['mdp'] = "Le mot de passe doit faire entre 6 et 20 caractéres et ne doit que des lettres, des chiffres";
            }
            
            if(empty($_POST['mdp_confirm'])){
                
                $errors['mdp_confirm'] = "Veuillez confirmer votre mot de passe";
                
            }elseif($_POST['mdp'] != $_POST['mdp_confirm']){
                    
                    $errors['mdp_confirm'] = "Mot de passe non confirmé";
                }
               
                
            if(empty($errors)){
                
            }
            
            else {
                $msg = '<strong>Le formulaire contient des erreurs</strong>';
                $msg .= '<br>' . implode('<br>', $errors);
                
                $this->addFlashMessage($msg, 'error');
            }
            
            
        }
        
        return $this->render('membre/inscription.html.twig');
        
    }
  
}

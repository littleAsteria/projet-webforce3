<?php

namespace Controller;


class GameController extends ControllerAbstract{
    
    public function getToGame(){
        return $this->render('game.html.twig');
    }
    
    public function getToRegles(){
        return $this->render('regles.html.twig');
    }
    
    public function getToScores(){
        
        $membres = $this->app['membre.repository']->findAllBestScores('9');
        
        return $this->render('score.html.twig', ['membres' => $membres]);
    }
    
    public function getToEndGame(){
        
        return $this->render('finDePartie.html.twig');
    }
    //action: 
    /*
     * Si pas de score ou score précédent plus bas que le score actuel 
    faire une requête pour envoyer le score actuel dans la table membre 
    Sinon ne pas envoyé le score
     */
    
    public function postBestScore(){
        
        //enregistrement du score dans la session qu'on soit connecté ou non
        //on s'en sert  
        $this->app['membre.manager']->saveScore($_POST['scoreEnvoye']);
        
        //Si le jouer est connecté et est donc membre:
        if($this->app['session']->has('membre')){
            

            //on récupére le score du membre connecté et on le compare au score envoyé par l'ajax
            if($this->app['membre.manager']->getMembre()->getScore() < $_POST['scoreEnvoye']){

                //Si le score actuel est supérieur au score enregistré en BDD, on le remplace 
                $this->app['membre.repository']->setScore($this->app['membre.manager']->getMembre()->getId_membre(), $_POST['scoreEnvoye']);
                
                //nouveau score enregistré en session
                $this->app['membre.manager']->getMembre()->setScore($_POST['scoreEnvoye']);
            }
            

       
        }
        
        return $this->redirectRoute('scores');
 
        
    }
    
}

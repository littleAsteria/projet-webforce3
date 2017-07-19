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
        
        $membres = $this->app['membre.repository']->findAllBestScores('10');
        
        return $this->render('score.html.twig', ['membres' => $membres]);
    }
    
    public function getToEndGame(){
        
        return $this->render('finDePartie.html.twig');
    }
    //action: 
    /*
     * Si pas de score ou score précédent plus bas que le score actuel 
    faire une requete pour envoyer le score actuel dans la table membre 
    Sinon ne pas envoyé le score
     */
    public function postBestScore(){
        
        if($this->app['session']->has('membre')){
            
        
        
            //enregistrement du score dans la session
            $this->app['membre.manager']->saveScore($_POST['scoreEnvoye']);

            //on récupére le score du membre connecté et on le compare au score envoyé par l'ajax
            if($this->app['membre.manager']->getMembre()->getScore() < $_POST['scoreEnvoye']){

                //On enregistre le score en BDD
                $this->app['membre.repository']->setScore($this->app['membre.manager']->getMembre()->getId_membre(), $_POST['scoreEnvoye']);
            }

            $this->app['membre.manager']->getMembre()->setScore($_POST['scoreEnvoye']);

       
        }
        
        return $this->redirectRoute('scores');
 
        
    }
    
}

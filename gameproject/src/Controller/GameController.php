<?php



namespace Controller;


class GameController extends ControllerAbstract{
    
    public function getToGame(){
        return $this->render('game.html.twig');
    }
    
    public function getToRegles(){
        return $this->render('regles.html.twig');
    }
    
}

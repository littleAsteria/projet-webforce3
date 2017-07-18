<?php


namespace Controller\Admin;

use Controller\ControllerAbstract;


class MembreController extends ControllerAbstract{
    
    public function setScoreToZero($id){
        
        $this->app['membre.repository']->setScore($id, 0);
        $msg = '<strong>Score remis à 0</strong>';
        $this->addFlashMessage($msg);
        
        return $this->redirectRoute('scores');
        
    }
    
}

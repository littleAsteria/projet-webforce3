<?php

namespace Controller;


class QuestionController extends ControllerAbstract{
    
    public function submitAction(){
        return $this->render('soumissionQuestion.html.twig');
    }
    
}

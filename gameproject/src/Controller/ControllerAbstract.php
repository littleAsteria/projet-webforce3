<?php

namespace Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Session\Session;



class ControllerAbstract {
    
        /**
     *
     * @var Application
     */
    protected $app; 
    
    /**
     * 
     * ControllerAbstract constructor
     */
    
    /**
     *
     * @var \Twig_Environment 
     */
    protected $twig;
    
    /**
     *
     * @var Session
     */
    protected $session;
    
  

    public function __construct(Application $app) {
        
        $this->app = $app;
        $this->twig = $app['twig'];
        $this->session = $app['session'];
    }
    
    
    /**
     * 
     * @param type $view
     * @param array $parameters
     * @return string
     */
    public function render($view,array $parameters = [])
    {
        return $this->twig->render($view, $parameters);
    }
    
    
    
   
    
    /**
     * 
     * @param type $message
     * @param type $type
     */
    
    public function addFlashMessage($message, $type = 'success'){
        
        $this->session->getFlashBag()->add($type, $message);
        
    }
   
    
    
    public function redirectRoute($routeName, $parameters = []){
        
        return $this->app->redirect(
           $this->app['url_generator']->generate($routeName,$parameters)
              
                );
    }
            
    
}

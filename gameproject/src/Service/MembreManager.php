<?php

namespace Service;


use Entity\Membre;
use Symfony\Component\HttpFoundation\Session\Session;

class MembreManager {
    
    /**
     *
     * @var Session
     */
    private $session;
    
    
    /**
     * 
     * @param Session $session
     */
    public function __construct(Session $session) {
       $this->session = $session;
   }
   
  /**
   * 
   * @param string $plainPassword
   * @return string 
   */
   public function encodePassword($plainPassword){
       //hash le mot de passe
       //return password_hash($plainPassword, PASSWORD_BCRYPT);
       return $plainPassword;
       
   }
   
   /**
    * 
    * @param type $plainPassword
    * @param type $encodedPassword
    * @return string
    */
   public function verifyPassword($plainPassword, $encodedPassword){
       //verifie la concordance entre mdp haché et mdp en clair
       
       //return password_verify($plainPassword, $encodedPassword);
       return ($plainPassword == $encodedPassword);
       
   }
   
   /**
    * 
    * @param Membre $membre
    */
   public function login(Membre $membre){
       
       $this->session->set('membre',$membre);
   }
   
    
  
}

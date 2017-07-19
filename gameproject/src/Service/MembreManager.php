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
       return password_hash($plainPassword, PASSWORD_BCRYPT);
       //return $plainPassword;
       
   }
   
   /**
    * 
    * @param type $plainPassword
    * @param type $encodedPassword
    * @return string
    */
   public function verifyPassword($plainPassword, $encodedPassword){
       //verifie la concordance entre mdp haché et mdp en clair
       
       return password_verify($plainPassword, $encodedPassword);
       //return ($plainPassword == $encodedPassword);
       
   }
   
   /**
    * 
    * @param Membre $membre
    */
   public function login(Membre $membre){
       
       $this->session->set('membre',$membre);
   }
   
 
   public function logout(){
       
        $this->session->remove('membre');
   }
   
   //on enregistre le score en session
    public function saveScore($scoreSession){
        $this->session->set('score', $scoreSession);
    }
    
    //on récupére le score pour l'afficher sur la vue
    public function getScore() {
        if($this->session->has('score')){
            return $this->session->get('score');
        }
        
        return "";
    }
   
   //Vérifie si la session membre existe (si il y a un membre de connecté)
   //Si oui retourne le pseudo de l'utilisateur
   
   /**
    * 
    * @return string
    */
    public function getMembrePseudo(){
       
       if($this->session->has('membre')){
           return $this->session->get('membre')->getPseudo(); 
       }
       
       return '';
   }
   
   //Méthode permettant de vérifier si l'utilisateur est connecté 
   /**
    * 
    * @return string
    */
   public function getMembre(){
       
       if($this->session->has('membre')){
           return $this->session->get('membre');  
       }
       
       return '';
   }
   
   //methode pour vérifier si un on est bien connecté (entant que membre puis entant qu'admin:
   
    public function isAdmin(){
       
       return $this->session->has('membre') && $this->session->get('membre')->isAdmin();
       //il y a t-il un utilisateur si oui 
       //vrai si on une clef user 
       //la 2éme condition doit aussi etre vrai 
       //condition qui renvoit un booléen
       
   }
    
  
}

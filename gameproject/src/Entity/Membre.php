<?php


namespace Entity;


class Membre {
    
    /**
     *
     * @var int 
     */
    private $id_membre;
    
    /**
     *
     * @var string
     */
    private $pseudo;
    
    /**
     *
     * @var string
     */
    private $mdp;
    
    /**
     *
     * @var int
     */
    private $score;
    
    /**
     *
     * @var string
     */
    private $statut_membre;
    
    //Getters:
    
    /**
     * 
     * @return int
     */
    public function getId_membre() {
        return $this->id_membre;
    }
    
    /**
     * 
     * @return string
     */
    public function getPseudo() {
        return $this->pseudo;
    }
    
    /**
     * 
     * @return string
     */
    public function getMdp() {
        return $this->mdp;
    }
    
    /**
     * 
     * @return int
     */
    public function getScore() {
        return $this->score;
    }
    
    /**
     * 
     * @return string
     */
    public function getStatut_membre() {
        return $this->statut_membre;
    }

    //Setters:
    
    /**
     * 
     * @param type $id_membre
     * @return $this
     */
    public function setId_membre($id_membre) {
        $this->id_membre = $id_membre;
        return $this;
    }
    
    /**
     * 
     * @param type $pseudo
     * @return $this
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
        return $this;
    }
    
    /**
     * 
     * @param type $mdp
     * @return $this
     */
    public function setMdp($mdp) {
        $this->mdp = $mdp;
        return $this;
    }

    /**
     * 
     * @param type $score
     * @return $this
     */
    public function setScore($score) {
        $this->score = $score;
        return $this;
    }
    
    /**
     * 
     * @param type $statut_membre
     * @return $this
     */
    public function setStatut_membre($statut_membre) {
        $this->statut_membre = $statut_membre;
        return $this;
    }
    
    public function isAdmin(){
        if($this->statut_membre == 1) return true;
        else return false;
    }


           
}





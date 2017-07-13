<?php


namespace Entity;

class Question {
    
    /**
     *
     * @var int 
     */
    private $id_question;
    
    /**
     *
     * @var string 
     */
    private $question;
    
    /**
     *
     * @var string 
     */
    private $reponse_a;
    
    /**
     *
     * @var string 
     */
    private $reponse_b;
    
    /**
     *
     * @var string 
     */
    private $reponse_c;
    
    /**
     *
     * @var string 
     */
    private $reponse_d;
    
    /**
     *
     * @var string 
     */
    private $bonne_reponse;
    
    /**
     *
     * @var int 
     */
    private $niveau;
    
    /**
     *
     * @var string
     */
    private $statut_question;
    
    /**
     * 
     * @return int
     */
    public function getId_question() {
        return $this->id_question;
    }

    /**
     * 
     * @return string
     */
    public function getQuestion() {
        return $this->question;
    }
    
    /**
     * 
     * @return string
     */
    public function getReponse_a() {
        return $this->reponse_a;
    }
    
    /**
     * 
     * @return string
     */
    public function getReponse_b() {
        return $this->reponse_b;
    }
    
    /**
     * 
     * @return string
     */
    public function getReponse_c() {
        return $this->reponse_c;
    }
    
    /**
     * 
     * @return string
     */
    public function getReponse_d() {
        return $this->reponse_d;
    }
    
    /**
     * 
     * @return string
     */
    public function getBonne_reponse() {
        return $this->bonne_reponse;
    }

    /**
     * 
     * @return int
     */
    public function getNiveau() {
        return $this->niveau;
    }

    /**
     * 
     * @return string
     */
    public function getStatut_question() {
        return $this->statut_question;
    }
    
    /**
     * 
     * @param int $id_question
     * @return $this
     */
    public function setId_question($id_question) {
        $this->id_question = $id_question;
        return $this;
    }

    /**
     * 
     * @param string $question
     * @return $this
     */
    public function setQuestion($question) {
        $this->question = $question;
        return $this;
    }

    /**
     * 
     * @param string $reponse_a
     * @return $this
     */
    public function setReponse_a($reponse_a) {
        $this->reponse_a = $reponse_a;
        return $this;
    }

    /**
     * 
     * @param string $reponse_b
     * @return $this
     */
    public function setReponse_b($reponse_b) {
        $this->reponse_b = $reponse_b;
        return $this;
    }

    /**
     * 
     * @param string $reponse_c
     * @return $this
     */
    public function setReponse_c($reponse_c) {
        $this->reponse_c = $reponse_c;
        return $this;
    }

    /**
     * 
     * @param string $reponse_d
     * @return $this
     */
    public function setReponse_d($reponse_d) {
        $this->reponse_d = $reponse_d;
        return $this;
    }

    /**
     * 
     * @param string $bonne_reponse
     * @return $this
     */
    public function setBonne_reponse($bonne_reponse) {
        $this->bonne_reponse = $bonne_reponse;
        return $this;
    }

    /**
     * 
     * @param int $niveau
     * @return $this
     */
    public function setNiveau($niveau) {
        $this->niveau = $niveau;
        return $this;
    }

    /**
     * 
     * @param string $statut_question
     * @return $this
     */
    public function setStatut_question($statut_question) {
        $this->statut_question = $statut_question;
        return $this;
    }


}

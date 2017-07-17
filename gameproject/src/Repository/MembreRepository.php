<?php


namespace Repository;

use Entity\Membre;
use PDO;

class MembreRepository extends RepositoryAbstract{
    
    public function getTable(){
        
        return 'membre';
    }
    
    public function save(Membre $membre){
        
        $data = [
            'pseudo' => $membre->getPseudo(),
            'mdp' => $membre->getMdp()
            
        ];
        
        $where = !empty($membre->getId_membre())
                 ?['id' => $membre->getId_membre()]
                 : null
        ;
        
        $this->persist($data,$where);
    }
    
    
    public function findByPseudo($pseudo){
        
        $dbMembre = $this->db->fetchAssoc(
            'SELECT * FROM membre WHERE pseudo = :pseudo',
            [':pseudo' => $pseudo]
                
           
                
        );
        
        if(!empty($dbMembre)){
            return $this->buildFromArray($dbMembre);
        }
        
        return null;
    }
    
    public function buildFromArray(array $dbMembre){
        
        $membre = new Membre();
        
        $membre
           ->setId_membre($dbMembre['id_membre'])
           ->setPseudo($dbMembre['pseudo'])
           ->setMdp($dbMembre['mdp'])
        ;
        
        return $membre;
    }
}

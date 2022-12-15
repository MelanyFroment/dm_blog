<?php
namespace model;
use model\Billets;
use model\Commentaire;

class CommentairesManager extends Manager
{

    public function getCommentaires( $idBillet )
    {
        $listCommentaires = [];
        $q = $this->manager
                    ->db
                    ->prepare(
                        'SELECT 
                            id_billet AS idBillet,
                            auteur, 
                            contenu, 
                            DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCommentaireFr 
                        FROM commentaires 
                        WHERE id_billet = :id
                        ORDER BY date_commentaire'
            );
        $q->execute([':id' => $idBillet]);
        while( $donnees = $q->fetch(\PDO::FETCH_ASSOC) ) {
            $listCommentaires[] = new Commentaire($donnees);
        }
        return $listCommentaires;
    }

    /**
     * @param $commentaire Commentaire
     */
    public function add( $commentaire )
    {
        // echo 'toto';
        // exit();
        $q = $this->manager 
            ->db    
                ->prepare('INSERT INTO commentaires (auteur,contenu,id_billet,date_commentaire) VALUES (:auteur, :contenu, :id_billet, NOW())'); // Fonction PDO = prepare('') // Ne pas mettre les valeur direct ppour une meilleur securité // On enregistre ne bdd
        $q->execute([
            ':id_billet' => $commentaire->getIdBillet(),
            ':auteur' => $commentaire->getAuteur(),
            ':contenu' => $commentaire->getContenu(),
        ]);  
        
        $commentaire->hydrate([ // On recupere l'Id gracee a la fonction hydrate pour recupere les champs
            'id' => $this->manager->db->lastInsertId()
        ]);
        return $commentaire; 
    }

    public function addBillet( $billet )
    {
        // echo 'toto';
        // exit();
        $q = $this->manager 
            ->db    
                ->prepare('INSERT INTO billets (titre,contenu,date_creation) VALUES (:titre, :contenu, :date_creation, NOW())'); // Fonction PDO = prepare('') // Ne pas mettre les valeur direct ppour une meilleur securité // On enregistre ne bdd
        $q->execute([
            ':titre' => $billet->getTitre(),
            ':contenu' => $billet->getContenu(),
            ':date_creation' => $billet->getDateCreation(),
        ]);  
        
        $billet->hydrate([ // On recupere l'Id gracee a la fonction hydrate pour recupere les champs
            'id' => $this->manager->db->lastInsertId()
        ]);
        return $billet; 
    }
}
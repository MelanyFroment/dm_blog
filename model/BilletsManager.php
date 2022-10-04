<?php
namespace model;


class BilletsManager extends Manager
{
    private $_nbBillets = 1;


    public function getBillet( $idBillet )
    {
        $q = $this->manager
            ->db
            ->prepare(
                'SELECT 
                    id, 
                    titre, 
                    contenu, 
                    DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr 
                FROM billets 
                WHERE id = :id'
            );
        $q->execute([':id' => $idBillet]);
        return $q->fetch(\PDO::FETCH_ASSOC);
    }



    public function getAllBillets( $nbBillets = false )
    {
        $maxBillets = $nbBillets ? $nbBillets : $this->_nbBillets;
        $listBillets = [];
        $q = $this->manager
                ->db
                ->prepare(
                    'SELECT 
                        id, 
                        titre, 
                        contenu, 
                        DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr 
                    FROM billets 
                    ORDER BY date_creation 
                    DESC LIMIT 0, ' . $maxBillets
                );
        $q->execute();
        while( $donnees = $q->fetch(\PDO::FETCH_ASSOC) ) {
            $listBillets[] = $donnees;
        }
        return $listBillets;
    }
}
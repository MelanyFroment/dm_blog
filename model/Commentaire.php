<?php
namespace model;

class Commentaire
{
    protected $id,
            $id_billet,
            $auteur,
            $contenu,
            $date_commentaire;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method))
        {
            $this->$method($value);
        }
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function getIdBillet()
    {
        return $this->id_billet;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getDateCommentaireFr()
    {
        return $this->date_commentaire;
    }

    public function setId( $id )
    {
        $id = (int)$id;
        if( $id > 0 ) {
            $this->id = $id;
        }
    }
    public function setIdBillet( $idBillet )
    {
        $id = (int)$idBillet;
        if( $id > 0 ) {
            $this->id_billet = $id;
        }
    }

    
    public function setAuteur( $auteur )
    {
        $this->auteur = $auteur;
    }

    public function setContenu( $contenu )
    {
        $this->contenu = $contenu;
    }

    public function setDateCommentaireFr( $dateCommentaire )
    {
        $this->date_commentaire = $dateCommentaire;
    }

}

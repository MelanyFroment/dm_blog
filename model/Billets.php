<?php
namespace model;

class Billets
{
    private $_id,
            $_titre,
            $_contenu,
            $_date_creation;


    public function getId()
    {
        return $this->_id;
    }

    public function getTitre()
    {
        return $this->_titre;
    }

    public function getContenu()
    {
        return $this->_contenu;
    }

    public function getDateCreation()
    {
        return $this->_date_creation;
    }


    public function setId($id)
    {
        if( is_integer( $id ) ) {
            $this->_id = $id;
        } else return false;
    }


    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }


    public function setContenu($contenu)
    {
        $this->_contenu = $contenu;
    }

    public function setDateCreation($date_creation)
    {
        $this->_date_creation = $date_creation;
    }

}
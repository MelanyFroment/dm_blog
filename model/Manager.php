<?php
namespace model;

use classes\dbConnect;

class Manager
{
    private $_dsn           = 'mysql:host=localhost;dbname=dm_blog';
    private $_login         = 'root';
    private $_password      = '';


    /**
     * Attribut contenant l'instance PDO
     */
    protected $manager;

    public function __construct()
    {
        $this->manager = dbConnect::getDb($this->_dsn, $this->_login, $this->_password);
    }
}
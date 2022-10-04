<?php
namespace controller;

use model\BilletsManager;
use model\CommentairesManager;


class CreateController extends Controller
{
    protected $commManager;
    
    public function __construct()
    {
        $this->commManager = new CommentairesManager();
        parent::__construct();
    }

    public function defaultAction()
    {
        $this->render('create');

    }

    // public function createAction()
    // {
    //     $dataComm = [
    //         'id_billet' => $_POST['id_billet'],
    //         'auteur' => $_POST['auteur'],
    //         'contenu' => $_POST['contenu'],
    //         'date_commentaire' => $_POST['date_commentaire'],
    //     ];   
    //     if (!empty($dataComm)) { 
    //         $this->render('create', ['error' => true]); 
    //     }                        
    // }

}

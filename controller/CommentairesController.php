<?php
namespace controller;

use model\BilletsManager;
use model\Commentaire;
use model\CommentairesManager;


class CommentairesController extends Controller
{

    protected $commentaireManager;
    protected $billetManager;

    private function initializeData()
    {
        $this->billetManager = new BilletsManager();
        $this->commentaireManager = new CommentairesManager();
    }

    public function defaultAction()
    {
        $this->initializeData();

        $idBillet = $_REQUEST['billet'];

        $billet = $this->billetManager->getBillet( $idBillet );
        $listCommentaires = $this->commentaireManager->getCommentaires( $idBillet );

        $data = [
            'billet'=>$billet,
            'listCommentaires'=> $listCommentaires
        ];

        $this->render( 'commentaires', $data );

    } 

    // public function createAction()
    // {
    //     if( !empty( $_POST['auteur'] ) && !empty( $_POST['contenu'] ) ) {
    //         $this->initializeData();

    //         $idBillet = $_REQUEST['billet'];
    
    //         $dataCommentaire = [
    //             'idBillet' => $idBillet,
    //             'auteur' => $_POST['auteur'],
    //             'contenu' => $_POST['contenu'],
    //         ]; 
    //         $commentaire = new Commentaire($dataCommentaire);
    //         $userData = $this->commentaireManager->add($commentaire);

    //         if (empty($userData)) { 
    //             $this->render('create', ['error' => true]); 
    //         } else {
    //             $this->defaultAction();
    //         }
    //     } else {
    //         $this->render('create', [
    //             'idBillet' => $_REQUEST['billet'],
    //             'error' => true, 'message'=>'Merci de renseigner les champs obligatoires'
    //         ]);
    //     }
    // }
    public function addCommAction()
    {
        if( !empty( $_POST['auteur'] ) && !empty( $_POST['contenu'] ) ) {
            $this->initializeData();

            $idBillet = $_REQUEST['idBillet'];
    
            $dataCommentaire = [
                'idBillet' => $idBillet,
                'auteur' => $_POST['auteur'],
                'contenu' => $_POST['contenu'],
            ]; 
            $commentaire = new Commentaire($dataCommentaire);
            $userData = $this->commentaireManager->add($commentaire);
            if (!empty($userData)){
                echo true;
                
            }
            else{
                echo false;
            }
         
        }
    }
}

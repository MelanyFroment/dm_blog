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

    public function createAction()
    {
        // if( isset($_POST['submit'] ) ) {
        //     // var_dump($_POST);
        //     if( !empty( $_POST['auteur'] ) && !empty( $_POST['contenu'] ) ) {
        //         $newCommentaires = new CommentairesManager($_POST);
        //         if( !empty( $newCommentaires ) ) {
        //             $this->render('create', ['error' => true, 'message'=>'L\'équipe a bien été créé']);
        //         }

        //     } else {
        //         $this->render('create', ['error' => true, 'message'=>'Merci de renseigner les champs obligatoires']);
        //     }
        // } else {

        //     $this->render('create', ['error' => false, 'message'=>'Saisir les informations ci-dessous']);
        // }

        if( !empty( $_POST['auteur'] ) && !empty( $_POST['contenu'] ) ) {
            $this->initializeData();

            $idBillet = $_REQUEST['billet'];
    
            $dataCommentaire = [
                'idBillet' => $idBillet,
                'auteur' => $_POST['auteur'],
                'contenu' => $_POST['contenu'],
            ]; 
            $commentaire = new Commentaire($dataCommentaire);
            $userData = $this->commentaireManager->add($commentaire);

            if (empty($userData)) { 
                $this->render('create', ['error' => true]); 
            } else {
                $this->defaultAction();
            }
        } else {
            $this->render('create', [
                'idBillet' => $_REQUEST['billet'],
                'error' => true, 'message'=>'Merci de renseigner les champs obligatoires'
            ]);
        }

        // var_dump($newUser);
    }

}

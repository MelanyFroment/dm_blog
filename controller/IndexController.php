<?php
namespace controller;

use model\BilletsManager;

class IndexController extends Controller
{


    public function defaultAction()
    {
        $billetManager = new BilletsManager();
        $listBillets = $billetManager->getAllBillets( 5 );

        $data = [ 'listBillets'=>$listBillets ];

        $this->render( 'index', $data );

    }


    public function topMenuAction()
    {


    }




}
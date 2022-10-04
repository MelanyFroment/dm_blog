<?php
namespace controller;

abstract class Controller
{
    protected $pathView = 'view';

    public function __construct()
    {
        
        if( isset( $_GET['action'] ) ) {
            $action = $_GET['action'] . 'Action';
            $this->$action();
        } else {
            $this->defaultAction();
        }
    }

    abstract public function defaultAction();


    public function render( $view, $data = [] )
    {
        //Les valeurs du tableau sont mappées en variables
        extract( $data );

        $viewPath = 'view/' . ucfirst( $view ) . 'View.php';

        if( file_exists( $viewPath ) ) {
            require $viewPath;
        } else {
            $this->errorAction( 'View not exit !' );
        }
    }


    protected function errorAction($message = '')
    {
        $data = [
            'title' => "Error",
            'message' => $message
        ];
        $this->render("message", $data);
    }


} 
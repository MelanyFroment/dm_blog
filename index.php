<?php
require 'autoload.php';


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );



$controllers = ['index', 'commentaires'];

/*
 * On teste si le paramètre controller existe
 * et correspond à un contrôleur de la liste $controllers
 */
if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $controllerName = ucfirst( $_GET['controller'] );
} else {
    $controllerName = ucfirst( $controllers[0] );
}

$nameSpaceController = 'controller';
$className = $controllerName . 'Controller';
$classNamePath = $nameSpaceController . '\\' . $className;
$fileName = 'controller/' . $className . '.php';

if( file_exists( $fileName ) ) {
    if (class_exists($classNamePath)) {
        $controller = new $classNamePath();
    } else {
        exit( 'Error : class not exist !');
    }
} else {
    exit("Error 404: file not found!");
}




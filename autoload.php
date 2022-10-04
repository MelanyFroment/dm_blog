<?php


function chargerClasse($classe)
{

   // echo $classe.'<br/>';

    $backslash = '\\';
    $file = str_replace($backslash, DIRECTORY_SEPARATOR, $classe).'.php';

 //  echo $file.'<br/>';

    require $file;
}

spl_autoload_register('chargerClasse');
<?php

    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT', __DIR__ );

    //Registro de funcion que carga clase
    spl_autoload_register("autoload");

    //Funcion que carga clase
    function autoload($class){
        $class = ROOT . DS . str_replace("\\", DS, $class) . ".php";

        if( !file_exists($class) )
            throw new Exception("Error al cargar la clase ". $class);

        require_once($class);
    }

?>
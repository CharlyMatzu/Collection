<?php

// Example anonymous function like callback
echo preg_replace_callback('~-([a-z])~', function ( $coincidencia ) {
    return strtoupper( $coincidencia[1] );
}, 'hello-world');


// Variable asignation

$saludo = function($nombre)
{
    printf("Hola %s\r\n", $nombre);
};

$saludo('Mundo');
$saludo('PHP');
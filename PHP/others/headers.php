<?php
    
    // foreach (getallheaders() as $name => $value) {
    //     // echo "$name: $value\n";
    // }

    echo "Todos los encabezados";
    var_dump( getallheaders() );

    echo "Obtiene solo claves/nombres de headers";
    $headerKeys = array_keys( getallheaders() );
    var_dump( $headerKeys );
    
    echo "Busca User-Agent";
    var_dump( in_array('User-Agent', $headerKeys ) );

?>
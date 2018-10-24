<?php
    $byteArray = unpack('C*', 'Hello world');
    echo "BEFORE";
    var_dump($byteArray);
    
    echo "AFTER";
    $byteArray = array_values($byteArray);
    var_dump($byteArray);
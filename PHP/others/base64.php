<?php

    $original = 'This is an encoded string';
    $str = base64_encode($original);
    echo "Encoded: ".$str.PHP_EOL;

    echo "Decoded: ".base64_decode( $str ).PHP_EOL;

    echo PHP_EOL;
    echo PHP_EOL;

    // IMAGE
    $path = '_test.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64_image = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo "----image---".PHP_EOL;
    echo $base64_image;

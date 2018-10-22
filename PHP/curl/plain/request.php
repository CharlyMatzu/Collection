<?php

// -------------------------- TEST
//$ch = curl_init();
//
//curl_setopt($ch, CURLOPT_URL,"http://localhost/otros/curl/plain/response.php");
////curl_setopt($ch, CURLOPT_POST, "test");
//curl_setopt($ch, CURLOPT_HTTPGET, "valor");
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//            "test=prueba");
//
//// In real life you should use something like:
//// curl_setopt($ch, CURLOPT_POSTFIELDS,
////          http_build_query(array('postvar1' => 'value1')));
//
//// Receive server response ...
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$server_output = curl_exec($ch);
//curl_close ($ch);
//
//if ( $server_output )
//    echo "OK";
//else
//    echo "FAIL";


//-----------------------oleico

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://oleico.localhost/language");
curl_setopt($ch, CURLOPT_POST, "test");
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "locale=en");

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);

if ( $server_output )
    echo "OK";
else
    echo "FAIL";
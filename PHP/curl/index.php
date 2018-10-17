<?php

require_once "vendor/autoload.php";
use Curl\Curl;


$curl = new Curl();

// ---------------------- SIMPLE GET REQUEST
//$curl->get('https://ghibliapi.herokuapp.com/films');
//
//if ($curl->error)
//    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
//else {
//    echo 'Response:' . "\n";
//    var_dump($curl->response);
//}

// ---------------------- GET REQUEST WITH PARAMS
$curl->get('https://ghibliapi.herokuapp.com/films', array('id' => '2baf70d1-42bb-4437-b551-e5fed5a87abe'));
var_dump($curl->response);
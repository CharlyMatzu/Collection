<?php
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;

$key = 'Sdw1s9x8@';
$encrypt = ['HS256'];

$time = time();
echo $time;
$payload = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => $time, //Tiempo en el que se creo
    //"nbf" => $time, //Tiempo minimo (en adelante) del cual debe usarse, de otro modo se general un BeforeValidException
    "exp" => $time + (60*60) //Expiracion, normalmente despues de iat
);

echo "<h1>Codificado</h1>";
//Codificando y obteniendo token
$token = $jwt = JWT::encode($payload, $key);
echo $token;

echo "<h1>Decodificado</h1>";
//Obteniendo objeto decodificado
$decoded = JWT::decode($jwt, $key, array('HS256'));
var_dump($decoded);
//Obteniendo data
echo $decoded->iss;
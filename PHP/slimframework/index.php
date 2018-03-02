<?php

require_once 'vendor/autoload.php';
require_once 'Conexion.php';
require_once 'Funciones.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



$app = new \Slim\App;


//$app->get('/saludo/{name}', function (Request $request, Response $response, array $args) {
//    $name = $args['name'];
//    $response->getBody()->write("Hola $name como estas?");
//
//    return $response;
//});

//----------NORMAL
$app->get('/', function(Request $request, Response $response, array $args) {
    return $response->withStatus(200)->withHeader('Location', 'reference.html');
});



$app->get('/personas', function(Request $request, Response $response, array $args) {
    $con = new Conexion();

    $datos = Funciones::getDatos(
        $con->doQuery("SELECT * FROM persona")
    );

    $json = json_encode($datos);
    $response->getBody()->write($json);
    return $response;
});



$app->get('/personas/{id}', function(Request $request, Response $response, array $args) {
    $id = $args['id'];
    $con = new Conexion();

    $datos = Funciones::getDatos(
        $con->doQuery("SELECT * FROM persona WHERE id = $id")
    );

    $json = json_encode($datos);
    $response->getBody()->write($json);
    return $response;
});



$app->run();
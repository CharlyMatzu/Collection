<?php

require 'vendor/autoload.php';
include_once 'Controller\TestController.php';
include_once 'Middelware\TestMiddelware.php';

use Slim\Http\Request;
use Slim\Http\Response;


$app = new \Slim\App();




//------------------------------------ NORMAL
$app->get('/', function(Request $req, Response $res, $params){
   $res->write("Hello from normal route");
});


//------------------------------------ INVOKE
$app->get('/invoke', \Controller\TestController::class);


//------------------------------------ CONTAINER and MIDDELWARE
$container = $app->getContainer();
$container['TestController'] = function($con){
    return new Controller\TestController();
};
$app->get('/test', 'TestController:test');
//Alternative without containers
//$app->get('/test', TestController::class . ':method');


$app->get('/test/mid', 'TestController:test')->add(\Middelware\TestMiddelware::class);




try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
} catch (\Slim\Exception\NotFoundException $e) {
} catch (Exception $e) {
}
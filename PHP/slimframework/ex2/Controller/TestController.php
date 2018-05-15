<?php namespace Controller;


use Slim\Http\Request;
use Slim\Http\Response;

class TestController
{

    public function __invoke(Request $req, Response $res, $params)
    {
        $res->write("Hello from Controller: invoke");
    }


    public function test(Request $req, Response $res, $params)
    {
        $res->write("Hello from Controller: Test method");
    }

}
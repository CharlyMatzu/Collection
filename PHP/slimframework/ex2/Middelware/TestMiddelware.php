<?php namespace Middelware;


use Slim\Http\Request;
use Slim\Http\Response;

class TestMiddelware
{

    /**
     * @param Request $req
     * @param Response $res
     * @param Callable $next
     * @return Response
     */
    public function __invoke(Request $req, Response $res, $next)
    {
        //NOTA: se usa getBody para no enviar la respuesta antes de lo deseado
        $res->getBody()->write("Start Midd");
        $res = $next($req, $res);
        $res->getBody()->write("end Midd");
        return $res;
    }

}
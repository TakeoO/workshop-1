<?php

namespace Workshop\Controller;


use Zend\Diactoros\Request;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

class IndexController
{
  public function indexAction(ServerRequest $request)
  {
    $response = new Response();
    $loader = new \Twig_Loader_Filesystem("src/views");
    $twig = new \Twig_Environment($loader);


    $response->getBody()->write($twig->render("/index/index.phtml"));

    return $response;
  }
}
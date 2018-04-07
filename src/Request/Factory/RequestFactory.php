<?php

namespace Workshop\Request\Factory;


use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;
use Zend\Diactoros\ServerRequestFactory;

class RequestFactory implements ServiceContainerInterface
{

  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id)
  {
    $request = ServerRequestFactory::fromGlobals([
      $_SERVER,
      $_GET,
      $_POST,
      $_COOKIE,
      $_FILES
    ]);


    return $request;

  }
}
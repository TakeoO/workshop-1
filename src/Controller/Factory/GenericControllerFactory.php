<?php

namespace Workshop\Controller\Factory;


use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;

class GenericControllerFactory implements ServiceContainerInterface
{

  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id)
  {
    $controller = new $id();
    $controller->setView(
      $container->get("View")
    );


    return $controller;
  }
}
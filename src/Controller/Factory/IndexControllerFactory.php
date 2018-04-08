<?php

namespace Workshop\Controller\Factory;


use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;
use Workshop\Controller\IndexController;

class IndexControllerFactory implements ServiceContainerInterface
{

  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id)
  {
    $controller = new IndexController();
    $controller->setView(
      $container->get("View")
    );

    return $controller;
  }
}
<?php


namespace Workshop\Application\Factory;


use Workshop\Application\Application;
use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;

class ApplicationFactory implements ServiceContainerInterface
{
  public function createService(ServiceContainer $container, $id)
  {
    return new Application(
      $container->get("Request"),
      $container
    );
  }
}
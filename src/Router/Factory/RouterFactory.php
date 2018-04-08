<?php

namespace Workshop\Router\Factory;


use Workshop\Application\Application;
use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;
use Workshop\Router\RouteResolver;

class RouterFactory implements ServiceContainerInterface
{

  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id)
  {
    $routingContainer = new \Aura\Router\RouterContainer();

    $map = $routingContainer->getMap();


    $routes = Application::$config["router"];

    foreach ($routes as $method => $routeData) {

      if (method_exists($map, $method)) {
        foreach ($routeData as $route) {
          $map->{$method}($route["name"], $route["route"], $route["handler"]);
        }
      }
    }


    return new RouteResolver($routingContainer, $map, $container);
  }
}
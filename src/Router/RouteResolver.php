<?php

namespace Workshop\Router;


use Aura\Router\Map;
use Aura\Router\RouterContainer;
use Workshop\Container\ServiceContainer;

class RouteResolver
{

  /**
   * @var RouterContainer
   */
  private $router;

  /**
   * @var Map
   */
  private $map;

  /**
   * @var ServiceContainer
   */
  private $container;

  /**
   * @var string $controller
   */
  private $controller;

  /**
   * @var string $action
   */
  private $action;

  /**
   * RouteResolver constructor.
   * @param RouterContainer $router
   * @param Map $map
   * @param ServiceContainer $container
   */
  public function __construct(RouterContainer $router, Map $map, ServiceContainer $container)
  {
    $this->router = $router;
    $this->map = $map;
    $this->container = $container;

  }


  /**
   * @return \Aura\Router\Route|false
   */
  public function match()
  {
    return $this->router
      ->getMatcher()
      ->match(
        $this->container->get("Request")
      );
  }

  public function resolve()
  {
    if ($match = $this->match()) {
      $handler = $match->handler;
      $request = $this->container->get("Request");


      foreach ($match->attributes as $key => $value) {
        $request->withAttribute($key, $value);
      }

      $response = "";
      if (is_callable($handler)) {
        $response = $handler($request);
      }
      elseif (is_string($handler)) {
        $this->splitHandler($handler);
        try {
          $this->container->has($this->controller);
        } catch (\Exception $e) {
          $this->notFound("Controller not provided in config!");
        }

        $controller = $this->container->get($this->controller);
        if (!method_exists($controller, $this->action)) {
          $this->notFound("Action in controller not found!");
        }

        $response = $controller->{$this->action}($request);
      }
      return $response;
    }
  }

  /**
   * @param string $handler
   */
  private function splitHandler(string $handler)
  {
    $handlerParts = explode("@", $handler);
    if (count($handlerParts) == 2) {
      list($action, $controller) = $handlerParts;
    }
    else {
      $controller = reset($handlerParts);
      $action = "IndexAction";
    }

    $this->controller = $controller;
    $this->action = $action;
  }


  public function notFound(string $message)
  {
    http_response_code(404);
    echo $message;
    die;
  }


}
<?php

namespace Workshop\View\Factory;


use Workshop\Application\Application;
use Workshop\Container\ServiceContainer;
use Workshop\Container\ServiceContainerInterface;

class ViewFactory implements ServiceContainerInterface
{

  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id)
  {
    $loader = new \Twig_Loader_Filesystem(Application::$config["view_manager"]["view_path"]);
    $twig = new \Twig_Environment($loader);

    return $twig;
  }
}
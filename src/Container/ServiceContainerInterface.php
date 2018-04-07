<?php

namespace Workshop\Container;


interface ServiceContainerInterface
{
  /**
   * @param ServiceContainer $container
   * @param $id
   * @return mixed
   */
  public function createService(ServiceContainer $container, $id);
}
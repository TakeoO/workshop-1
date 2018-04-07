<?php

namespace Workshop\Container;


use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ServiceContainer implements ContainerInterface
{

  /** @var array */
  private $container = [];

  /**
   * Finds an entry of the container by its identifier and returns it.
   *
   * @param string $id Identifier of the entry to look for.
   *
   * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
   * @throws ContainerExceptionInterface Error while retrieving the entry.
   *
   * @return mixed Entry.
   */
  public function get($id)
  {
    if ($this->has($id)) {
      $class = $this->container[$id];

      $object = new $class();

      return $object->createService($this, $id);
    }
  }

  /**
   * Returns true if the container can return an entry for the given identifier.
   * Returns false otherwise.
   *
   * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
   * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
   *
   * @param string $id Identifier of the entry to look for.
   *
   * @return bool
   */
  public function has($id)
  {
    if (!isset($this->container[$id]))
      throw new \Exception("Service not found!");


    return true;
  }


  /**
   * @param array $container
   * @return $this
   */
  public function setContainer(array $container)
  {
    $this->container = $container;

    return $this;
  }
}
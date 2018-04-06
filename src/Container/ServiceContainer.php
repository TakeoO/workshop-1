<?php

namespace Workshop\Container;


use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ServiceContainer implements ContainerInterface
{
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
    // TODO: Implement get() method.
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
    // TODO: Implement has() method.
  }
}
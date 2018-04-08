<?php

namespace Workshop\Controller;


use Zend\Diactoros\ServerRequest;


/**
 * Class IndexController
 * @package Workshop\Controller
 */
class IndexController extends AbstractController
{
  public function indexAction(ServerRequest $request)
  {
    return $this->view("index/index");
  }
}
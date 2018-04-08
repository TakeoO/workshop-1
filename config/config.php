<?php


return [
  "database" => [],
  "container" => [
    "Application" => \Workshop\Application\Factory\ApplicationFactory::class,
    "Request" => \Workshop\Request\Factory\RequestFactory::class,
    "Router" => Workshop\Router\Factory\RouterFactory::class,
    "View" => \Workshop\View\Factory\ViewFactory::class,
    "Workshop\\Controller\\IndexController" => \Workshop\Controller\Factory\GenericControllerFactory::class
  ],
  "router" => [
    "get" => [
      [
        "name" => "home",
        "route" => "/",
        "handler" => "IndexAction@Workshop\\Controller\\IndexController"
      ]
    ]
  ],
  "view_manager" => [
    "view_path" => "src/views/"
  ]
];
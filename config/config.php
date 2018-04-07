<?php


return [
  "database" => [],
  "container" => [
    "Application" =>  \Workshop\Application\Factory\ApplicationFactory::class,
    "Request" => \Workshop\Request\Factory\RequestFactory::class,
  ]
];
<?php

/**
 * Make all paths relative to project root dir
 */
chdir(dirname(__DIR__));

require 'vendor/autoload.php';


\Workshop\Application\Application::init("config/config.php")->run();

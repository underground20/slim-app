<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Handlers\Strategies\RequestHandler;

require __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require __DIR__  . '/../config/container.php';

/** @var App $app */
$app = (require __DIR__. '/../config/app.php')($container);

$app->run();
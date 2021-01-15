<?php

use App\Middlewares\RequestAttributeMiddleware;
use Slim\App;
use App\Middlewares\NotFound;

return static function (App $app) {
    $app->add(RequestAttributeMiddleware::class);
    $app->addRoutingMiddleware();
    $app->add(NotFound::class);
};
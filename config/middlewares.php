<?php

use App\Middlewares\RequestAttributeMiddleware;
use Slim\App;
use App\Middlewares\ErrorHandlerMiddleware;

return static function (App $app) {
    $app->add(RequestAttributeMiddleware::class);
    $app->addRoutingMiddleware();
    $app->add(ErrorHandlerMiddleware::class);
};
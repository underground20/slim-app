<?php

use Slim\App;
use App\Middlewares\NotFound;

return static function (App $app) {
    $app->add(NotFound::class); // MiddlewareInterface | string | callable
    //$app->addMiddleware(new NotFound()); // MiddlewareInterface
};
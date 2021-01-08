<?php

use Slim\App;
use App\Action\IndexAction;

return static function (App $app) {
    $app->get('/', IndexAction::class);
};

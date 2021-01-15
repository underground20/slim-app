<?php

use Slim\App;
use App\Action\IndexAction;

return static function (App $app) {
    $app->get('/show/{name}', IndexAction::class)->setName('index');
};

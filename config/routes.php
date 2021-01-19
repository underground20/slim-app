<?php

use App\Action\TaskViewAction;
use Slim\App;
use App\Action\TaskListAction;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app) {
    $app->group('/tasks', function (RouteCollectorProxy $group) {
        $group->get('/',TaskListAction::class)->setName('index');
        $group->get('/view/user/{id}', TaskViewAction::class)->setName('view');
    });
};

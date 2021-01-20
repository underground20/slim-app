<?php

use Slim\App;
use App\Action\TaskCreateAction;
use App\Action\TaskViewAction;
use App\Action\TaskListAction;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app) {
    $app->group('/tasks', function (RouteCollectorProxy $group) {
        $group->get('',TaskListAction::class)
            ->setName('index');
        $group->get('/view/user/{id}', TaskViewAction::class)
            ->setName('view');
        $group->post('/create/user', TaskCreateAction::class)
            ->setName('create');
    });
};

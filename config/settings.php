<?php

use Slim\App;

return static function (App $app): void {
    $settings = $app->getContainer()->get('settings');

    $app->addErrorMiddleware(
        $settings['displayErrorDetails'],
        $settings['logErrors'],
        $settings['logErrorDetails']
    );
};
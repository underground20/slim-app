<?php

use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$cli = new Application();
$cli->add(new \App\Console\TestCommand());
$cli->add(new \App\Console\FixtureCommand());
$cli->run();
<?php

use DI\Container;

$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->addDefinitions(
    require __DIR__ . '/dependencies.php',
    require __DIR__ . '/doctrine.php'
);
return $builder->build();
<?php

use DI\Container;

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions(require __DIR__ . '/dependencies.php');
return $builder->build();
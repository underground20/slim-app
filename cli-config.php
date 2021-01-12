<?php

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$em = (require_once __DIR__ . '/config/doctrine.php');
$container = (require_once __DIR__ . '/config/container.php');
$res = array_shift($em)($container);

return ConsoleRunner::createHelperSet($res);
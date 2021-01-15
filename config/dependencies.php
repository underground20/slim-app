<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;

return [
    'settings' => [
        'displayErrorDetails' => true,
        'logErrors' => false,
        'logErrorDetails' => false
    ],
    'doctrine' => [
        'dev_mode' => true,
        'cache_dir' => __DIR__ . '/../var/doctrine',
        'metadata_dirs' => [__DIR__ . '/../app/Entity'],
        'connection' => [
            'driver' => 'pdo_mysql',
            'host' => 'mysql',
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD')
        ]
    ],
];
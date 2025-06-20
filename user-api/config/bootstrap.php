<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Пути к вашим Entity-классам с PHP‑8‑атрибутами
$paths = [__DIR__ . '/../src/Entity'];
$isDevMode = true;

// (Опционально) указать свою папку для прокси‑классов
$proxyDir = __DIR__ . '/../var/cache/doctrine/proxies';

// Для продакшна лучше вместо null передать PSR‑6/PSR‑16 кэш (Symfony Cache, например)
$cache = null;

// использовать простые типы (например, JSON в MySQL 5.7+)
$useSimpleTypes = false;

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: $isDevMode,
    proxyDir: $proxyDir,
    cache: $cache,
);

// Параметры подключения
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'user'     => 'root',
    'password' => '1234',
    'dbname'   => 'my_database',
    'charset'  => 'utf8mb4',
];

// Создаём и возвращаем EntityManager
return EntityManager::create($dbParams, $config);

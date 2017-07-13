<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->register( //nom de méthode propre à silex
       new DoctrineServiceProvider(),//pour pouvoir utiliser doctrine dans db
        [
          'db.options' => [
              'driver' => 'pdo_mysql',
              'host' => 'localhost',
              'dbname' => 'game',
              'user' => 'root',
              'password' => '',
              'charset' => 'utf8'
          ]
        ]
);

$app->register(new SessionServiceProvider());

return $app;

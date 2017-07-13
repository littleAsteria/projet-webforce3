<?php

use Controller\GameController;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;

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

$app['game.controller'] = function () use ($app){
    return new GameController($app);
};

return $app;

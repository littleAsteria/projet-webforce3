<?php

use Controller\GameController;
use Controller\MembreController;
use Controller\QuestionController;
use Repository\MembreRepository;
use Repository\QuestionRepository;
use Service\MembreManager;
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
    
    
//nouvelle globale membre_manager utilisable avec twig 
 $twig->addGlobal('membre_manager',$app['membre.manager']);
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

$app['membre.manager'] = function() use ($app){
    return new MembreManager($app['session']);
    
};

//CONTROLLERS:
//Déclaration en service du contrôleur Membre: 
$app['membre.controller'] = function() use ($app){ 
    
    return new MembreController($app);
};

//Déclaration en service du contrôleur Game: 
$app['game.controller'] = function () use ($app){
    return new GameController($app);
};

//Déclaration en service du contrôleur Question:
$app['question.controller'] = function () use ($app){
  return new QuestionController($app);  
};

//REPOSITORY:
//Déclaration en service du repository Membre:
$app['membre.repository'] = function() use ($app){
    
    return new MembreRepository($app['db']);
};


$app['question.repository'] = function() use ($app){
  return new QuestionRepository($app['db']);  
};








return $app;

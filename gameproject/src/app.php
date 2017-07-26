<?php

use Controller\Admin\QuestionController as AdminQuestionController;
use Controller\Admin\MembreController as AdminMembreController;
use Controller\GameController;
use Controller\MembreController;
use Controller\QuestionController;
use Controller\ControllerQuestionAjax;
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
//Pour la session membre
$app->register(new SessionServiceProvider());

//Déclaration en servcie du MembreManager:
$app['membre.manager'] = function() use ($app){
    return new MembreManager($app['session']);
    
};

//----ADMIN----
//CONTROLLERS:
//Déclaration en service du contrôleur Admin Question 
$app['admin.question.controller'] = function() use ($app) {
    
    return new AdminQuestionController($app);
};

//Déclaration en service du contrôleur Admin Membre 
$app['admin.membre.controller'] = function() use ($app) {
    
    return new AdminMembreController($app);
};


//-----FRONT-----
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

//Déclaration en service du controller QuestionAjax:
$app['question.ajax.controller'] = function () use ($app){
    return new ControllerQuestionAjax($app);
};

//REPOSITORY:
//Déclaration en service du repository Membre:
$app['membre.repository'] = function() use ($app){
    
    return new MembreRepository($app['db']);
};

//Déclaration en service du repository Question:
$app['question.repository'] = function() use ($app){
    return new QuestionRepository($app['db']);  
};


return $app;

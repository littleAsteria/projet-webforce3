<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));




$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;


//Partie Front:

$app
    ->get('/randomQuestion', 'question.ajax.controller:getRandomQuestion')
//    ->assert('difficulty','\d+')
    ->bind('randomQuestion')
;

//Utilisateur :

//Inscription:
$app
    ->match('/inscription', 'membre.controller:registerAction')
    ->bind('inscription')
;

//Connexion:
$app
    ->match('/connexion', 'membre.controller:loginAction')
    ->bind('connexion')
;

//Déconnexion:
$app
    ->match('/deconnexion', 'membre.controller:logoutAction')
    ->bind('deconnexion')
;

//Vue game
$app
        ->get('/game', 'game.controller:getToGame')
        ->bind('game')
;

//Vue des règles
$app
        ->get('/regles', 'game.controller:getToRegles')
        ->bind('regles')
;

//Vue des scores
$app
        ->get('/scores', 'game.controller:getToScores')
        ->bind('scores')
;

//Vue du formulaire de soumission des questions
$app
        ->match('/soumission', 'question.controller:submitAction')
        ->bind('soumission')
;

//Partie Admin:


$admin = $app['controllers_factory'];

//sécurisation des routes admin:
$admin->before(function () use ($app){
    if(!$app['membre.manager']->isAdmin()){
        $app->abort(403,'Accès refusé');
    //renvoie un message d'erreur si la personne n'est pas connecté entant qu'admin
    }
});

$app->mount('/admin', $admin);

//route de la vue validationQuestion
$admin
     ->get('/validation','admin.question.controller:listAction')
     ->bind('admin_validation')
;

//route question accepté
$admin
     ->get('/validation/accord/{id}','admin.question.controller:acceptAction')
     ->bind('admin_validation_accord')
;

//route modificationQuestion:
$admin
     ->match('/validation/modification/{id}','admin.question.controller:editAction')
     
     ->bind('admin_validation_modification')
;


//route suppressionQuestion:
$admin        
     ->get('validation/suppression/{id}','admin.question.controller:deleteAction') 
     ->bind('admin_validation_suppression')
;

//route remise d'un score à 0
$admin
        ->get('/score/reset/{id}', 'admin.membre.controller:setScoreToZero')
        ->bind('admin_reset_score')
;


$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});

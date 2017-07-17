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

$app->mount('/admin', $admin);

//route de la vue validationQuestion
$admin
     ->get('/validation','admin.question.controller:listAction')
        //rendu de la vue
     ->bind('admin_validation')
;
//route modification

//route suppression:


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

<?php

require 'vendor/autoload.php';

$app = new Slim\App();

/**
 * @api {get} /sample/{message} hello world sample request
 * @apiName GetSample
 * @apiParam (Url) {String} message the message to return
 * @apiSuccess (Success_200) {String} data the hello world data
 * @apiSuccess (Success_200) {String} output what the user entered in the url
 */
$app->get('/sample/{message}', function ($request, $response, $args) {
  $route = $request->getAttribute('route');
  $message = $route->getArgument('message');
  return $response->withJson([
    'data' => 'Hello World',
    'output' => $message
  ]);
});

$app->run();

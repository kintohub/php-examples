<?php

require 'vendor/autoload.php';

$app = new Slim\App();

/**
 * @api {get} /hello/{name} Prints "Hello {name}"
 * @apiName HelloWorld
 * @apiParam (Url) {String} name the name to print
 * @apiSuccess (200) {String} message the hello {name} message
 */
$app->get('/hello/{name}', function ($request, $response, $args) {
  $route = $request->getAttribute('route');
  $name = $route->getArgument('name');
  return $response->withJson([
    'message' => 'Hello ' . $name
  ]);
});

$app->run();

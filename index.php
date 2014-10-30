<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim([
  'view' => new \Slim\Views\Twig(),
  'templates.path' => dirname(__FILE__) .'/app/views'
]);

$view = $app->view();
$view->parserExtensions = [
  new \Slim\Views\TwigExtension()
];
$view->parserOptions = [
  'debug' => true,
  'cache' => dirname(__FILE__) .'/app/cache'
];

$app->get('/', function() use ($app) {
  $data = ['title' => 'Hello World'];
  $app->render('index.twig', $data);
});

$app->run();

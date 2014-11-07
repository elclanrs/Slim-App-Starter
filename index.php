<?php

require 'vendor/autoload.php';

define('APP_PATH', __DIR__ .'/app');

$app = new \Slim\Slim([
  'view' => new \Slim\Views\Twig(),
  'templates.path' => APP_PATH .'/views'
]);

$view = $app->view();
$view->parserExtensions = [
  new \Slim\Views\TwigExtension()
];
$view->parserOptions = [
  'debug' => true,
  'cache' => APP_PATH .'/cache'
];

$app->get('/', function() use ($app) {
  $data = ['title' => 'Hello World'];
  $app->render('index.twig', $data);
});

$app->run();

<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim([
  'templates.path' => 'app/views'
]);

$app->get('/', function() use ($app) {
  $data = ['title' => 'Hello World'];
  $app->render('index.php', $data);
});

$app->run();

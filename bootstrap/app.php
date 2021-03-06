<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
$app = new \Slim\App([
'settings' => [
       'displayErrorDetails' => true,
]
]);
$container = $app->getContainer();
$container['view'] = function ($container) {
   $view = new \Slim\Views\Twig(__DIR__ . '/../app/templates', [
       'cache' => false,
   ]);
   $view->addExtension(new \Slim\Views\TwigExtension(
       $container->router,
       $container->request->getUri()
   ));
   return $view;
};
$container['ApiDetail'] = function () {
   return new \App\Api\ApiDetail;
};
$container['ApiControlRoom'] = function () {
   return new \App\Api\ApiControlRoom;
};
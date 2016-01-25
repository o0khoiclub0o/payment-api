<?php

use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response;

$di = new FactoryDefault();
$di->set('response', function () {
    return new Response();
});

$app = new Micro($di);

// Index
$app->get('/', function () use ($app) {
    return [
        'service' => 'Payment',
        'version' => '0.0.0'
    ];
});

// Return JSON
$app->after(function () use ($app) {
    return $app->response->setContentType('application/json', 'UTF-8')
        ->setJsonContent($app->getReturnedValue())
        ->send();
});

$app->handle();

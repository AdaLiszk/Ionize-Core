<?php
require_once(__DIR__.'/../vendor/autoload.php');

ini_set('display_errors','On');
error_reporting(-1);

$app = new Ionize\Application();

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app->run();

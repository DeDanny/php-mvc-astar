<?php

session_start();

function autoLoaderConfig($className) {
    if (file_exists('./core/' . $className . '.php')) {
        include_once './core/' . $className . '.php';
    }
}

function autoLoaderClassAndModel($className) {
    if (file_exists('./controller/' . $className . '.php')) {
        include_once './controller/' . $className . '.php';
    } else if (file_exists('./Model/' . $className . '.php')) {
        include_once './model/' . $className . '.php';
    }
}

spl_autoload_register('autoLoaderConfig');


$httpRequest = new HttpRequestImp($_GET, $_POST);
$httpResponse = new HttpResponseImp();

$bootStrapper = new BootStrapper($httpRequest, $httpResponse);

spl_autoload_register('autoLoaderClassAndModel');

$className = $bootStrapper->getClassName();
$class = new $className();
$functionName = $bootStrapper->callFunction();
$functionResponse = $class->$functionName($bootStrapper->getRequest(), $bootStrapper->getResponse());

$model = $functionResponse['model'];
$view = $functionResponse['view'];

if ($httpRequest->isAjaxRequest()) {
    echo json_encode($model);
} else {
    include './view/' . $view . '.php';
}
    
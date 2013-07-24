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


$httpRequest = new HttpRequestImp($_GET, $_POST, $_SERVER);
$httpResponse = new HttpResponseImp();

$bootStrapper = BootStrapper::getBootstrapper($httpRequest, $httpResponse);

spl_autoload_register('autoLoaderClassAndModel');

$className = $bootStrapper->getClassName();
$class = new $className();
$functionName = $bootStrapper->callFunction();
$functionResponse = $class->$functionName($httpRequest, $httpResponse);

$model = isset($functionResponse['model']) ? $functionResponse['model'] : null;
$view = isset($functionResponse['view']) ? $functionResponse['view'] : false;

if ($httpResponse->issetHeader()) {
    header($httpResponse->getHeader());
    if ($httpResponse->stopRendering()) {
        exit('Stopped rendering');
    }
}


if ($httpRequest->isAjaxRequest()) {
    echo json_encode($model);
} else if ($view) {
    include './view/' . $view . '.php';
}
    
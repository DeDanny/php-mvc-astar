<?php

session_start();

function myAutoLoaderConfig($className) {
    include_once './core/' . $className . '.php';
    //include_once './model/' . $className . 'Model.php';
}

function autoClassModelLoader($className) {
    if (file_exists('./controller/' . $className . '.php')) {
        include_once './controller/' . $className . '.php';
    } else if (file_exists('./controller/' . $className . '.php')) {
        include_once './model/' . $className . 'Model.php';
    }
}

spl_autoload_register('myAutoLoaderConfig');


$httpRequest = new HttpRequestImp($_GET, $_POST);
$httpResponse = new HttpResponseImp();

$bootStrapper = new BootStrapper($httpRequest, $httpResponse);

spl_autoload_register('myAutoLoaderConfig');
$class = $bootStrapper->createClass();
$functionName = $bootStrapper->callFunction();
$functionResponse = $class->$functionName($bootStrapper->getRequest(), $bootStrapper->getResponse());

$model = $functionResponse['model'];
$view = $functionResponse['view'];

if (isset($_GET['ajax']) && $_GET['ajax'] == true) {
    echo json_encode($model);
} else {
    include './view/' . $view . '.php';
}
    
<?php
session_start();

print_r($_GET);

require_once './core.php';

$bootStrapper = new BootStrapper($_GET);

$httpRequest =  $bootStrapper->getRequest();
$httpResponse = $bootStrapper->getResponse();

$class = $bootStrapper->createClass();
$functionName = $bootStrapper->callFunction();
$functionResponse = $class->$functionName($httpRequest, $httpResponse);

$model = $functionResponse['model'];
$view = $functionResponse['view'];

if(isset($_GET['ajax']) && $_GET['ajax'] == true) {
    echo json_encode($model);
} else {
    include './view/' . $view . '.php';
}
    
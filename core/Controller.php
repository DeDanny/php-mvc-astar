<?php

abstract class Controller {
    public function __call($name, $arguments) {
        
        var_dump($arguments);
        
        $arguments[1]->setHeader('HTTP/1.0 404 Not Found');
        return array('view' => '404');
    }
}

<?php

class BootStrapper {

    private $httpRequest;
    private $httpResponse;
    private static $self;

    private function __construct(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $htpResponse;
    }

    public static function getBootstrapper(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        if (self::$self === null) {
            self::$self = new BootStrapper($httpRequest, $htpResponse);
        }
        return self::$self;
    }

    public function getClassName() {

        $explode = explode('/', $this->httpRequest->getRequest());
        $class = $explode[0];

        //here logic for url rewrite.

        $className = $class . 'Controller';
        
        if (!class_exists($className) || $class == null) {
            return 'MainController';
        }
        return $class . 'Controller';
    }

    public function callFunction() {

        $reguest = $this->httpRequest->getRequest();
        $function = null;
        if ($reguest) {
            $explode = explode('/', $this->httpRequest->getRequest());
            $function = $explode[1];
        }


        if ($function == null) {
            return 'index';
        }

        return $function;
    }

}
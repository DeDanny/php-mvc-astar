<?php

class BootStrapper {

    private $httpRequest;
    private $httpResponse;
    private static $self;

    private function __construct(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $htpResponse;

        $request = $this->httpRequest->getRequest();
    }

    public static function getBootstrapper(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        if (self::$self === null) {
            self::$self = new BootStrapper($httpRequest, $htpResponse);
        }
        return self::$self;
    }

    public function __call($method, $args) {
        // echo '<!-- this method ' . $method . ' does not exist -->' . "\n";
    }

    public function getClassName() {

        $class = explode('/', $this->httpRequest->getRequest())[0];

        //here logic for url rewrite.

        if ($class == null) {
            return 'MainController';
        }
        return $class . 'Controller';
    }

    public function callFunction() {

        $reguest = $this->httpRequest->getRequest();
        $function = null;
        if ($reguest) {
            $function = explode('/', $this->httpRequest->getRequest())[1];
        }


        if ($function == null) {
            return 'index';
        }

        return $function;
    }

}
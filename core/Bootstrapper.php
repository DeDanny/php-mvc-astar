<?php

class BootStrapper {

    private $httpRequest;
    private $httpResponse;
    private static $self;

    private function __construct(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $htpResponse;
        
        $request = $this->httpRequest->getRequest();
        var_dump($request);
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
        return 'MainController';
    }

    public function callFunction() {
        return 'index';
    }

}
<?php

class BootStrapper {

    private $httpRequest;
    private $httpResponse;

    public function __construct(HttpRequest $httpRequest, HttpResponse $htpResponse) {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $htpResponse;
    }

    public function __call($method, $args) {
        echo '<!-- this method ' . $method . ' does not exist -->' . "\n";
    }

    public function getClassName() {
        return 'MainController';
    }

    public function callFunction() {
        return 'index';
    }

}
<?php

class HttpRequestImp implements HttpRequest {

    private $get;
    private $post;

    public function __construct($get, $post) {
        $this->get = $get;
        $this->post = $post;
    }

    private function escape(String $string) {
        return htmlentities($string);
    }

    public function getGetElement($name, boolean $escaped) {
        if($escaped == null) {
            $escaped = true;
        }
        return isset($this->get[$name]) ? $escaped ? $this->get[$name] : htmlentities($this->get[$name])  : false;
    }

    public function getRequest() {
        
    }

    public function isAjaxRequest() {
        
    }

}
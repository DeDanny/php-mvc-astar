<?php

class HttpRequestImp implements HttpRequest {

    private $get;
    private $post;

    public function __construct($get, $post) {
        $this->get = $get;
        $this->post = $post;
    }

    public function getGetElement($name, $escaped = true) {
        return isset($this->get[$name]) ? $escaped ?  addslashes($this->get[$name]) : $this->get[$name] : false;
    }

    public function getPostElement($name, $escaped = true) {
        return isset($this->post[$name]) ? $escaped ? addslashes($this->post[$name]) : $this->post[$name] : false;
    }
    
    public function getPostElements() {
        return isset($this->post) ? $this->post : false;
    }

    public function getRequest() {
        return isset($this->get['request']) ? $this->get['request'] : false;
    }

    public function isAjaxRequest() {
        
    }

}
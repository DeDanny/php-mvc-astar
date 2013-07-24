<?php

class HttpRequestImp implements HttpRequest {

    private $get;
    private $post;
    private $server;

    public function __construct($get, $post, $server) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
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
        return isset($this->server['HTTP_X_REQUESTED_WITH']) && strtolower($this->server['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

}
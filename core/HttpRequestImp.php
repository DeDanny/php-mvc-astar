<?php

//print_r(get_declared_interfaces());
//print_r(get_declared_classes());

interface HttpRequest {

    public function __construct($get, $post);

    function getRequest();

    function isAjaxRequest();

    function getGetElement($name, Boolean $escaped);
}




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

class HttpResponseImp implements HttpResponse {
    public function addView($viewName) {
        
    }

    public function setHeader($header) {
        
    }

    public function setRedirect($location, Boolean $stopRendering) {
        if ($stopRendering == null) {
            $stopRendering = true;
        }
        header($string);
    }

    public function setView($viewName) {
        
    }    
}
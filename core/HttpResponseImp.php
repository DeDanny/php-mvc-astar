<?php

class HttpResponseImp implements HttpResponse {

    private $header = "";
    
    private $views = array();

    public function setView($viewName) {
        $this->views = array($viewName);
    }
    
    public function addView($viewName) {
        
        $this->views[] = $viewName;
    }

    public function getViews() {
        return $this->views;
    }
    
    public function setHeader($header) {
       
    }
    
    public function getHeader() {
        return $this->header;
    }

    public function setRedirect($location, Boolean $stopRendering) {
        if ($stopRendering == null) {
            $stopRendering = true;
        }
        header($string);
    }

}
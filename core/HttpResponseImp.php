<?php

class HttpResponseImp implements HttpResponse {

    private $header = "";
    
    public function addView($viewName) {
        
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

    public function setView($viewName) {
        
    }

}
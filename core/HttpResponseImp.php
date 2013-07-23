<?php

class HttpResponseImp implements HttpResponse {

    private $header = "";
    private $views = array();
    private $issetHeader = false;
    private $stopRendering = true;

    public function setView($viewName) {
        $this->views = array($viewName);
    }
    
    public function addView($viewName) {
        
        $this->views[] = $viewName;
    }

    public function getViews() {
        return $this->views;
    }
    
    public function stopRendering()
    {
        return $this->stopRendering;
    }
    
    public function setHeader($header, $stopRendering = false) {
        $this->issetHeader = true;
        $this->header = $header;
        $this->stopRendering = $stopRendering;
    }
    
    public function getHeader() {
        return $this->header;
    }
    
    public function issetHeader(){
        return $this->issetHeader;
    }

    public function setRedirect($location, $stopRendering = true) {
        $this->issetHeader = true;
        $this->header = 'Location: ' . $location;
        $this->stopRendering = $stopRendering;
    }

}
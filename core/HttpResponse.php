<?php

interface HttpResponse {

    function setView($viewName);

    function addView($viewName);
    
    function getViews();
    
    function stopRendering();

    function setHeader($header, $stopRendering = false);

    function setRedirect($location, $stopRendering = true);
}
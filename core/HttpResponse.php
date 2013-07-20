<?php

interface HttpResponse {

    function setView($viewName);

    function addView($viewName);

    function setHeader($header);

    function setRedirect($location, Boolean $stopRendering);
}
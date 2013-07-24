<?php

interface HttpRequest {

    function __construct($get, $post, $server);

    function getRequest();

    function isAjaxRequest();

    function getGetElement($name, $escaped = true);
    
    function getPostElement($name, $escaped = true);
    
    function getPostElements();
}
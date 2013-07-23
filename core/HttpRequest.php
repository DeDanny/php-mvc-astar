<?php

interface HttpRequest {

    function __construct($get, $post);

    function getRequest();

    function isAjaxRequest();

    function getGetElement($name, $escaped = true);
    
    function getPostElement($name, $escaped = true);
    
    function getPostElements();
}
<?php

interface HttpRequest {

    public function __construct($get, $post);

    function getRequest();

    function isAjaxRequest();

    function getGetElement($name, Boolean $escaped);
}
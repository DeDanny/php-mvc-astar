<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AstarController
 *
 * @author Danny
 */
class AstarController {
    function calculateSteps(HttpRequest $httpRequest) {
        
        $post = $httpRequest->getPostElements();
        
        $map = json_decode($post['map']);
        $user = json_decode($post['user']);
        $food = json_decode($post['food']);
        
        
        
        return array('model' => array('2:1', '2:2', '2:3'));
    }
}

?>

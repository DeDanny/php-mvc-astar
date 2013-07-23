<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroundTypeSand
 *
 * @author Danny
 */
class MountainGroundType implements GroundType {

    private static $cost = 2;

    static public function getCost() {
        return self::$cost;
    }

    static public function isPlacable() {
        return false;
    }

}

?>

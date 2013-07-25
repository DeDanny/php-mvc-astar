<?php

/**
 * Description of GroundTypeSand
 *
 * @author Danny
 */
class MountainGroundType implements GroundType {

    private static $cost = 7;

    static public function getCost() {
        return self::$cost;
    }

    static public function isPlacable() {
        return false;
    }

}

?>

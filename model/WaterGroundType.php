<?php

/**
 * Description of GroundTypeSand
 *
 * @author Danny
 */
class WaterGroundType implements GroundType {

    private static $cost = 5;

    static public function getCost() {
        return self::$cost;
    }

    static public function isPlacable() {
        return false;
    }

}

?>

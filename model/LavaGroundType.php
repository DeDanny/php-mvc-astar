<?php

/**
 * Description of GroundTypeSand
 *
 * @author Danny
 */
class LavaGroundType implements GroundType {

    private static $cost = 99;

    static public function getCost() {
        return self::$cost;
    }

    static public function isPlacable() {
        return false;
    }

}

?>

<?php

/**
 * Description of GroundTypeSand
 *
 * @author Danny
 */
class SandGroundType implements GroundType {

    private static $cost = 1;

    static public function getCost() {
        return self::$cost;
    }

    static public function isPlacable() {
        return true;
    }

}

?>

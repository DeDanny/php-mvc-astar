<?php

/**
 * Description of GroundTypes
 *
 * @author Danny
 */
abstract class GroundTypes {

    const grass = 0;
    const lava = 1;
    const water = 2;
    const mountain = 3;
    const sand = 4;

    private function __construct() {
        
    }
    
    public static function getName($id) {
    switch ($id) {
        case self::grass:
                return 'grass';
            break;
        case self::lava:
                return 'lava';
            break;
        case self::water:
                return 'water';
            break;
        case self::mountain:
                return 'mountain';
            break;
        case self::sand:
                return 'sand';
            break;
    }
    }
    
    public static function getCost($id) {
    switch ($id) {
        case self::grass:
                return 'grass';
            break;
        case self::lava:
                return 'lava';
            break;
        case self::water:
                return 'water';
            break;
        case self::mountain:
                return 'mountain';
            break;
        case self::sand:
                return 'sand';
            break;
    }
    }

}
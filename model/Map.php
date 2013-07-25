<?php

/**
 * 
 * Get item using x and y where x start right
 * and y starts at the top:
 * 
 * (y * self::column) + x
 *
 *
 * @author Danny
 */
class Map {

    const row = 12;
    const column = 12;

    private $mapData;

    public function __construct($mapData) {
        $this->mapData = $mapData;
    }

    public function getNonWalkedSides($user) {
        $xy = explode(':', $user);

        $row = 0;
        $column = 1;

        $result = array();

        if ($xy[$row] > 0) {
            $location = ($xy[$row] - 1) . ':' . $xy[$column];
            $tile = $this->getTileByLocation($location);
            if ($tile) {
                $result[$location] = $tile;
            }
        }
        if ($xy[$row] < self::row) {
            $location = ($xy[$row] + 1) . ':' . $xy[$column];
            $tile = $this->getTileByLocation($location);
            if ($tile) {
                $result[$location] = $tile;
            }
        }
        if ($xy[$column] > 0) {
            $location = $xy[$row] . ':' . ($xy[$column] - 1);
            $tile = $this->getTileByLocation($location);
            if ($tile) {
                $result[$location] = $tile;
            }
        }
        if ($xy[$column] < self::column) {
            $location = $xy[$row] . ':' . ($xy[$column] + 1);
            $tile = $this->getTileByLocation($location);
            if ($tile) {
                $result[$location] = $tile;
            }
        }

        return $result;
    }

    private function getTileByLocation($location) {
        if (isset($this->mapData[$location])) {
            $tile = GroundTypes::getGroundType($this->mapData[$location]);
            unset($this->mapData[$location]);
            return $tile;
        }
        return false;
    }

}

?>

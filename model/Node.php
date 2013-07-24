<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Node
 *
 * @author Danny
 */
class Node {

    private $cost;
    private $previousNode;
    private $tile;
    private $location;
    private $lineCost;

    public function __construct($tile, $location, $previousNode = null) {
        $this->previousNode = $previousNode;
        $this->location = $location;
        $this->tile = $tile;
    }
    
    public function setLineCost($lineCost){
        $this->lineCost = $lineCost;
    }
    public function getLineCost(){
        return $this->lineCost;
    }
    
    public function setTile($tile) {
        $this->tile = $tile;
    }

    public function setPreviousNode($previousNode) {
        $this->previousNode = $previousNode;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getTile() {
        return $this->tile;
    }

    public function setCost($cost) {
        $this->cost = $cost;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getPreviousNode() {
        return $this->previousNode;
    }

}

?>

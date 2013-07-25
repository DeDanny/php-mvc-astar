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

    private $food;
    private $map;

   /**
    * @param HttpRequest
    * @return Array the steps the agent needs to walk to get from his place to the food.
    */
    public function calculateSteps(HttpRequest $httpRequest) {

        $post = $httpRequest->getPostElements();

        $mapData = json_decode($post['map'], true);
        $user = new Node(0, $post['user']);
        $this->food = $post['food'];

        $this->map = new Map($mapData);

        $nodes = $this->step($user, array());
        
        return array('model' => $this->getPathFromNodes($nodes, array()));
    }
    
    /**
     * The nodes start with the end location of the path. Need to switch it.
     * Walk to the begining of the pad and from there add everyting to the array.
     * 
     * 
     * @param Node $nodes
     * @param Array $array
     * @return Array the path the agents walks.
     */
    private function getPathFromNodes($nodes, $array) {
        if ($nodes->getPreviousNode() != null) {
            $array = $this->getPathFromNodes($nodes->getPreviousNode(), $array);
        }
        $array[] = $nodes->getLocation();
        return $array;
    }

    /**
     * 
     * The core of the A*
     * Get the sides of the smallets tile. The tiles should not been explored before.
     * Calculate the cost for every tile.
     * add them to the frontier.
     * Find the lowest cost in the frontier.
     * Remove this element from the frontier.
     * Is the element on the target
     *  yes - good we are done. Return this node.
     *  no  - Repeat with the new smallest Node;
     * 
     * @param Node $smallest
     * @param Array $frontier
     * @return Node
     */
    private function step(Node $smallest, $frontier) {
        $sides = $this->map->getNonWalkedSides($smallest->getLocation());

        foreach ($sides as $key => $tile) {
            $node = new Node($tile, $key, $smallest);

            $mCost = $this->manhattanDistance($this->parseLocation($key), $this->food) + "\n";

            $node->setLineCost($mCost);
            $node->setCost($node->getTile()->getCost() + $smallest->getCost());

            $frontier[] = $node;
        }
        $newSmallest = $this->getSmallestFrom($frontier);

        $frontier = $this->removeNode($newSmallest, $frontier);
        if ($newSmallest->getLocation() !== $this->food) {
            return $this->step($newSmallest, $frontier);
        }
        return $newSmallest;
    }

    /**
     * Like the name implies
     * 
     * @param array $object to remove
     * @param array $array
     * @return array
     */
    private function removeNode($object, $array) {
        if (($key = array_search($object, $array)) !== false) {
            unset($array[$key]);
        }
        return $array;
    }

    /**
     * 
     * makes the lcation "1:1" into an array(1, 1) so the numbers can be used.
     * 
     * @param type $location
     * @return Array
     */
    private function parseLocation($location) {

        return explode(':', $location);
    }

    /**
     * 
     * Get the first elements from the frontier compare it whit all the othere nodes.
     * Keep track of node with the smallest total cost (cost + manhattanDistance)
     * 
     * @param array $frontier
     * @return node
     */
    private function getSmallestFrom($frontier) {
        $smallest = null;
        $length = count($frontier);
        foreach ($frontier as $node) {
            if ($smallest == null) {
                $smallest = $node;
            } else if ($smallest->getCost() + $smallest->getLineCost()  > $node->getCost() + $node->getLineCost()) {
                $smallest = $node;
            }
        }
        return $smallest;
    }

    /**
     * 
     * https://en.wikipedia.org/wiki/Manhattan_distance
     * 
     * This is the heuristic of the A* algorithm
     * 
     * @param array $start
     * @param array $end
     * @return int
     */
    private function manhattanDistance($start, $end) {
        return abs($start[0] - $end[0]) + abs($start[1] - $end[2]);
    }

}

?>
